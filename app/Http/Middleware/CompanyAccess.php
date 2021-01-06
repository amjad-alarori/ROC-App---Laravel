<?php

namespace App\Http\Middleware;

use App\Models\stage;
use App\Models\StageBedrijven;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $comp = Auth::user()->company;
        $stages = $comp->stages;

        $studentsArray = [];
        foreach ($stages as $stage):
            $studentsArray = array_merge($studentsArray, $stage->students);
        endforeach;

//        $users = $stage->users;
        if (Auth::guest()):
            return redirect(route('login'))->with('Geen toegang', 'Je moet eerst ingelogd zijn');
        elseif (Auth::user()->role === 3):

            if ($request->route('stageBedrijven') instanceof StageBedrijven):
                $compId = $request->route('stageBedrijven')->id;
            else:
                $compId = $request->route('stageBedrijven');
            endif;

            if (Auth::user()->company->id === $compId):

                if (in_array($request->route('stage')->id, $studentsArray)):

                return $next($request);
//                else:
//                    return redirect()->back()->with('Geen toegang', 'Je hebt geen toegang tot deze pagina');
//                endif
            else:
                return redirect()->back()->with('Geen toegang', 'Je hebt geen toegang tot deze pagina');
            endif;
        else:
            return redirect()->back()->with('Geen toegang', 'Je hebt geen toegang tot deze pagina');
        endif;
        endif;
    }

}
