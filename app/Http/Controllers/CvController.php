<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(User $user = null)
    {
        if ($user ===null):
            $user = Auth::user();
        endif;

        $cv = CV::query()->where('user_id', '=', $user->id)->get();

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
            'firstName' => ['nullable','nullable','string'],
            'lastName' => ['nullable','string'],
            'birthDate' => ['nullable','string'],
            'address' => ['nullable','string'],
            'city' => ['nullable','string'],
            'zip_code' => ['nullable','string'],
            'email' => ['nullable','email'],
            'phone_nr' => ['nullable','string'],

            'education_mbo'=>['nullable','string'],
            'institute_mbo'=>['nullable','string'],
            'startDate_mbo'=>['nullable','string'],
            'endDate_mbo'=>['nullable','string'],

            'level'=>['nullable','string'],
            'institute_middle'=>['nullable','string'],
            'startDate_middle'=>['nullable','string'],
            'endDate_middle'=>['nullable','string'],

            'institute_basic'=>['nullable','string'],
            'startDate_basic'=>['nullable','string'],
            'endDate_basic'=>['nullable','string'],

            'company'=>['nullable','string'],
            'function'=>['nullable','string'],
            'startDate_work'=>['nullable','string'],
            'endDate_work'=>['nullable','string'],

            'hobbyOne'=>['nullable','string'],
            'hobbyTwo'=>['nullable','string'],
            'hobbyThree'=>['nullable','string'],
            'hobbyFour'=>['nullable','string'],

            'skillOne'=>['nullable','string'],
            'skillTwo'=>['nullable','string'],
            'skillThree'=>['nullable','string'],
            'skillFour'=>['nullable','string'],

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

        $cv->user_id= Auth::id();

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
    public function show(Request $request)
    {
        $user = User::find($request['user']);
        return $this->index($user);
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
