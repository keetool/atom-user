<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handler for GET /
     * @return view
     */
    public function index()
    {
        return view("home.index");
    }

    public function register()
    {
        return view("home.merchant_register");
    }
}
