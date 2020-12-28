<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Competence;
use App\Models\Program;
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
<<<<<<< HEAD
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
=======
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects', ['subjects' => $subjects]);
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }

    /**
     * Show the form for creating a new resource.
     *
<<<<<<< HEAD
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
=======
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $competences = Competence::all();
        $programs = Program::all();
        return view('subject.create', ['competences' => $competences, 'programs' => $programs]);
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }

    /**
     * Store a newly created resource in storage.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
=======
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
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }

    /**
     * Display the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Subject  $subject
=======
     * @param \App\Models\Subject $subject
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
<<<<<<< HEAD
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
=======
     * @param \App\Models\Subject $subject
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $competences = Competence::all();
        $programs = Program::all();
        return view('subject.edit', ['subject' => $subject, 'competences' => $competences, 'programs' => $programs]);
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }

    /**
     * Update the specified resource in storage.
     *
<<<<<<< HEAD
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
=======
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
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }

    /**
     * Remove the specified resource from storage.
     *
<<<<<<< HEAD
     * @param  \App\Models\Subject  $subject
=======
     * @param \App\Models\Subject $subject
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
<<<<<<< HEAD
        //
=======
        $competences = $subject->attachedCompetences()->pluck('competences.id')->toArray();
        $subject->attachedCompetences()->detach($competences);
        $subject->delete();
        return redirect()->back();
>>>>>>> 6350fef58f7c176cc687f7c261cd4731bb3be24e
    }
}
