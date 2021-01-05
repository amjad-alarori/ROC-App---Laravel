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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $programAreas = ProgramArea::all();

        return view('programs-area', ['programArea'=>$programAreas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Campus $campus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $programAreas = ProgramArea::all();
        return view('programs-area.create', ['programAreas'=>null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Campus $campus
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['string', 'required']
        ]);

        $opleiding = new ProgramArea();
        $opleiding->fill([
            'title' =>$request['title'],
            'description'=>$request['description']
        ]);

        $opleiding->save();

        return response()->json([
            'url' => route('study.index')
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(ProgramArea $programArea)
    {
        return view('programs-area.edit', ['programArea'=>$programArea]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramArea  $programArea
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ProgramArea $programArea)
    {

        $request->validate([
            'title' => ['string', 'required'],
            'description' => ['string', 'required']
        ]);

        $programArea->fill([
            'title' =>$request['title'],
            'description'=>$request['description']
        ]);

        $programArea->update();

        return response()->json([
            'url' => route('study.index')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\ProgramArea $programArea
     * @param Campus $campus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(ProgramArea $programArea)
    {
        $programArea->delete();
        return redirect(route('study.index'));
    }
}
