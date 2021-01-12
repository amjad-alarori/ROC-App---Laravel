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

    /**
     * @param User $student
     * @return false
     */
    public function coOpReady(User $student)
    {
        if ($this->subject->co_op):
            $plans = $this->course->plans()->where('id', '<>', $this->id)
                ->where('semester', '<', $this->semester)
                ->orWhere(function ($q) {
                    $q->where('semester', '=', $this->semester)->where('period', '<', $this->period);
                })->get();

            $passedCompetences = new Collection();
            foreach ($plans as $plan):
                $grade = $plan->grades()->where('student_id', '=', $student->id)->first();

                if ($grade->passed):
                    $passedCompetences = $passedCompetences->merge($plan->subject->attachedCompetences);
                endif;
            endforeach;

            $neededCompetences = $this->subject->attachedCompetences;
            foreach ($neededCompetences as $competence):
                if (!$passedCompetences->contains($competence)):
                    return false;
                endif;
            endforeach;

            if ($this->company_id):
                return StageBedrijven::find($this->company_id);
            else:
                return true;
            endif;
        else:
            return false;
        endif;
    }

    public function company()
    {
        return $this->belongsTo(StageBedrijven::class,'company_id','id');
    }
}
