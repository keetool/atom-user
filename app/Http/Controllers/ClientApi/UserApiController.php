<?php

namespace App\Http\Controllers\ClientApi;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\OpenApiController;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\MerchantRepository;
use App\Http\Resources\PostFullResource;
use App\Services\AppService;
/**
 * @resource Client user
 */
class UserApiController extends OpenApiController
{
    private $userRepo;
    private $postRepo;
    private $merchantRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        PostRepositoryInterface $postRepo,
        MerchantRepository $merchantRepo
    ) {
        $this->userRepo = $userRepo;
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepo;
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

    /**
     * User profile
     */
    public function profile($subdomain, $userId, Request $request)
    {
        $user = $this->userRepo->show($userId);

        return $this->success([
            "data" => new UserResource($user),
        ]);
    }

    /**
     * User post
     */
    public function userPost($subdomain, $userId, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->loadByMerchantAndUser($merchant->id, $userId, $request->post_id);

        return $this->success([
            "data" => PostFullResource::collection($posts)
        ]);
    }
}
