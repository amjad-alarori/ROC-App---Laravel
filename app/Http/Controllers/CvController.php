<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\User;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $cv = CV::query()->where('email', '=', $user->email)->get();
        return view('cv', ['cv'=>$cv]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cvForm', ['cv'=>null]);
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
            'firstName' => ['string'],
            'lastName' => ['string'],
            'birthDate' => ['string'],
            'address' => ['string'],
            'city' => ['string'],
            'zip_code' => ['string'],
            'email' => ['email'],
            'phone_nr' => ['string'],

            'education_mbo'=>['string'],
            'institute_mbo'=>['string'],
            'startDate_mbo'=>['string'],
            'endDate_mbo'=>['string'],

            'level'=>['string'],
            'institute_middle'=>['string'],
            'startDate_middle'=>['string'],
            'endDate_middle'=>['string'],

            'institute_basic'=>['string'],
            'startDate_basic'=>['string'],
            'endDate_basic'=>['string'],

            'company'=>['string'],
            'function'=>['string'],
            'startDate_work'=>['string'],
            'endDate_work'=>['string'],

            'hobbyOne'=>['string'],
            'hobbyTwo'=>['string'],
            'hobbyThree'=>['string'],
            'hobbyFour'=>['string'],

            'skillOne'=>['string'],
            'skillTwo'=>['string'],
            'skillThree'=>['string'],
            'skillFour'=>['string'],

        ]);

        $cv = new CV();
        $cv->fill([
            'firstName' => $request['firstName'],
            'lastName' => $request['lastName'],
            'birthDate' => $request['birthDate'],

            'address' => $request['address'],
            'city' => $request['city'],
            'zip_code' => $request['zip_code'],
            'email' => $request['email'],
            'phone_nr' => $request['phone_nr'],

            'education_mbo' => $request['education_mbo'],
            'institute_mbo' => $request['institute_mbo'],
            'startDate_mbo' => $request['startDate_mbo'],
            'endDate_mbo' => $request['endDate_mbo'],

            'level' => $request['level'],
            'institute_middle' => $request['institute_middle'],
            'startDate_middle' => $request['startDate_middle'],
            'endDate_middle' => $request['endDate_middle'],

            'company' => $request['company'],
            'function' => $request['function'],
            'startDate_work' => $request['startDate_work'],
            'endDate_work' => $request['endDate_work'],

            'hobbyOne' => $request['hobbyOne'],
            'hobbyTwo' => $request['hobbyTwo'],
            'hobbyThree' => $request['hobbyThree'],
            'hobbyFour' => $request['hobbyFour'],

            'skillOne' => $request['skillOne'],
            'skillTwo' => $request['skillTwo'],
            'skillThree' => $request['skillThree'],
            'skillFour' => $request['skillFour'],



        ]);

        $cv->save();

        return response()->json(['url' => route('cv.index')
        ]);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cv $cv)
    {

        $cv->delete();
        return redirect()->back();

    }
}
