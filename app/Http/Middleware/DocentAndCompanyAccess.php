<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocentAndCompanyAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guest()):
            return redirect(route('login'))->with('Geen toegang', 'Je moet eerst ingelogd zijn');
        elseif (Auth::user()->role !== 1):
            return $next($request);
        else:
            return redirect()->back()->with('Geen toegang', 'Je hebt geen toegang tot deze pagina');
        endif;

    }
}
