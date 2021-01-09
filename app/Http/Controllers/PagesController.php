<?php

namespace App\Http\Controllers;

use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (Auth::user()->role === 1) {
            return view('studentDashboard', ['user' => $user]);
        } elseif (Auth::user()->role === 2) {
            return view('docentDashboard', ['user' => $user]);
        } elseif (Auth::user()->role === 3) {
            $company = Auth::user()->company;
            $stages = $company->stages;

            return view('bedrijfDashboard', ['company' => $company, 'user' => $user, 'stages' => $stages]);
        }
    }

    public function redirectToDashboard(Request $request)
    {
        $user = User::query()->find($request['searchId']);

        return view('studentDashboard', ['user' => $user]);
    }

    public function companyLooksAtStudent(StageBedrijven $stageBedrijven,stage $stage,User $user)
    {
        return view('studentDashboard', ['user'=>$user]);
    }
}
