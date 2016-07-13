<?php

namespace Suth\LaravelSift\Middleware;

use Closure;
use Illuminate\Support\Str;

class ManageSiftSession
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('sift_session_id')) {
            $request->session()->put('sift_session_id', Str::random(24));
        }

        return $next($request);
    }
}
