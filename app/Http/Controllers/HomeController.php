<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        return view("home.index");
    }

    public function blogs()
    {
        return view("home.blogs");
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

    public function dummy2()
    {
        return view('home.dummy2');
    }
}
