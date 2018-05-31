<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function success($data)
    {
        return $this->respond($data, 200);
    }

    public function resourceCreated($data)
    {
        return $this->respond($data, 201);
    }
    public function badRequest($data)
    {
        return $this->respond($data, 400);
    }
    public function respond($data, $httpCode)
    {
        return response()->json($data, $httpCode);
    }


}
