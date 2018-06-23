<?php

namespace App\Http\Controllers\Api;

use App\Repositories\MerchantRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

class PostApiController extends ApiController
{

    protected $postRepo;
    protected $merchantRepo;

    public function __construct(PostRepositoryInterface $postRepo, MerchantRepository $merchantRepository) {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
    }

    public function updatePost($subdomain ,$postId, Request $request){
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

        return new PostResource($post);
    }

    public function getPosts(Request $request) {
        $merchant = $this->merchantRepo->findBySubDomain($request->subDomain);

        $posts = $this->postRepo->findByMerchantId($merchant->id);

        return PostResource::collection($posts);
    }

    public function createPost(Request $request) {
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

        return new PostResource($post);
    }

    public function deletePost($subdomain, $postId){
        $this->postRepo->delete($postId);
        return $this->success([
            "message" => "deleted"
        ]);
    }
}
