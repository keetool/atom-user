<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\BookmarkRepositoryInterface;
use App\Repositories\MerchantInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

/**
 * @resource Bookmark
 */
class BookmarkApiController extends ApiController
{
    protected $bookmarkRepository;
    protected $merchantRepository;

    public function __construct(
        BookmarkRepositoryInterface $bookmarkRepository,
        MerchantInterface $merchantRepository
    )
    {
        parent::__construct();
        $this->bookmarkRepository = $bookmarkRepository;
        $this->merchantRepository = $merchantRepository;
    }

    public function createBookmark($subDomain, $postId)
    {
        $user = Auth::user();
        $this->bookmarkRepository->create([
            "post_id" => $postId,
            "user_id" => $user->id
        ]);
        return new PostResource($user->post);
    }

    public function getBookmarksBySubDomain($subDomain, Request $request)
    {
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);
        $user = Auth::user();
        $posts = $this->bookmarkRepository->getBookmarkPostsBySubDomainPaginate($merchant->id, $user->id, $request->order, $request->limit);
        return PostResource::collection($posts);
    }

    public function getAllBookmarks($subDomain, Request $request)
    {
        $user = Auth::user();
        $posts = $this->bookmarkRepository->getAllBookmarkPostsPaginate($user->id, $request->order, $request->limit);
        return PostResource::collection($posts);
    }
}
