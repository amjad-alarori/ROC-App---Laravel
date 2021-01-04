<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Course $course
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function index(Course $course)
    {
        $course->load('students');

        return view('enrollments',['course'=>$course]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Course $course
     * @return void
     */
    public function create(Course $course)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @return void
     */
    public function store(Request $request, Course $course)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @param int $id
     * @return void
     */
    public function show(Course $course, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @param int $id
     * @return void
     */
    public function edit(Course $course, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Course $course
     * @param int $id
     * @return void
     */
    public function update(Request $request, Course $course, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @param int $id
     * @return void
     */
    public function destroy(Course $course, $id)
    {
        //
    }
}
