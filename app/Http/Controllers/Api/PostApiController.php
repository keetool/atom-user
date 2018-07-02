<?php

namespace App\Http\Controllers\Api;

use App\Logs\Log;
use App\Logs\Post\PostLogFactory;
use App\Repositories\MerchantRepository;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VoteRepositoryInterface;
use App\Services\SocketService;
use App\SocketEvent\Post\CreatePostSocketEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

class PostApiController extends ApiController
{

    protected $postRepo;
    protected $merchantRepo;
    protected $voteRepo;
    protected $socketService;

    public function __construct(
        VoteRepositoryInterface $voteRepository,
        PostRepositoryInterface $postRepo,
        SocketService $socketService,
        MerchantRepository $merchantRepository)
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
        $this->voteRepo = $voteRepository;
        $this->socketService = $socketService;
    }

    /**
     * Update the post
     * param: title
     * param: body
     */
    public function updatePost($subdomain, $postId, Request $request)
    {
        $title = $request->title;
        $body = $request->body;

        if ($title == null || $body == null) {
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
            "title" => $title,
            "body" => $body,
        ], $postId);

        $post = $this->postRepo->show($postId);

        Log::sendLog(PostLogFactory::getEditInstance($request->url(), Auth::user(), $post)->makeLog());

        return new PostResource($post);
    }

    /**
     * Get posts of the merchant corresponding to the current subdomain
     */
    public function getPosts(Request $request)
    {
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->findByMerchantId($merchant->id);

        return PostResource::collection($posts);
    }


    /**
     * Create Post
     * param: title
     * param: body
     */
    public function createPost($subDomain, Request $request)
    {
        $title = $request->title;
        $body = $request->body;

        if ($title == null || $body == null) {
            return $this->badRequest([
                "Thiếu dữ liệu trả lên"
            ]);
        }

        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $post = $this->postRepo->create([
            "title" => $title,
            "body" => $body,
            "merchant_id" => $merchant->id,
            "creator_id" => Auth::user()->id
        ]);

        $createPostSocketEvent = new CreatePostSocketEvent([
            "post_id" => $post->id
        ]);
        $this->socketService->publishEvent($subDomain, $createPostSocketEvent);

        Log::sendLog(PostLogFactory::getCreateInstance($request->url(), Auth::user(), $post)->makeLog());

        return new PostResource($post);
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


    public function vote($subdomain, $postId, $vote)
    {
        $voteValue = $vote == "up" ? 1 : -1;

        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->badRequest(["message" => "post not found"]);
        }

        $user = Auth::user();

        $vote = $this->voteRepo->findVoteByUserIdAndPostId($user->id, $postId);

        if ($vote == null) {
            // user does not upvote or downvote
            $this->voteRepo->create([
                "user_id" => $user->id,
                "value" => $voteValue,
                "post_id" => $postId
            ]);
            if ($voteValue == 1) {
                $this->postRepo->increment($postId, "upvote");
            } else if ($voteValue == -1) {
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
                    $this->postRepo->increment($postId, "upvote");
                    $this->postRepo->decrement($postId, "downvote");
                } else if ($voteValue == -1) {
                    $this->postRepo->increment($postId, "downvote");
                    $this->postRepo->decrement($postId, "upvote");
                }
            }
        }

        $post = $this->postRepo->show($postId);

        return new PostResource($post);
    }
}
