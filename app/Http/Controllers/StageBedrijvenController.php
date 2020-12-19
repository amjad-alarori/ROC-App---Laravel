<?php

namespace App\Http\Controllers;

use App\Models\StageBedrijven;
use Illuminate\Http\Request;

class StageBedrijvenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $stageBedrijven = StageBedrijven::all();

        return view('stageBedrijven', ['stageBedrijven' => $stageBedrijven]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stageBedrijvenForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'address' => ['string', 'required'],
            'zip_code' => ['string', 'required'],
            'city' => ['string', 'required'],
            'email' => ['string', 'required'],
            'phone_nr' => ['string', 'required'],
        ]);

        $bedrijf = new StageBedrijven();
        $bedrijf->fill([
            'name' => $request['name'],
            'address' => $request['address'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
        ]);

        $bedrijf->save();

        return redirect(route('stageBedrijven.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StageBedrijven  $stageBedrijven
     * @return \Illuminate\Http\Response
     */
    public function show(StageBedrijven $stageBedrijven)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StageBedrijven  $stageBedrijven
     * @return \Illuminate\Http\Response
     */
    public function edit(StageBedrijven $stageBedrijven)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StageBedrijven  $stageBedrijven
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StageBedrijven $stageBedrijven)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StageBedrijven  $stageBedrijven
     * @return \Illuminate\Http\Response
     */
    public function destroy(StageBedrijven $stageBedrijven)
    {
        //
    }
}
