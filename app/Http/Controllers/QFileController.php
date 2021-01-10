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
        $test = [];
        $heh = $plans->map(function ($plan) use($test){
           return $plan->subject->attachedCompetences->map(function ($comp) use ($test){
               return $test[$comp->id] = $comp;
           });
        });

        dd($plans, $grades, $test, $heh);
    }
}
