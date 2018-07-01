<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Comment as CommentResource;

class CommentApiController extends ApiController
{

    protected $postRepo;
    protected $commentRepo;

    public function __construct(
        PostRepositoryInterface $postRepo,
        CommentRepositoryInterface $commentRepository
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepository;
    }

    /**
     * Create comment
     * param: value
     * @param $postId
     * @param Request $request
     * @return CommentResource|\Illuminate\Http\JsonResponse
     */
    public function createComment($subDomain, $postId, Request $request)
    {
        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->badRequest(["message" => "post not found"]);
        }

        $user = Auth::user();

        $comment = $this->commentRepo->create([
            "value" => $request->value,
            'post_id' => $postId,
            'user_id' => $user->id
        ]);

        $this->postRepo->update([
            "num_comments" => $post->num_comments + 1
        ], $post->id);

        return new CommentResource($comment);
    }

    /**
     * Update Comment
     * param value
     * @param $postId
     * @param $commentId
     * @param Request $request
     * @return CommentResource|\Illuminate\Http\JsonResponse
     */
    public function updateComment($subDomain, $postId, $commentId, Request $request)
    {
        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->badRequest(["message" => "post not found"]);
        }

        $comment = $this->commentRepo->show($commentId);

        if ($comment == null) {
            return $this->badRequest(["message" => "Comment not found"]);
        }

        $user = Auth::user();


        $this->commentRepo->update([
            "value" => $request->value,
            'post_id' => $postId,
            'user_id' => $user->id
        ], $comment->id);


        $comment = $this->commentRepo->show($commentId);

        return new CommentResource($comment);
    }

    /**
     * Delete comment
     * @param $postId
     * @param $commentId
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteComment($subDomain, $postId, $commentId)
    {
        $post = $this->postRepo->show($postId);
        if ($post == null) {
            return $this->badRequest(["message" => "post not found"]);
        }

        $comment = $this->commentRepo->show($commentId);
        if ($comment == null) {
            return $this->badRequest(["message" => "comment not found"]);
        }

        $user = Auth::user();

        if ($comment->user_id != $user->id) {
            return $this->unauthorized(["message" => "You are not authorized to delete this comment"]);
        }
        $this->commentRepo->delete($commentId);

        return $this->success(["message" => "deleted"]);
    }


}
