<?php

namespace App\Http\Controllers\ClientApi;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Post as PostResource;
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
use App\Services\AppService;
use App\Services\SocketServiceInterface;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Client post
 */
class PostApiController extends ApiController
{

    protected $postRepo;
    protected $appService;
    protected $imagePostRepository;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketServiceInterface $socketService,
        ImagePostRepositoryInterface $imagePostRepository,
        MerchantRepository $merchantRepository,
        AppService $appService
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
        $this->imagePostRepository = $imagePostRepository;
        $this->appService = $appService;
    }

    /**
     * Update the post
     * param: title
     * param: body
     */
    public function updatePost($subdomain, $postId, Request $request)
    {
        $body = $request->body;

        if ($body == null) {
            return $this->badRequest([
                "Thiếu dữ liệu trả lên"
            ]);
        }
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        if ($merchant == null) {
            return $this->notFound([
                "message" => "Merchant not found"
            ]);
        }

        $post = $this->postRepo->show($postId);

        if ($post == null) {
            return $this->notFound([
                "message" => "Post not found"
            ]);
        }

        if ($merchant->id != $post->merchant_id) {
            return $this->notFound([
                "message" => "Merchant does not have this post"
            ]);
        }


        $this->postRepo->update([
            "body" => $body,
        ], $postId);

        $post = $this->postRepo->show($postId);

        Log::sendLog(PostLogFactory::getEditInstance($request->url(), Auth::user(), $post)->makeLog());

        return new PostFullResource($post);
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
     * Create Post
     * param: title
     * param: body
     */
    public function createPost($subDomain, Request $request)
    {
        $body = $request->body;
        if ($body == null) {
            return $this->badRequest([
                "Thiếu dữ liệu trả lên"
            ]);
        }

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $post = $this->postRepo->create([
            "body" => $body,
            "num_comments" => 0,
            "upvote" => 0,
            "downvote" => 0,
            "merchant_id" => $merchant->id,
            "creator_id" => Auth::user()->id
        ]);


        if ($request->image_ids) {
            $imageIds = json_decode($request->image_ids);
            foreach ($imageIds as $imageId) {
                $this->imagePostRepository->create([
                    "image_id" => $imageId,
                    'post_id' => $post->id
                ]);
            }
        }

        $createPostSocketEvent = new CreatePostSocketEvent([
            "post_id" => $post->id
        ]);
        $this->socketService->publishEvent($subDomain, $createPostSocketEvent);

        Log::sendLog(PostLogFactory::getCreateInstance($request->url(), Auth::user(), $post)->makeLog());

        return new PostFullResource($post);
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
     * Vote post
     * $vote = {up, down}
     */
    public function vote($subdomain, $postId, $vote, Request $request)
    {
        $voteValue = $vote == "up" ? 1 : -1;

        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->badRequest(["message" => "post not found"]);
        }

        $user = Auth::user();

        $vote = $this->voteRepo->findVoteByUserIdAndPostId($user->id, $postId);


        if ($vote == null) {
            // user have not upvote or downvote yet
            $this->voteRepo->create([
                "user_id" => $user->id,
                "value" => $voteValue,
                "post_id" => $postId
            ]);
            if ($voteValue == 1) {
                $notification = new CreateUpvotePostNotification($user, $post);
                Notification::saveNotification($subdomain, $notification, $request->merchant);

                $this->postRepo->increment($postId, "upvote");
            } else if ($voteValue == -1) {
                $notification = new CreateDownvotePostNotification($user, $post);
                Notification::saveNotification($subdomain, $notification, $request->merchant);

                $this->postRepo->increment($postId, 'downvote');

            }
        } else {
            if ($vote->value == $voteValue) {
                //remove the vote
                $this->voteRepo->delete($vote->id);
                if ($voteValue == 1) {
                    $this->postRepo->decrement($postId, "upvote");
                } else if ($voteValue == -1) {
                    $this->postRepo->decrement($postId, "downvote");
                }
            }
            if ($vote->value == -1 * $voteValue) {
                //change to oposite vote
                $this->voteRepo->update([
                    "value" => $voteValue
                ], $vote->id);


                if ($voteValue == 1) {
                    $notification = new CreateUpvotePostNotification($user, $post);
                    Notification::saveNotification($subdomain, $notification, $request->merchant);


                    $this->postRepo->increment($postId, "upvote");
                    $this->postRepo->decrement($postId, "downvote");
                } else if ($voteValue == -1) {
                    $notification = new CreateDownvotePostNotification($user, $post);
                    Notification::saveNotification($subdomain, $notification, $request->merchant);

                    $this->postRepo->increment($postId, "downvote");
                    $this->postRepo->decrement($postId, "upvote");
                }
            }
        }

        $post = $this->postRepo->show($postId);

        return new PostResource($post);
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
