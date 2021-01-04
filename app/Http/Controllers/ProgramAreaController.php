<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\ProgramArea;
use Illuminate\Http\Request;

class ProgramAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function index(Campus $campus)
    {
        $programAreas = ProgramArea::all();

        return view('programs-area', ['campus'=>$campus, 'programArea'=>$programAreas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function create(Campus $campus)
    {
        $programAreas = ProgramArea::all();
        return view('programs-area.create', ['campus'=>$campus->id, 'programAreas'=>$programAreas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Campus $campus)
    {
        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['text', 'required'],
            'type' => ['string', 'required'],
            'code' => ['integer', 'required']
        ]);

        $opleiding = new ProgramArea();
        $opleiding->title = $request->get('title');
        $opleiding->description = $request->get('description');
        $opleiding->type = $request->get('type');
        $opleiding->code = $request->get('code');
        $opleiding->campusId = $campus->id;


        $opleiding->save();

//        return redirect(route('opleiding.index',['campus'=>$campus]));
//        return redirect(route('study.index'));
        return response()->json([
            'url' => route('study.index', ['campus' =>  $campus])
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramArea  $programArea
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramArea $programArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramArea  $programArea
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramArea $programArea)
    {
        $programAreas = ProgramArea::all();
        return view('programs-area.edit', compact('programAreas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramArea  $programArea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramArea $programArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProgramArea $programArea
     * @param Campus $campus
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(ProgramArea $programArea)
    {
        $programArea->delete($programArea->id);
        return redirect(route('study.index'));
    }
}
