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
    
    public function findCommentsAfterACommentPaginate($commentId, $order = "asc")
    {
        $comment = Comment::find($commentId);

        if ($order == null) {
            $order = "asc";
        }

        return Comment::where("post_id", $comment->post_id)->where('created_at', '>', $comment->created_at)
            ->orderBy("created_at", $order)->limit(5)
            ->get();
    }
}
