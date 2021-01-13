<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\ProgramArea;
use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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
        $user = User::find(intval($request['SearchId']));
        $courses = $user->courses;

        return view('studentDashboard', ['user' => $user, 'courses' => $courses]);
    }


    public function companyLooksAtStudent(StageBedrijven $stageBedrijven, stage $stage, User $user)
    {
        return view('studentDashboard', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user' => $user]);

    }

    public function redirectToCompanyDashboard(Request $request)
    {
        $companyId = $request['searchId'];

        return redirect(route('stageBedrijven.show', ['stageBedrijven' => $companyId]));

    }

    public function toQFile(Request $request, User $user)
    {
        if (Auth::user()->role === 1):
            $user = Auth::user();

            if ($request->has('course')):
                $course = Course::find($request['course']);
                $courses = new Collection();
                $courses = $courses->push($course);
            else:
                $courses = $user->courses;
            endif;

            if ($courses->count() === 0):
                return redirect()->back()->with('NoAccess', 'Je bent nog voor geen opleiding aangemeld!');
            elseif ($courses->count() === 1):
                $course = $courses->first();
                return redirect(route('qfFileStudent', ['user' => $user, 'course' => $course]));
            else:
                return redirect(route('chooseCourseforQF', ['user' => $user]));
            endif;
        else:
            return redirect()->back()->with('NoAccess', 'Toegang geweigerd!');
        endif;

    }

    public function chooseCourse(User $user)
    {
        $courses = $user->courses;

        return view('chooseCourseForQf', ['user' => $user, 'courses' => $courses]);
    }

    public function companyToStudentQFile(Request $request, StageBedrijven $stageBedrijven, stage $stage, User $user)
    {
        if (Auth::user()->role === 3):
            if ($request->has('course')):
                $course = Course::find($request['course']);
                $courses = new Collection();
                $courses = $courses->push($course);
            else:
                $courses = $user->courses;
            endif;

            if ($courses->count() === 0):
                return redirect()->back()->with('NoAccess', 'Je bent nog voor geen opleiding aangemeld!');
            elseif ($courses->count() === 1):
                $course = $courses->first();

                return redirect(route('CompanyToStudentQFile', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user' => $user, 'course' => $course]));
            else:
                return redirect(route('chooseCourseforQF', ['stageBedrijven' => $stageBedrijven, 'stage' => $stage, 'user' => $user]));
            endif;
        else:
            return redirect()->back()->with('NoAccess', 'Toegang geweigerd!');
        endif;

    }


    public function companyChooseCourse(StageBedrijven $stageBedrijven, stage $stage, User $user)
    {
        $courses = $user->courses;

        return view('chooseCourseForQf', ['user' => $user, 'courses' => $courses]);
    }

}
