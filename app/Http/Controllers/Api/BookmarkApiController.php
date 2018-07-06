<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Repositories\BookmarkRepositoryInterface;
use Illuminate\Support\Facades\Auth;

/**
 * @resource Bookmark
 */
class BookmarkApiController extends ApiController
{
    protected $bookmarkRepository;

    public function __construct(
        BookmarkRepositoryInterface $bookmarkRepository
    )
    {
        parent::__construct();
        $this->bookmarkRepository = $bookmarkRepository;
    }

    public function createBookmark($subDomain, $postId)
    {
        $user = Auth::user();
        $this->bookmarkRepository->create([
            "post_id" => $postId,
            "user_id" => $user->id
        ]);
    }
}
