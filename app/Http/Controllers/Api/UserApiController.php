<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;

class UserApiController extends Controller
{
    /**
     * GET /api/v1/user
     * return information of current logged in user
     * @return view
     */
    public function user(Request $request)
    {
        $user = $request->user();
        return new UserResource($user);
    }
}
