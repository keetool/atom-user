<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository extends Repository implements CommentRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Comment());
    }

    public function findAllCommentByPostIdPaginate($postId, $order = "asc", $limit = 10)
    {
        if ($order == null) {
            $order = "asc";
        }

        if ($limit == null) {
            $limit = 10;
        }
        return Comment::where("post_id", $postId)->orderBy("created_at", $order)->paginate($limit);
    }
}
