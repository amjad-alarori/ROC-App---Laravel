<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Semester;
use App\Models\Subject;
use App\Rules\SemesterSubjecRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $semesters = [];
        foreach ($program->semesters as $semester):
            if (!array_key_exists($semester->semester, $semesters)):
                $semesters[$semester->semester] = [];
            endif;

            if (!array_key_exists($semester->period, $semesters[$semester->semester])):
                $semesters[$semester->semester][$semester->period] = [];
                if ($semester->period == 2 && !array_key_exists(1, $semesters[$semester->semester])):
                    $semesters[$semester->semester][1] = [];
                endif;
                ksort($semesters[$semester->semester]);
            endif;

            array_push($semesters[$semester->semester][$semester->period], $semester->load('subject'));
        endforeach;

        return view('programPlanning', ['program' => $program, 'semesters' => $semesters]);
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
        $subjects = Subject::query()->where('program_id', null)->union($program->subjects())->get();

        if ($request->has('stage')):
            $isStage = true;
        else:
            $isStage = false;
        endif;

        return view('semester.create', ['program' => $program, 'subjects' => $subjects, 'isStage' => $isStage]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Program $program
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request, Program $program)
    {
        $rule = [
            'semester' => ['required', 'integer', 'between:1,' . $program->length * 2],
        ];

        if ($request->has('period')):
            $rule['period'] = ['required', Rule::in(['on'])];
            $rule['periodNr'] = ['required', Rule::in([1, 2])];
            $period = $request['periodNr'];
        else:
            $period = 1;
        endif;

        if ($request['isStage']==1):
            $rule['subjects'] = ['required', 'integer', 'min:1', new SemesterSubjecRule(true, $program, $request['semester'],$period)];
        else:
            $rule['subjects'] = ['required', 'array', 'min:1'];
            $rule['subjects.*'] = [new SemesterSubjecRule(false, $program)];
        endif;

        $request->validate($rule);

        $subjectsArray=[];
        if ($request['isStage']==1):
            array_push($subjectsArray,$request['subjects']);
        else:
            $subjectsArray=$request['subjects'];
        endif;

        foreach ($subjectsArray as $subject):
            $periodeNr = $request['periodNr'] == null ? 1 : $request['periodNr'];

            $duplCount = Semester::query()
                ->where('semester', '=', $request['semester'])
                ->where('period', '=', $periodeNr)
                ->where('subject_id', '=', $subject)->count();

            if ($duplCount == 0):
                $semester = new Semester();
                $semester->semester = $request['semester'];
                $semester->period = $periodeNr;
                $semester->program_id = $program->id;
                $semester->subject_id = $subject;

                $semester->save();
            endif;
        endforeach;

        return response()->json([
            'url' => route('semester.index', ['program' => $program])]);

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
     * @param Program $program
     * @param \App\Models\Semester $semester
     * @return void
     */
    public function edit(Program $program, Semester $semester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Program $program
     * @param \App\Models\Semester $semester
     * @return void
     */
    public function update(Request $request, Program $program, Semester $semester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Program $program
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Program $program, Semester $semester)
    {
        $semester->delete();
        return redirect()->back();
    }
}
