<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CompanyAccess;
use App\Http\Middleware\StudentAccess;
use App\Http\Middleware\StudentAndDocentAccess;
use App\Models\ProgramArea;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StageBedrijvenController extends Controller
{
    public function __construct()
    {


        $this->middleware(StudentAndDocentAccess::class)->only('index');



    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {

        $stageBedrijven = StageBedrijven::all();

        return view('stageBedrijven', ['stageBedrijven' => $stageBedrijven]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {

        return view('stageBedrijvenForm', ['bedrijf' => null]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'zip_code' => ['string', 'required'],
            'city' => ['string', 'required'],
            'email' => ['email', 'required', 'unique:users,email'], //zoek internet //
            'phone_nr' => ['string', 'required'],
            'contact_persoon' => ['string', 'required']
        ]);


        $user = new User;
        $user->forceFill([
            'name' => $request['contact_persoon'],
            'email' => $request['email'],
            'password' => 'newuser',
            'role' => 3,
        ]);
        $user->save();

        $company = new StageBedrijven();
        $company->forceFill([
            'name' => $request['name'],
            'address' => $request['address'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
            'user_id' => $user->id,
        ]);;
        $company->save();

//        $user= New User();
//        $user->name = $request['contactpersoon'];
//        $user->email = $company->email;
//        $user->password = 'newcompany';
//        $user->save();


//        return redirect(route('stageBedrijven.index'));

        return response()->json(['url' => route('stageBedrijven.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param StageBedrijven $stageBedrijven
     * @return Application|Factory|View|void
     */
    public function show(StageBedrijven $stageBedrijven)
    {

//        $stages = Stage::query()->with('users')->where('stageBedrijf_id', '=', $stageBedrijven->id)->get();

        $sectors =  ProgramArea::query()->with('stages')->whereHas('stages',null,'>',0)->get();

        return view('companyDashboard', ['company' => $stageBedrijven, 'sectors'=> $sectors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StageBedrijven $stageBedrijven
     * @return Application|Factory|View|Response
     */
    public function edit(StageBedrijven $stageBedrijven)
    {
        return view('stageBedrijvenEdit', ['stageBedrijven' => $stageBedrijven]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param StageBedrijven $stageBedrijven
     * @return JsonResponse
     */
    public function update(Request $request, StageBedrijven $stageBedrijven)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'zip_code' => ['string', 'required'],
            'city' => ['string', 'required'],
            'email' => ['string', 'required'],
            'phone_nr' => ['string', 'required'],
        ]);

        $stageBedrijven->fill([
            'name' => $request['name'],
            'address' => $request['address'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
        ]);

        $stageBedrijven->update();

//        return redirect(route('stageBedrijven.index'));
        return response()->json(['url' => route('stageBedrijven.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param StageBedrijven $stageBedrijven
     * @return RedirectResponse|Response
     * @throws Exception
     */
    public function destroy(StageBedrijven $stageBedrijven)
    {
        $stageBedrijven->delete();
        return redirect()->back();
    }


}
