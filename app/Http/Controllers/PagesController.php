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

            $stages = $company->stages;

            return view('bedrijfDashboard', ['company' => $company, 'user' => $user, 'stages' => $stages]);
        }
    }


    public function redirectToDashboard(Request $request)
    {
        $user = User::query()->find($request['searchId']);

        return view('studentDashboard', ['user' => $user]);
    }


    public function companyLooksAtStudent(StageBedrijven $stageBedrijven, stage $stage, User $user)
    {
        return view('studentDashboard', ['user' => $user]);

    }

    public function redirectToCompanyDashboard(Request $request)
    {
        $companyId = $request['searchId'];

        return redirect(route('stageBedrijven.show', ['stageBedrijven' => $companyId]));

    }

    public function toQFile(User $user)
    {
        if (Auth::user()->role === 1):
            $user = Auth::user();
            $courses = $user->courses;

            if ($courses->count() === 0):
                return redirect()->back()->with('NoAccess', 'Jij bent nog voor geen opleiding aangemeld!');
            elseif ($courses->count() === 1):
                $course = $courses->first();
                return redirect(route('qfFileStudent', ['user' => $user, 'course' => $course]));
            else:
                /**
                 *Maak een blade waar de student kan kiezen de kwalificatie dossier van welke course wilt zien
                 */


            endif;

        elseif (Auth::user()->role === 3):

        else:
            return redirect()->back()->with('NoAccess', 'Toegang geweigerd!');
        endif;

    }
}
