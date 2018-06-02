<?php

namespace App\Http\Middleware;

use Closure;

class GetSubDomain
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
        $subDomain = explode('.', $request->getHost())[0];
        $request->subDomain = $subDomain;
        return $next($request);
    }
}
