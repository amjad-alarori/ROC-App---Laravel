<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Semester;
use App\Models\Subject;
use App\Rules\SemesterSubjectRule;
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
        $programSemesters = $program->semesters()->orderBy('semester')->orderBy('period')->get();
        $semesters = [];
        foreach ($programSemesters as $semester):
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

        if ($request['isStage'] == 1):
            $rule['subjects'] = ['required', 'integer', 'min:1', new SemesterSubjectRule(true, $program, null, $request['semester'], $period)];
        else:
            $rule['subjects'] = ['required', 'array', 'min:1'];
            $rule['subjects.*'] = [new SemesterSubjectRule(false, $program)];
        endif;

        $request->validate($rule);

        $subjectsArray = [];
        if ($request['isStage'] == 1):
            array_push($subjectsArray, $request['subjects']);
        else:
            $subjectsArray = $request['subjects'];
        endif;

        foreach ($subjectsArray as $subject):
            $duplCount = $program->semesters
                ->where('semester', '=', $request['semester'])
                ->where('period', '=', $period)
                ->where('subject_id', '=', $subject)->count();

            if ($duplCount == 0):
                $semester = new Semester();
                $semester->semester = $request['semester'];
                $semester->period = $period;
                $semester->program_id = $program->id;
                $semester->subject_id = $subject;

                $semester->save();
            endif;
        endforeach;

        return response()->json([
            'url' => route('program.semester.index', ['program' => $program])]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Semester $semester
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
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
     * @return \Illuminate\Http\RedirectResponse
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
        $competences = $semester->subject->attachedCompetences;
        $coOps = $program->semesters()
            ->with('subject.attachedCompetences')
            ->where('semester', '>', $semester->semester)
            ->orWhere(function ($q) use ($semester) {
                $q->where('semester', '=', $semester->semester)->where('period', '>', $semester->period);
            })->get();

        $i = 0;
        foreach ($coOps as $coOp):
            if ($coOp->subject->co_op):
                $coOpComps = $coOp->subject->attachedCompetences;
                foreach ($coOpComps as $coOpComp):

                    $i++;

                    if ($competences->contains($coOpComp)):
                        $foundedSemester = $program->semesters()->with('subject.attachedCompetences')
                            ->where('id', '<>', $semester->id)
                            ->where('semester', '<', $coOp->semester)
                            ->orWhere(function ($q) use ($coOp) {
                                $q->where('semester', '=', $coOp->semester)->where('period', '<', $coOp->period);
                            })->first();

                        if (!$foundedSemester->subject->attachedCompetences->contains($coOpComp)):
                            return redirect()->back()->with('showError', 'De competenties van deze vak is voor een stage gebruikt.');
                        endif;
                    endif;
                endforeach;
            endif;
        endforeach;

        $semester->delete();
        return redirect()->back();
    }
}
