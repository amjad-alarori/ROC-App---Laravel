<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::all();

        return view('locations', ['campuses' => $campuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'street' => ['string', 'required'],
            'house_nr' => ['integer', 'required', 'min:1'],
            'house_nr_addition' => ['string', 'nullable'],
            'zip_code' => ['string', 'required'],
            'city' => ['string', 'required'],
            'email' => ['string', 'required'],
            'phone_nr' => ['string', 'required'],
        ]);

        $campus = new Campus();
        $campus->fill([
            'name' => $request['name'],
            'street' => $request['street'],
            'house_nr' => $request['house_nr'],
            'house_nr_addition' => $request['house_nr_addition'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
        ]);

        $campus->save();

        return response()->json([
            'url' => route('campus.index')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Campus $campus
     * @return \Illuminate\Http\Response
     */
    public function show(Campus $campus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Campus $campus
     * @return false|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response|string
     */
    public function edit(Campus $campus)
    {
        return view('location.edit', ['campus'=>$campus]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Campus $campus
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Campus $campus)
    {
        $request->validate([
            'name' => ['string', 'required'],
            'street' => ['string', 'required'],
            'house_nr' => ['integer', 'required', 'min:1'],
            'house_nr_addition' => ['string', 'nullable'],
            'zip_code' => ['string', 'required'],
            'city' => ['string', 'required'],
            'email' => ['string', 'required'],
            'phone_nr' => ['string', 'required'],
        ]);

        $campus->fill([
            'name' => $request['name'],
            'street' => $request['street'],
            'house_nr' => $request['house_nr'],
            'house_nr_addition' => $request['house_nr_addition'],
            'zip_code' => $request['zip_code'],
            'city' => $request['city'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],
        ]);

        $campus->update();
        return response()->json([
            'url' => route('campus.index')
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Campus $campus
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Campus $campus)
    {
        $campus->delete();
        return redirect()->back();
    }
}
