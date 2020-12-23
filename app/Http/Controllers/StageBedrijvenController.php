<?php

namespace App\Http\Controllers;

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
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;

class StageBedrijvenController extends Controller
{
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

        return view('stageBedrijvenForm',['bedrijf'=>null]);
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
            'email' => ['email', 'required'],
            'phone_nr' => ['string', 'required'],
            'contact_persoon'=>['string', 'required']
        ]);

        $company = new StageBedrijven();
        $company->fill([
            'name' => $request['name'],
            'address' => $request['address'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
        ]);

        $company->save();

//        $user= New User();
//        $user->name = $request['contactpersoon'];
//        $user->email = $company->email;
//        $user->password = 'newcompany';
//        $user->save();

        User::create([
            'name' => $request['contact_persoon'],
            'email' => $request['email'],
            'password' => 'newuser',
        ]);
//        return redirect(route('stageBedrijven.index'));

        return response()->json(['url' => route('stageBedrijven.index')]);
    }

    /**
     * Display the specified resource.
     *
     * @param StageBedrijven $company
     * @return void
     */
    public function show(StageBedrijven $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param StageBedrijven $stageBedrijven
     * @return Application|Factory|View|Response
     */
    public function edit(StageBedrijven $stageBedrijven)
    {
        return view('stageBedrijvenEdit', ['stageBedrijven'=>$stageBedrijven]);
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
