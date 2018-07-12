<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\BookmarkRepositoryInterface;
use App\Repositories\MerchantInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Post as PostResource;

/**
 * @resource Client bookmark
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

    /**
     * Create bookmark
     * @param $subDomain
     * @param $postId
     * @return PostResource
     */
    public function createBookmark($subDomain, $postId)
    {
        $user = Auth::user();
        $bookmark = $this->bookmarkRepository->findByPostIdAndUserId($postId, $user->id);
        if ($bookmark == null) {
            $bookmark = $this->bookmarkRepository->create([
                "post_id" => $postId,
                "user_id" => $user->id
            ]);
        }
        return new PostResource($bookmark->post);
    }

    /**
     * Delete bookmark
     * @param $subDomain
     * @param $postId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteBookmark($subDomain, $postId)
    {
        $user = Auth::user();
        $bookmark = $this->bookmarkRepository->findByPostIdAndUserId($postId, $user->id);
        if ($bookmark) {
            $bookmark->delete();
        }
        return $this->success(["message" => "deleted"]);
    }

    /**
     * Get bookmarks from this subdomain
     * @param $subDomain
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getBookmarksBySubDomain($subDomain, Request $request)
    {
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);
        $user = Auth::user();
        $posts = $this->bookmarkRepository->getBookmarkPostsBySubDomainPaginate($merchant->id, $user->id, $request->order, $request->limit);
        return PostResource::collection($posts);
    }

    /**
     * Get bookmarks from all subdomains
     * @param $subDomain
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getAllBookmarks($subDomain, Request $request)
    {
        $user = Auth::user();
        $posts = $this->bookmarkRepository->getAllBookmarkPostsPaginate($user->id, $request->order, $request->limit);
        return PostResource::collection($posts);
    }

}