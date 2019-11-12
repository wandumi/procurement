<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class LastUserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::Check())
        {
            $expiresAt = Carbon::now()->addMinutes(1);
            Cache::put('User-is-online-', Auth::user()->id, true, $expiresAt);
        }

        return $next($request);
    }
}
