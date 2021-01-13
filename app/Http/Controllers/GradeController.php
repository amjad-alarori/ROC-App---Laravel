<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Course;
use App\Models\CoursePlan;
use App\Models\Grade;
use App\Models\User;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param Course $course
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Request $request, Course $course, $id)
    {
        if ($request->route()->hasParameter('coursePlan')):
            $plan = CoursePlan::find($id)->load('grades.student')->load('course.students');
            $campus = Campus::find($plan->course->campus_id);

            $filledStudents = [];
            foreach ($plan->grades as $grade):
                $filledStudents [$grade->student->id] = $grade;
            endforeach;


            if ($plan->subject->co_op):
                $coOpLocations = [];

                foreach ($plan->course->students as $student):
                    $coOpLocations[$student->id] = $plan->coOpReady($student);
                endforeach;
            else:
                $coOpLocations = null;
            endif;

            return view('courseGrades', [
                'course' => $course,
                'plan' => $plan,
                'filledStudents' => $filledStudents,
                'campus' => $campus,
                'coOpLocations' => $coOpLocations,
            ]);
        elseif ($request->route()->hasParameter('coursePlan')):


            //all cijfers of a student op a blade
            dd($request->route()->parameterNames);


        else:
            return abort(404);
        endif;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @param CoursePlan $coursePlan
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Course $course, CoursePlan $coursePlan)
    {
        $defIds = $request['defBox'] === null ? [] : $request['defBox'];
        $passedIds = $request['passedBox'] === null ? [] : $request['passedBox'];
        $passedIds = array_unique(array_merge($passedIds, $defIds));

        $studentIds = $coursePlan->grades->map(function ($grade) use ($passedIds, $defIds) {
            if (in_array($grade->student_id, $passedIds)):
                $grade->passed = true;

                if (in_array($grade->student_id, $defIds)):
                    $grade->definitive = true;
                else:
                    $grade->definitive = false;
                endif;
            else:
                $grade->passed = false;
                $grade->definitive = false;
            endif;

            if ($grade->getOriginal("passed") != $grade->passed || $grade->getOriginal("definitive") != $grade->definitive):
                $grade->update();
            endif;

            return $grade->student_id;
        });

        foreach ($passedIds as $studentId):
            if (!$studentIds->contains($studentId)):
                $grade = new Grade;

                $grade->student_id = $studentId;
                $grade->course_plan_id = $coursePlan->id;
                $grade->passed = true;

                if (in_array($grade->student_id, $defIds)):
                    $grade->definitive = true;
                endif;

                $grade->save();
            endif;
        endforeach;

        return redirect(route('plan.index', ['course' => $course]));
    }

    /**
     * Display the specified resource.
     *
     * @param Grade $grade
     * @return void
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $student
     * @param Grade $grade
     * @return void
     */
    public function edit(User $student, Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Grade $grade
     * @return void
     */
    public function update(Request $request,Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Grade $grade
     * @return void
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
