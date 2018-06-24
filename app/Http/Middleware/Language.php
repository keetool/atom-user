<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class Language
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
        if($request->lang) {
            $request->session()->put("lang", $request->lang);
            $lang = $request->lang;
        } else if(Session::has("lang")) {
            $lang = Session::get("lang");
        } else {
            $lang = "en-us";
        }
        dd($lang);
        $request->attributes->add(['lang' => $lang]);

        return $next($request);
    }
}
