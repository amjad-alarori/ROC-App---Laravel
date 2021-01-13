<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyQFileController extends Controller
{
    public function __invoke(StageBedrijven $stageBedrijven, stage $stage, User $user, Course $course)
    {
        $plans = $course->plans()->with('subject.attachedCompetences')->whereHas('subject', function ($q) {
            $q->where('co_op', '=', false);
        })->get();

        $grades = $user->grades->whereIn('course_plan_id', $plans->pluck('id')->toArray())->load('coursePlan.subject.attachedCompetences');

        $competencesArray[0] = [];
        $competencesArray[1] = [];
        foreach ($grades as $grade):
            if ($grade->passed):
                foreach ($grade->coursePlan->subject->attachedCompetences as $comp):
                    $competencesArray[0][$comp->id] = $comp;
                endforeach;
            endif;
        endforeach;

        foreach ($plans as $plan):
            foreach ($plan->subject->attachedCompetences as $competence):
                if (!array_key_exists($competence->id, $competencesArray[0])):
                    $competencesArray[1][$competence->id] = $competence;
                endif;
            endforeach;
        endforeach;

        return view('qualificationFile', compact('competencesArray', 'user'));
    }

}
