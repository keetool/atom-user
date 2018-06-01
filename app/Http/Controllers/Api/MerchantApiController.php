<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MerchantApiController extends Controller
{
    /**
     * GET /api/v1/merchant
     * @return view
     */
    public function index()
    {
        return view("home.index");
    }

    /**
     * POST /api/v1/merchant
     */
    public function createMerchant(){
        
    }
}
