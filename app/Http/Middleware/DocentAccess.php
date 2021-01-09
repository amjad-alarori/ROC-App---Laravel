<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocentAccess
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
            return redirect(route('login'))->with('NoAccess','Je moet eerst ingelogd zijn');
        elseif (Auth::user()->role === 2):
            return $next($request);
        else:
            return redirect()->back()->with('NoAccess', 'Toegang geweigerd');
        endif;
    }
}
