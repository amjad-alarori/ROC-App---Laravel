<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CompanyAccess;
use App\Http\Middleware\DocentAccess;
use App\Http\Middleware\DocentAndCompanyAccess;
use App\Http\Middleware\StudentAccess;
use App\Http\Middleware\StudentAndDocentAccess;
use App\Models\ProgramArea;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param StageBedrijven $stageBedrijven
     * @param stage $stage
     * @return void
     */

    public function __construct()
    {
        $this->middleware(StudentAccess::class)->only('show', 'undo');
        $this->middleware(StudentAndDocentAccess::class)->only('reactions');
        $this->middleware(DocentAndCompanyAccess::class)->only('destroy', 'getLikes');
        $this->middleware(CompanyAccess::class)->except('show', 'undo', 'destroy', 'getLikes', 'index', 'reactions');

    }

    public function index(Request $request)
    {
        if ($request->has('filterKey') && $request['filterKey'] > 0):
            $filterId = $request['filterKey'];

            $stages = stage::query()->where('sector_id', '=', $filterId)->get();
        else:
            $stages = stage::all();
            $filterId = 0;
        endif;

        $sectors = ProgramArea::all();
        $companies = StageBedrijven::all();


        return view('stageList', ['sectors' => $sectors, 'stages' => $stages, 'filterId' => $filterId, 'stageBedrijven' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create(stageBedrijven $stageBedrijven)
    {
        $sectors = ProgramArea::all();
        return view('stageCreate', ['stageBedrijven' => $stageBedrijven, 'sectors' => $sectors]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param StageBedrijven $stageBedrijven
     * @return JsonResponse
     */
    public function store(Request $request, StageBedrijven $stageBedrijven)
    {

        $request->validate([
            'wie_zijn_wij' => ['string', 'required'],
            'functie' => ['string', 'required'],
            'leerweg' => ['string', 'required'],
            'aantal_plaatsen' => ['integer', 'required'],
            'start_datum' => ['date', 'required'],
            'eind_datum' => ['date', 'required'],
            'wat_te_doen' => ['string', 'required'],
            'werkzaamheden' => ['string', 'required'],
            'wat_zoeken_wij' => ['string', 'required'],
            'sectors' => ['integer', 'required', 'exists:program_areas,id'],
        ]);


        $stageBedrijven->update();


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
            'sector_id' => $request ['sectors'],
            'stageBedrijf_id' => $stageBedrijven->id

        ]);

        $stage_plek->save();

        return response()->json(['url' => route('stageBedrijven.show', ['stageBedrijven' => $stageBedrijven])]);
    }

    /**
     * Display the specified resource.
     *
     * @param StageBedrijven $stageBedrijven
     * @param stage $stage
     * @return void
     */
    public function show(StageBedrijven $stageBedrijven, stage $stage)
    {

        $user = auth()->user();
        $stage->users()->attach($user);
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param stage $stage
     * @return Application|Factory|View|Response
     */
    public function edit(stageBedrijven $stageBedrijven, Stage $stage)
    {
        $sectors = ProgramArea::all();
        return view('stageEdit', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'sectors' => $sectors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param stage $stage
     * @return Response
     */
    public function update(Request $request, StageBedrijven $stageBedrijven, stage $stage)

    {

        $request->validate([
            'wie_zijn_wij' => ['string', 'required'],
            'functie' => ['string', 'required'],
            'leerweg' => ['string', 'required'],
            'aantal_plaatsen' => ['integer', 'required'],
            'start_datum' => ['date', 'required'],
            'eind_datum' => ['date', 'required'],
            'wat_te_doen' => ['string', 'required'],
            'werkzaamheden' => ['string', 'required'],
            'wat_zoeken_wij' => ['string', 'required'],
        ]);
        $stageBedrijven->wie_zijn_wij = $request['wie_zijn_wij'];
        $stageBedrijven->update();
        $stage->fill([
            'wie_zijn_wij' => $request['wie_zijn_ons'],
            'functie' => $request['functie'],
            'leerweg' => $request['leerweg'],
            'aantal_plaatsen' => $request['aantal_plaatsen'],
            'start_datum' => $request['start_datum'],
            'eind_datum' => $request['eind_datum'],
            'wat_te_doen' => $request['wat_te_doen'],
            'werkzaamheden' => $request['werkzaamheden'],
            'wat_zoeken_wij' => $request['wat_zoeken_wij'],
        ]);
        $stage->update();

        return response()->json(['url' => route('stageBedrijven.show', ['stageBedrijven' => $stageBedrijven]),]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param StageBedrijven $stageBedrijven
     * @param stage $stage
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(stageBedrijven $stageBedrijven, Stage $stage)
    {

        $stage->users()->detach();
        $stage->delete();
        return redirect()->back();
    }

    public function getLikes(stageBedrijven $stageBedrijven, Stage $stage)
    {
        $users = $stage->users;
        return view('studentLikes', compact('users', 'stage'));
    }


    public function undo(stageBedrijven $stageBedrijven, stage $stage)
    {
        $stage->users()->detach(Auth::user());
        return redirect()->back();
    }

    public function reactions(Request $request, stageBedrijven $stageBedrijven, stage $stage)
    {
        if ($request->has('student')):
            $user = User::find($request['student']);
            $reactions = $user->stage;
        else:
            $reactions = Auth::user()->stage;
        endif;

        return view('reacties', ['stageBedrijven' => $stageBedrijven, 'reactions' => $reactions]);


    }

}
