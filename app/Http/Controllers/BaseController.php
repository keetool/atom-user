<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $lang;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if($request->lang) {
                $request->session()->put("lang", $request->lang);
                $lang = $request->lang;
            } else if(Session::has("lang")) {
                $lang = Session::get("lang");
            } else {
                $lang = "en-us";
                $request->session()->put("lang", $lang);
            }
            // dd($lang);
            $this->lang = $lang;
            $request->attributes->add(['lang' => $lang]);
            $this->data['lang'] = $lang;
    
            return $next($request);
        });
    }
}
