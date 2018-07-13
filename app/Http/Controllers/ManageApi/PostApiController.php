<?php

namespace App\Http\Controllers\ManageApi;

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

/**
 * @resource Manage post
 */
class PostApiController extends ApiController
{

    protected $postRepo;

    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketServiceInterface $socketService,
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
     * Get posts of the merchant corresponding to the current subdomain
     */
    public function getPosts(Request $request)
    {
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->findByMerchantId($merchant->id);

        return PostFullResource::collection($posts);
    }

    /**
     * Get post by id
     */
    public function getPost($subdomain, $postId, Request $request)
    {
        $post = $this->postRepo->show($postId);

        if ($post == null) {
            return $this->notFound([
                "message" => "post not found"
            ]);
        }

        return new PostFullResource($post);
    }

    /**
     * Load post
     */
    public function loadPosts($subdomain, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->loadByMerchantId($merchant->id, $request->post_id, $request->limit);
        return PostFullResource::collection($posts);
    }

    /**
     * Post list
     * $type = {top}
     * param = {post_id}
     */
    public function postList($subdomain, $type, Request $request)
    {
        if ($this->merchantRepo->findBySubDomain($subdomain) == null)
            return $this->notFound(["message" => "merchant not found"]);
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);
        if ($type == "top")
            $posts = $this->postRepo->loadTopByMerchantId($merchant->id, $request->post_id, $request->limit);
        return PostFullResource::collection($posts);
    }


    /**
     * Delete post
     */
    public function deletePost($subdomain, $postId, Request $request)
    {
        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->notFound([
                "message" => "post not found"
            ]);
        }
        Log::sendLog(PostLogFactory::getDeleteInstance($request->url(), Auth::user(), $post)->makeLog());
        $this->postRepo->delete($postId);
        return $this->success([
            "message" => "deleted"
        ]);
    }


    /**
     * Hide post
     */
    public function hidePost($subdomain, $postId)
    {
        if ($this->postRepo->isCreator($postId) == false)
            return $this->badRequest(["Message" => "Your are not the creator of this post"]);
        $this->postRepo->hide($postId);
        return $this->success(["message" => "hid"]);
    }
}
