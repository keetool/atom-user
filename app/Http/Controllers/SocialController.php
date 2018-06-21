<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function index(Request $request)
    {
        $subDomain = $request->subDomain;
        return view("social.index");
    }
}
