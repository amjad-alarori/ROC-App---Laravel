<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\ProgramArea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $areas = ProgramArea::with('programs')->has('programs','>','0')->get()->sortBy('title')->sortBy('program.code');

        return view('programs',['areas'=>$areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $areas = ProgramArea::all();
        return view('program.create',compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'code'=>['required','string','unique:programs,code'],
            'title'=>['required','string'],
            'degree'=>['required','integer','between:1,5'],
            'length'=>['required','integer','min:1'],
            'area'=>['required','integer','exists:program_areas,id']
        ]);

        $program = new Program();
        $program->fill([
            'code'=>$request['code'],
            'title'=>$request['title'],
            'degree'=>$request['degree'],
            'length'=>$request['length'],
        ]);
        $program->area_id = $request['area'];

        $program->save();

        return response()->json([
            'url' => route('program.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\RedirectResponse
     */
    public function show(Program $program)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $areas = ProgramArea::all();
        return view('program.edit',compact(['program','areas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'code'=>['required','string','unique:programs,code,'.$program->id],
            'title'=>['required','string'],
            'degree'=>['required','integer','between:1,5'],
            'length'=>['required','integer','min:1'],
            'area'=>['required','integer','exists:program_areas,id']
        ]);

        $program->fill([
            'code'=>$request['code'],
            'title'=>$request['title'],
            'degree'=>$request['degree'],
            'length'=>$request['length'],
        ]);
        $program->area_id = $request['area'];

        $program->update();

        return response()->json([
            'url' => route('program.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return redirect()->back();
    }
}
