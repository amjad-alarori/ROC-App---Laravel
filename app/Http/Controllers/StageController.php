<?php

namespace App\Http\Controllers;

use App\Models\stage;
use App\Models\StageBedrijven;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(stageBedrijven $stageBedrijven)
    {

        return view('stageForm',['company'=>$stageBedrijven]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request, StageBedrijven $stageBedrijven)
    {
        $request->validate([
            'functie' => ['string', 'required'],
            'leerweg' => ['string', 'required'],
            'aantal_plaatsen' => ['integer', 'required'],
            'start_datum' => ['date', 'required'],
            'eind_datum' => ['date', 'required'],
            'wat_te_doen' => ['string', 'required'],
            'werkzaamheden'=>['string', 'required'],
            'wat_zoeken_wij' =>['string', 'required'],
        ]);

        $stage_plek = new Stage();
        $stage_plek->fill([
            'functie' => $request['functie'],
            'leerweg' => $request['leerweg'],
            'aantal_plaatsen' => $request['aantal_plaatsen'],
            'start_datum' => $request['start_datum'],
            'eind_datum' => $request['eind_datum'],
            'wat_te_doen' => $request['wat_te_doen'],
            'werkzaamheden' => $request['werkzaamheden'],
            'wat_zoeken_wij' => $request['wat_zoeken_wij'],
            'stageBedrijf_id' => $stageBedrijven->id
        ]);

        $stage_plek->save();

        return response()->json(['url' => route('stageBedrijven.show',['stageBedrijven'=>$stageBedrijven])]);
    }

    /**
     * Display the specified resource.
     *
     * @param stage $stage
     * @return void
     */
    public function show(stage $stage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param stage $stage
     * @return Response
     */
    public function edit(stage $stage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param stage $stage
     * @return Response
     */
    public function update(Request $request, stage $stage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param stage $stage
     * @param StageBedrijven $company
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(stageBedrijven $stageBedrijven, Stage $stage)
    {

        $stage->delete();

        return redirect()->back();
    }
}
