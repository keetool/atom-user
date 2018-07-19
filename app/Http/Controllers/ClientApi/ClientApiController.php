<?php

namespace App\Http\Controllers\ClientApi;

use App\Http\Resources\PostFullResource;
use App\Logs\Log;
use App\Logs\Post\PostLogFactory;
use App\Notifications\Notification;
use App\Notifications\Post\CreateDownvotePostNotification;
use App\Notifications\Post\CreateUpvotePostNotification;
use App\Repositories\ImagePostRepositoryInterface;
use App\Repositories\MerchantRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketServiceInterface;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;
use App\Services\AppService;
use App\Repositories\MerchantUserRepository;
use App\Repositories\UserRepository;
use App\Http\Resources\User as UserResource;

/**
 * @resource Client
 */
class ClientApiController extends ApiController
{

    protected $postRepo;
    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;
    protected $appService;
    protected $merchantUserRepo;
    protected $userRepo;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketServiceInterface $socketService,
        ImagePostRepositoryInterface $imagePostRepository,
        MerchantRepository $merchantRepository,
        MerchantUserRepository $merchantUserRepo,
        AppService $appService,
        UserRepository $userRepo
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
        $this->imagePostRepository = $imagePostRepository;
        $this->appService = $appService;
        $this->merchantUserRepo = $merchantUserRepo;
        $this->userRepo = $userRepo;
    }

    /**
     * Search
     * param = {search, post_id}
     */
    public function search($subDomain, Request $request)
    {
        $search = $this->appService->convert_vi_to_en($request->search);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->searchByMerchantId($merchant->id, $search, $request->post_id);

        return $this->success(["posts" => PostFullResource::collection($posts)]);
    }

    /**
     * Join merchant
     */
    public function joinMerchant($subDomain, Request $request)
    {
        $user = Auth::user();
        $userExist = $this->userRepo->uniqueUserMerchant($subDomain, $user->email);
        if ($userExist) {
            return $this->badRequest([
                "User have already joined merchant"
            ]);
        }
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $this->merchantUserRepo->createMerchantUser($merchant->id, $user->id, "student");

        $user = $this->userRepo->show($user->id);

        $data = new UserResource($user);

        $data['joined'] = true;

        return $this->success([
            "data" => $data,
        ]);
    }
}
