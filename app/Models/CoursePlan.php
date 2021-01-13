<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursePlan extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester',
        'period',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function grades()
    {
        return $this->hasMany(Grade::class, 'course_plan_id', 'id');
    }

    public function company()
    {
        return $this->belongsTo(StageBedrijven::class, 'company_id', 'id');
    }

    /**
     * @param User $student
     * @return array
     */
    public function coOpReady(User $student = null)
    {
        if ($student !== null):
            $students = new Collection();
            $students = $students->push($student);
        else:
            $students = $this->course->students;
        endif;

        $result = [];
        if ($this->subject->co_op):
            $plans = $this->course->plans()->where('id', '<>', $this->id)
                ->where('semester', '<', $this->semester)
                ->orWhere(function ($q) {
                    $q->where('semester', '=', $this->semester)->where('period', '<', $this->period);
                })->get();
            $neededCompetences = $this->subject->attachedCompetences;

            foreach ($students as $user):
                $passedCompetences = new Collection();
                foreach ($plans as $plan):
                    $grade = $plan->grades()->where('student_id', '=', $user->id)->first();

                    if ($grade->passed):
                        $passedCompetences = $passedCompetences->merge($plan->subject->attachedCompetences);
                    endif;
                endforeach;

                foreach ($neededCompetences as $competence):
                    if (!$passedCompetences->contains($competence)):
                        $result[$user->id] = false;
                    endif;
                endforeach;

                if (!array_key_exists($user->id, $result)):
                    if ($this->company_id):
                        $result[$user->id] = StageBedrijven::find($this->company_id);
                    else:
                        $result[$user->id] = true;
                    endif;
                endif;
            endforeach;
        else:
            foreach ($students as $user):
                $result[$user->id] = false;
            endforeach;
        endif;

        return $result;
    }
}
