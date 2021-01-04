<?php

namespace App\Rules;

use App\Models\Course;
use App\Models\Program;
use App\Models\Subject;
use Illuminate\Contracts\Validation\Rule;

class SemesterSubjectRule implements Rule
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
     * @var Course|null
     */
    private $course;

    /**
     * Create a new rule instance.
     *
     * @param $isStage
     * @param Program $program
     * @param int $semester
     * @param int $period
     * @param Course|null $course
     */
    public function __construct($isStage, Program $program, Course $course = null, $semester = 0, $period = 0)
    {
        $this->isStage = $isStage;
        $this->program = $program;
        $this->semester = $semester;
        $this->period = $period;
        $this->course = $course;
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
        $subject = Subject::find($value);

        if ($this->isStage):
            if ($subject->co_op && ($subject->program_id == $this->program->id || $subject->program_id == null)):

                if ($this->course == null):
                    $semesters = $this->program->semesters->load('subject');
                else:
                    $semesters = $this->course->plans->load('subject');
                endif;

                $compArray = [];
                foreach ($semesters as $sem):
                    if ($sem->semester < $this->semester || ($sem->semester == $this->semester && $sem->period < $this->period)):
                        $subject = $sem->subject;
                        $compArray = array_merge($compArray, $subject->attachedCompetences->pluck('id')->toArray());
                    endif;
                endforeach;

                $stageComp = Subject::find($value)
                    ->attachedCompetences->pluck('id')->toArray();

                foreach ($stageComp as $comp):
                    if (!in_array($comp, $compArray)):
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
            if (!$subject->co_op && ($subject->program_id == $this->program->id || $subject->program_id == null)):
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
