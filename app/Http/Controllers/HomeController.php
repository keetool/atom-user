<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class HomeController extends Controller
{
    public function __construct()
    {  
        $this->data['locale'] = App::getLocale();
    }

    public function index()
    {
        return view("home.index", $this->data);
    }

    public function register()
    {
        return view("home.merchant_register", $this->data);
    }

    public function checkMerchant()
    {
        return view("home.check_merchant", $this->data);
    }

    public function blogs()
    {
        return view("home.blogs", $this->data);
    }
    
}
