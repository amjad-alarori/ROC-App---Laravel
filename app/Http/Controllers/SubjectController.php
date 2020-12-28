<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Program;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $competences = Competence::all();
        $programs = Program::all();
        return view('subject.create', ['competences' => $competences, 'programs' => $programs]);
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
            'title' => ['required', 'string'],
            'credits' => ['required', 'integer', 'min:1'],
            'competences' => ['required', 'array', 'min:1'],
            'program' => ['integer', 'nullable'],
        ]);

        $subject = new Subject();
        $subject->forceFill([
            'title' => $request['title'],
            'e_credit' => $request['credits'],
        ]);
        $subject->program_id = $request['program'];
        $subject->save();

        foreach ($request['competences'] as $item):
            $itemArray = explode(',', $item);

            if ($itemArray[0] == 'new'):
                $competence = Competence::create(['title' => $itemArray[1]]);
            else:
                $competence = Competence::find($itemArray[1]);
            endif;

            $subject->attachedCompetences()->attach($competence);

        endforeach;

        return response()->json([
            'url' => route('subject.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $competences = Competence::all();
        $programs = Program::all();
        return view('subject.edit', ['subject' => $subject, 'competences' => $competences, 'programs' => $programs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'credits' => ['required', 'integer', 'min:1'],
            'competences' => ['required', 'array', 'min:1'],
            'program' => ['integer', 'nullable'],
        ]);

        $subject->forceFill([
            'title' => $request['title'],
            'e_credit' => $request['credits'],
        ]);
        $subject->program_id = $request['program'];
        $subject->update();

        $compArray = [];
        foreach ($request['competences'] as $item):
            $itemArray = explode(',', $item);

            if ($itemArray[0] == 'new'):
                $competence = Competence::create(['title' => $itemArray[1]]);
            else:
                $competence = Competence::find($itemArray[1]);
            endif;

            array_push($compArray, $competence->id);

        endforeach;
        $subject->attachedCompetences()->sync($compArray);

        return response()->json([
            'url' => route('subject.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $competences = $subject->attachedCompetences()->pluck('competences.id')->toArray();
        $subject->attachedCompetences()->detach($competences);
        $subject->delete();
        return redirect()->back();
    }
}
