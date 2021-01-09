<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

class QFileController extends Controller
{
    public function __invoke(User $user, Course $course)
    {
        $plans = $course->plans->load('subject.attachedCompetences');
        $grades = $user->grades->whereIn('course_plan_id', $plans->pluck('id')->toArray())->load('coursePlan.subject.attachedCompetences');


        //not works. test is still empty. use foreach loop
        $courseComps = [];
        foreach ($plans as $plan):
            foreach ($plan->subject->attachedCompetences as $competence):
                $courseComps[$competence->id] = $competence;
            endforeach;
        endforeach;


        dd($plans, $grades, $courseComps);
    }
}
