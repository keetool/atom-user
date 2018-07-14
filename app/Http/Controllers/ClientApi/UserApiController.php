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
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use Illuminate\Support\Facades\Auth;
/**
 * @resource Client user
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
    ) {
        $this->userRepo = $userRepo;
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepo;
        $this->commentRepo = $commentRepo;
        $this->voteRepo = $voteRepo;
    }
    
    /**
     * GET /api/v1/user
     * return information of current logged in user
     */
    public function user($subdomain, Request $request)
    {
        $user = $request->user();
        $userExist = $this->userRepo->uniqueUserMerchant($subdomain, $user->email);
        if (!$userExist) {
            return $this->badRequest([
                "User does not exist in merchant"
            ]);
        }
        return new UserResource($user);
    }
    
    /**
     * Edit info
     * return information of current logged in user
     */
    public function editInfo(Request $request)
    {
        $user = Auth::user(); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->avatar_url = $request->avatar_url;
        $user->save();
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
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $user = $this->userRepo->show($userId);

        $data = new UserResource($user);
        $data['posts_count'] = $this->postRepo->countByMerchantAndUserId($merchant->id, $userId);
        $data['comments_count'] = $this->commentRepo->countByMerchantAndUserId($merchant->id, $userId);
        $data['votes_count'] = $this->voteRepo->countByMerchantAndUserId($merchant->id, $userId);
        // dd($data);
        return $this->success([
            "data" => $data,
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
