<?php

namespace App\Http\Controllers\OpenApi;

use App\Logs\Log;
use App\Logs\Post\PostLogFactory;
use App\Notifications\Notification;
use App\Notifications\Post\CreateDownvotePostNotification;
use App\Notifications\Post\CreateUpvotePostNotification;
use App\Repositories\ImagePostRepositoryInterface;
use App\Repositories\MerchantRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketService;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;
use App\Http\Controllers\OpenApiController;

/**
 * @resource Open post
 */
class PostApiController extends OpenApiController
{

    protected $postRepo;

    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketService $socketService,
        ImagePostRepositoryInterface $imagePostRepository,
        MerchantRepository $merchantRepository
    ) {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
        $this->imagePostRepository = $imagePostRepository;
    }

    /**
     * Load post open api
     * param = {post_id}
     */
    public function loadPosts($subdomain, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->loadByMerchantId($merchant->id, $request->post_id, $request->limit);
        return PostResource::collection($posts);
    }
}
