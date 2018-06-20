<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view("home.index");
    }

    public function register()
    {
        return view("home.merchant_register");
    }

    public function checkMerchant()
    {
        return view("home.check_merchant");
    }

    public function dummy()
    {
        return view('home.dummy');
    }
}
