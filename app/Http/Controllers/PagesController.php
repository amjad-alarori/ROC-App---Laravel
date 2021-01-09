<?php

namespace App\Http\Controllers;

use App\Models\ProgramArea;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {

//        $user= User::query()->where('id', '=', 4);
//        $password = password_hash('test123', PASSWORD_BCRYPT);
//        $user->password = $password;
//        $user->update();


        $user = Auth::user();
        if (Auth::user()->role === 1) {
            return view('studentDashboard', ['user' => $user]);
        } elseif (Auth::user()->role === 2) {
            return view('docentDashboard', ['user' => $user]);
        } elseif (Auth::user()->role === 3) {
            $company = Auth::user()->company;

//            $stages = $company->stages;
//            dd($stages);

            $sectors = ProgramArea::query()->with('stages')->whereHas('stages', null, '>', 0)->get();

            return view('bedrijfDashboard', ['company' => $company, 'user' => $user, 'sectors' => $sectors]);
        }


    }

    public function redirectToDashboard(Request $request)
    {

        $user = User::query()->find($request['searchId']);

        return view('studentDashboard', ['user' => $user]);
    }

    public function companyLooksAtStudent(StageBedrijven $stageBedrijven, User $user)
    {

        return view('studentDashboard', ['user' => $user]);


    }
}
