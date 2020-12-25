<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Course;
use App\Models\Program;
use App\Models\ProgramArea;
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
//        $areas = ProgramArea::with('programs')->has('programs','>','0')->whereHas()->sortBy('title')->sortBy('program.code');

        $yearArray =Course::query()->distinct('study_year')->pluck('study_year') ;


        $years = Course::with(['program'=>function($query){
            $query->with('area')->get();
        }])->get()->groupBy('study_year');

        dd($yearArray, $years);

        return view('course', ['years' => $years]);
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
            'program' =>
                [
                    'required',
                    'integer',
                    'exists:programs,id',
                    Rule::unique('courses', 'program_id')->where(function ($q) use ($request) {
                        return $q->where('study_year', $request['year']);
                    })
                ],
            'campus' =>
                [
                    'required',
                    'integer',
                    'exists:campuses,id'
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
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        dd($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
