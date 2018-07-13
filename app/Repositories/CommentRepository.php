<?php

namespace App\Repositories;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CommentRepository extends Repository implements CommentRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Comment());

        $this->model = $this->model->where("hide", null);
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

    public function findCommentsAfterACommentPaginate($postId, $commentId = null, $order = "desc", $limit = 10)
    {
        if ($order == null) {
            $order = "desc";
        }

        if ($limit == null) {
            $limit = 10;
        }
        $comments = Comment::where("post_id", $postId);
        if ($commentId)
            $comments = $comments->where('created_at', '<', Comment::find($commentId)->created_at);
        $comments = $comments->orderBy("created_at", $order)->paginate($limit);
        return $comments;
    }

    public function increment($commentId, $column)
    {
        Comment::where('id', $commentId)->increment($column);
    }

    public function decrement($commentId, $column)
    {
        Comment::where('id', $commentId)->decrement($column);
    }

    public function hide($commentId)
    {
        $comment = $this->show($commentId);
        $comment->hide = Carbon::now();
        $comment->save();
    }

    public function isCreator($commentId)
    {
        $comment = $this->show($commentId);
        return $comment->user_id == Auth::user()->id;
    }
}
