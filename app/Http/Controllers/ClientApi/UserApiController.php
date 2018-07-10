<?php

namespace App\Http\Controllers\ClientApi;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OpenApiController;
use App\Repositories\UserRepositoryInterface;

class UserApiController extends OpenApiController
{
    private $userRepo;

    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    /**
     * GET /api/v1/user
     * return information of current logged in user
     */
    public function user(Request $request)
    {
        $user = $request->user();
        return new UserResource($user);
    }

    /**
     * User list
     * $type = {new}
     */
    public function userList($subdomain, $type, Request $request)
    {
        if ($type == 'new') {
            return UserResource::collection($this->userRepo->findNewUserByMerchant($subdomain));
        }
    }

}
