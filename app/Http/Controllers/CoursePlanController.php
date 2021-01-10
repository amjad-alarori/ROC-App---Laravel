<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursePlan;
use App\Models\Subject;
use App\Rules\SemesterSubjectRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CoursePlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Course $course)
    {
        $plans = [];
        foreach ($course->plans as $plan):
            if (!array_key_exists($plan->semester, $plans)):
                $plans[$plan->semester] = [];
            endif;

            if (!array_key_exists($plan->period, $plans[$plan->semester])):
                $plans[$plan->semester][$plan->period] = [];
                if ($plan->period == 2 && !array_key_exists(1, $plans[$plan->semester])):
                    $plans[$plan->semester][1] = [];
                endif;
                ksort($plans[$plan->semester]);
            endif;

            array_push($plans[$plan->semester][$plan->period], $plan->load('subject'));
        endforeach;

        return view('coursePlanning', ['course' => $course, 'plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function create(Request $request, Course $course)
    {
        $subjects = Subject::query()->where('program_id', null)->union($course->program->subjects())->get();

        if ($request->has('stage')):
            $isStage = true;
        else:
            $isStage = false;
        endif;

        return view('plan.create', ['course' => $course, 'subjects' => $subjects, 'isStage' => $isStage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Course $course)
    {
        if ($request->has('standard')):

            $plans = $course->plans->map(function ($plan) use ($course) {
                $semesters = $course->program->semesters
                    ->where('semester', '=', $plan->semester)
                    ->where('period', '=', $plan->period);

                foreach ($semesters as $semester):
                    if ($semester->subject_id == $plan->subject_id):
                        return $plan->subject;
                    endif;
                endforeach;
                $plan->delete();
            });

            $course->program->semesters->map(function ($semester) use ($plans, $course) {
                if (!$plans->contains($semester->subject)):
                    $plan = new CoursePlan;

                    $plan->forceFill([
                        'semester' => $semester->semester,
                        'period' => $semester->period,
                        'course_id' => $course->id,
                        'subject_id' => $semester->subject_id,
                    ]);
                    $plan->save();
                endif;
            });

            return redirect()->back();
        else:
            $rule = [
                'semester' => ['required', 'integer', 'between:1,' . $course->program->length * 2],
            ];

            if ($request->has('period')):
                $rule['period'] = ['required', Rule::in(['on'])];
                $rule['periodNr'] = ['required', Rule::in([1, 2])];
                $period = $request['periodNr'];
            else:
                $period = 1;
            endif;

            if ($request['isStage'] == 1):
                $rule['subjects'] = ['required', 'integer', 'min:1', new SemesterSubjectRule(true, $course->program, $course, $request['semester'], $period)];
            else:
                $rule['subjects'] = ['required', 'array', 'min:1'];
                $rule['subjects.*'] = [new SemesterSubjectRule(false, $course->program, $course)];
            endif;

            $request->validate($rule);

            $subjectsArray = [];
            if ($request['isStage'] == 1):
                array_push($subjectsArray, $request['subjects']);
            else:
                $subjectsArray = $request['subjects'];
            endif;

            foreach ($subjectsArray as $subject):
                $duplCount = $course->program->semesters
                    ->where('semester', '=', $request['semester'])
                    ->where('period', '=', $period)
                    ->where('subject_id', '=', $subject)->count();

                if ($duplCount == 0):
                    $semester = new CoursePlan();
                    $semester->semester = $request['semester'];
                    $semester->period = $period;
                    $semester->course_id = $course->id;
                    $semester->subject_id = $subject;

                    $semester->save();
                endif;
            endforeach;

            return response()->json([
                'url' => route('plan.index', ['course' => $course])]);

        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param \App\Models\CoursePlan $coursePlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Course $course, CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @param \App\Models\CoursePlan $coursePlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Course $course, CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @param \App\Models\CoursePlan $coursePlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Course $course, CoursePlan $coursePlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @param \App\Models\CoursePlan $coursePlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course, CoursePlan $coursePlan)
    {
        $coursePlan->delete();
        return redirect()->back();
    }
}
