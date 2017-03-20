<?php

namespace App\Http\Middleware;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;

class CheckReferral
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next )
    {
        if ( !$request->hasCookie('referral') and $request->query('ref') ) {
            return redirect($request->fullUrl())->withCookie(cookie()->forever('referral', $request->query('ref')));
        }

        return $next($request);
    }
}