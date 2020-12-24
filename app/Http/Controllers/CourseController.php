<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Course;
use App\Models\Program;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param null $studyYear
     * @param Campus|null $campus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index($studyYear = null, Campus $campus = null)
    {
        if (!is_null($studyYear)):
            $courses = Course::query()->where('study_year', '=', $studyYear)->get();
        elseif (!is_null($campus)):
            $courses = $campus->courses()->orderBy('study_year', 'desc');
        else:
            $courses = Course::all();
        endif;

        return view('course', ['courses' => $courses]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => ['required', 'integer', 'between:' . date('Y') - 4 . ',9999'],
            'program' => ['required', 'integer', 'exists:programs,id'],
            'campus' => ['required', 'integer', 'exists: campuses,id']
        ]);

        Course::create([
            'study_year'=>$request['year'],

        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Course $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
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
