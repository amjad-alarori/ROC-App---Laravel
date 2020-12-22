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

        return view('programs-area', ['programArea'=>$programAreas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function create(Campus $campus)
    {
        return view('programs-areaForms', ['campus' => $campus]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Campus $campus)
    {
        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['string', 'required'],
        ]);

        $opleiding = new ProgramArea();
        $opleiding->title = $request->get('title');
        $opleiding->description = $request->get('description');
//        $opleiding->campusId = $campus->id;


        $opleiding->save();

//        return redirect(route('opleiding.index',['campus'=>$campus]));
        return redirect(route('opleiding.index'));
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
        //
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
        dd($programArea);
        return redirect(route('opleiding.index'));
    }
}
