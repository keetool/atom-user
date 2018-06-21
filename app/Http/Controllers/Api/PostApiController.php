<?php

namespace App\Http\Controllers\Api;

use App\Repositories\MerchantRepository;
use App\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class PostApiController extends ApiController
{

    protected $postRepo;
    protected $merchantRepo;

    public function __construct(PostRepository $postRepo, MerchantRepository $merchantRepository) {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->merchantRepo = $merchantRepository;
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

        $this->postRepo->create([
            "title" => $title,
            "body" => $body,
            "merchant_id" => $merchant->id,
            "creator_id" => Auth::user()->id
        ]);


    }
}
