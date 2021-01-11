<?php

namespace App\Http\Middleware;

use App\Models\stage;
use App\Models\StageBedrijven;
use App\Models\User;
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
        if (Auth::guest()):
            return redirect(route('login'))->with('NoAccess', 'Je moet eerst ingelogd zijn');
        elseif (Auth::user()->role === 3):
            $comp = Auth::user()->company;
            if ($request->route('stageBedrijven') instanceof StageBedrijven):
                $compId = $request->route('stageBedrijven')->id;
            else:
                $compId = $request->route('stageBedrijven');
            endif;

            if (Auth::user()->company->id == $compId):
                if ($request->route('stage')):
                    $stages = $comp->stages;

                    if ($request->route('stage') instanceof stage):
                        $stageId = $request->route('stage')->id;
                    else:
                        $stageId = $request->route('stage');
                    endif;

                    if (in_array($stageId, $stages->pluck('id')->toArray())):

                        if ($request->route('user')):
                            $studentsArray = array();
                            foreach ($stages as $stage):
                                $studentsArray = array_merge($studentsArray, $stage->users->pluck('id')->toArray());
                            endforeach;

                            if ($request->route('user') instanceof User):
                                $studentId = $request->route('user')->id;
                            else:
                                $studentId = $request->route('user');
                            endif;

                            if (in_array($studentId, $studentsArray)):
                                return $next($request);
                            else:
                                return redirect()->back()->with('NoAccess', 'Je hebt geen toegang tot deze pagina');
                            endif;
                        else:
                            return $next($request);
                        endif;
                    else:
                        return redirect()->back()->with('NoAccess', 'Je hebt geen toegang tot deze pagina');
                    endif;
                else:
                    return $next($request);
                endif;
            else:
                return redirect()->back()->with('NoAccess', 'Je hebt geen toegang tot deze pagina');
            endif;
        else:
            return redirect()->back()->with('NoAccess', 'Je hebt geen toegang tot deze pagina');
        endif;
    }
}
