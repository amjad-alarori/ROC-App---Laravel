<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Course;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $studyYear
     * @param Campus|null $campus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index()
    {
        $yearArray = Course::query()->distinct('study_year')->pluck('study_year');
        $years = [];
        $areas = [];

        foreach ($yearArray as $year):
            $programsColl = Program::query()->with('courses')->whereHas('courses', function ($query) use ($year) {
                $query->where('study_year', '=', $year);
            }, '>', '0')->get();

            $programs = [];
            foreach ($programsColl as $program):
                $courses = Course::with('program')
                    ->where('study_year', '=', $year)
                    ->where('program_id', '=', $program->id)->get();

                foreach ($courses as $course):
                    $programs['area' . $program->area_id]['prog' . $course->id] = $course;
                endforeach;

                if (!array_key_exists($program->area_id, $areas)) {
                    $areas['area' . $program->area_id] = $program->area;
                }
            endforeach;

            $years['year' . $year] = $programs;
        endforeach;

//        dd($years);

        return view('course', ['years' => $years, 'areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $programs = Program::all();
        $campuses = Campus::all();
        return view('course.create', ['programs' => $programs, 'campuses' => $campuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' =>
                [
                    'required',
                    'integer',
                    'between:' . (date('Y') - 4) . ',9999'
                ],
            'campus' =>
                [
                    'required',
                    'integer',
                    'exists:campuses,id'
                ],
            'program' =>
                [
                    'required',
                    'integer',
                    'exists:programs,id',
                    Rule::unique('courses', 'program_id')->where(function ($q) use ($request) {
                        return $q->where('study_year', $request['year'])->where('campus_id', $request['campus']);
                    })
                ]
        ]);

        $course = new Course;

        $course->study_year = $request['year'];
        $course->program_id = $request['program'];
        $course->campus_id = $request['campus'];
        $course->save();

        return response()->json(['url' => route('course.show', [$course])]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        return view('courseDashboard',['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $programs = Program::all();
        $campuses = Campus::all();
        return view('course.edit', ['programs' => $programs, 'campuses' => $campuses, 'course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'year' =>
                [
                    'required',
                    'integer',
                    'between:' . (date('Y') - 4) . ',9999'
                ],
            'campus' =>
                [
                    'required',
                    'integer',
                    'exists:campuses,id'
                ],
            'program' =>
                [
                    'required',
                    'integer',
                    'exists:programs,id',
                    Rule::unique('courses', 'program_id')->where(function ($q) use ($request) {
                        return $q->where('study_year', $request['year'])->where('campus_id', $request['campus']);
                    })->ignore($course)
                ]
        ]);

        $course->study_year = $request['year'];
        $course->program_id = $request['program'];
        $course->campus_id = $request['campus'];
        $course->update();

        return response()->json(['url' => route('course.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->back();
    }
}
