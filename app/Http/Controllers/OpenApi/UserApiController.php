<?php

namespace App\Http\Controllers\OpenApi;

use Illuminate\Http\Request;
use App\Http\Resources\User as UserResource;
use App\Http\Controllers\OpenApiController;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\MerchantRepository;
use App\Http\Resources\PostFullResource;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

/**
 * @resource Open user
 */
class UserApiController extends OpenApiController
{
    private $userRepo;
    private $postRepo;
    private $merchantRepo;
    private $commentRepo;
    private $voteRepo;

    public function __construct(
        UserRepositoryInterface $userRepo,
        PostRepositoryInterface $postRepo,
        CommentRepositoryInterface $commentRepo,
        MerchantRepository $merchantRepo,
        VoteRepositoryInterface $voteRepo
    )
    {
        $this->userRepo = $userRepo;
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepo;
        $this->commentRepo = $commentRepo;
        $this->voteRepo = $voteRepo;
    }
    
    /**
     * User list
     * $type = {new}
     */
    public function userList($subdomain, $type, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        if ($type == 'new') {
            $data = [
                "users" => UserResource::collection($this->userRepo->findNewUserByMerchant($subdomain)),
                "posts_count" => $this->postRepo->countByMerchantId($merchant->id),
                "users_count" => $merchant->users()->count(),
                "comments_count" => $this->commentRepo->countByMerchantId($merchant->id)

            ];
            return $this->success(["data" => $data]);
        }
    }
}
