<?php

namespace App\Repositories;

use App\Bookmark;
use App\Post;

class BookmarkRepository extends Repository implements BookmarkRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Bookmark());
    }


    public function getBookmarkPostsBySubDomainPaginate($merchantId, $bookmarkId, $userId, $order = "desc", $limit = 20)
    {
        if ($order == null) {
            $order = "desc";
        }

        if ($limit == null) {
            $limit = 20;
        }

        $posts = Post::join("bookmarks", "bookmarks.post_id", "=", "posts.id")
            ->where("posts.merchant_id", "=", $merchantId)
            ->where("bookmarks.user_id", "=", $userId)
            ->select("posts.*")
            ->orderBy("bookmarks.created_at", $order)
            ->paginate($limit);

        return $posts;
    }

    public function getAllBookmarkPostsPaginate($userId, $order = "desc", $limit = 20)
    {
        if ($order == null) {
            $order = "desc";
        }

        if ($limit == null) {
            $limit = 20;
        }
        $bookmark = Bookmark::where("bookmarks.user_id", "=", $userId)
            ->select("posts.*")
            ->orderBy("bookmarks.created_at", $order)
            ->paginate($limit);

        return $bookmark;
    }

    public function findByPostIdAndUserId($postId, $userId)
    {
        return Bookmark::where("post_id", $postId)->where("user_id", $userId)->first();
    }
}
