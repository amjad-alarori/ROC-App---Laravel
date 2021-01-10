<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;

class QFileController extends Controller
{
    public function __invoke(User $user, Course $course)
    {
        $plans = $course->plans()->with('subject.attachedCompetences')->whereHas('subject', function ($q) {
            $q->where('co_op', '=', false);
        })->get();

        $grades = $user->grades->whereIn('course_plan_id', $plans->pluck('id')->toArray())->load('coursePlan.subject.attachedCompetences');

        $passedComp = [];
        foreach ($grades as $grade):
            foreach ($grade->coursePlan->subject->attachedCompetences as $comp):
                $passedComp[$comp->id] = $comp;
            endforeach;
        endforeach;

        $courseComps = [];
        foreach ($plans as $plan):
            foreach ($plan->subject->attachedCompetences as $competence):
                if (!array_key_exists($competence->id, $passedComp)):
                    $courseComps[$competence->id] = $competence;
                endif;
            endforeach;
        endforeach;


        dd($plans, $grades, $passedComp, $courseComps);

        return view('qualificationFile');
    }
}
