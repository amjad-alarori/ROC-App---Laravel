<?php

namespace App\Rules;

use App\Models\Program;
use App\Models\Subject;
use Illuminate\Contracts\Validation\Rule;

class SemesterSubjecRule implements Rule
{
    private $isStage;
    /**
     * @var Program
     */
    private $program;
    private $semester;
    private $period;
    private $errorText;

    /**
     * Create a new rule instance.
     *
     * @param $isStage
     * @param Program $program
     * @param $semester
     * @param $period
     */
    public function __construct($isStage, Program $program, $semester = 0, $period = 0)
    {
        $this->isStage = $isStage;
        $this->program = $program;
        $this->semester = $semester;
        $this->period = $period;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ($this->isStage):
            $count = Subject::query()->where('id', '=', $value)
                ->where('co_op', '=', true)
                ->where(function ($q) {
                    $q->where('program_id', '=', $this->program->id)->orWhere('program_id', '=', null);
                })->count();

            if ($count > 0):
                $semesters = $this->program->semesters->load('subject');

                $comArray = [];
                foreach ($semesters as $sem):
                    if ($sem->semester < $this->semester || ($sem->semester == $this->semester && $sem->period < $this->period)):
                        $subject = $sem->subject;
                        $comArray = array_merge($comArray ,$subject->attachedCompetences->pluck('id')->toArray());
                    endif;
                endforeach;

                $stageComp = Subject::query()->where('id', '=', $value)->first()
                    ->attachedCompetences->pluck('id')->toArray();

                foreach ($stageComp as $comp):
                    if (!in_array($comp, $comArray)):
                        $this->errorText = 'niet alle competenties van de gekozen stage komen in eerdere perioden voor.';
                        return false;
                    endif;
                endforeach;

                return true;
            else:
                $this->errorText = 'de gekozen stage kan niet worden togevoegd.';
                return false;
            endif;
        else:
            $count = Subject::query()->where('id', '=', $value)
                ->where('co_op', '=', false)
                ->where(function ($q) {
                    $q->where('program_id', '=', $this->program->id)->orWhere('program_id', '=', null);
                })->count();

            if ($count > 0):
                return true;
            else:
                $this->errorText = 'een gekozen studievak kan niet worden togevoegd.';
                return false;
            endif;
        endif;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->errorText;
    }
}
