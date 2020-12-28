<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Semester;
use App\Models\Subject;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Program $program
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Program $program)
    {
        return view('programPlanning', ['program' => $program]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Program $program
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function create(Request $request, Program $program)
    {
        $subjects = Subject::query()->where('program_id',null)->union($program->subjects())->get();

        if ($request->has('stage')):
            return view('semester.stageCreate',['program'=>$program,'subjects'=>$subjects]);
        else:
            return view('semester.create',['program'=>$program,'subjects'=>$subjects]);
        endif;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function show(Semester $semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function edit(Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(Semester $semester)
    {
        //
    }
}
