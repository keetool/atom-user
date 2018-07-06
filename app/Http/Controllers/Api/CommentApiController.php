<?php

namespace App\Http\Controllers\Api;

use App\Repositories\CommentRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Http\Controllers\ApiController;
use App\Services\SocketServiceInterface;
use App\SocketEvent\Comment\CreateCommentSocketEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Comment as CommentResource;
use App\Repositories\CommentVoteRepositoryInterface;

/**
 * @resource Comment
 */
class CommentApiController extends ApiController
{

    protected $postRepo;
    protected $commentRepo;
    protected $socketService;
    protected $commentVoteRepo;

    public function __construct(
        SocketServiceInterface $socketService,
        PostRepositoryInterface $postRepo,
        CommentRepositoryInterface $commentRepository,
        CommentVoteRepositoryInterface $commentVoteRepo
    ) {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepository;
        $this->commentVoteRepo = $commentVoteRepo;
        $this->socketService = $socketService;
    }

    /**
     * GET post's comment
     * Query param: limit, order
     * @param Request $request
     * return [
     *     'title' => 'required|max:255',
     *     'body' => 'required',
     *     'type' => 'in:foo,bar',
     *     'thumbnail' => 'required_if:type,foo|image',
     *];
     */
    public function getComments($subdomain, $postId, Request $request)
    {
        // return [
        //     'title' => 'required|max:255',
        //     'body' => 'required',
        //     'type' => 'in:foo,bar',
        //     'thumbnail' => 'required_if:type,foo|image',
        // ];
        $comments = $this->commentRepo->findAllCommentByPostIdPaginate($postId, $request->order, $request->limit);
        return CommentResource::collection($comments);
    }

    /**
     * Load comments
     */
    public function loadComments($subdomain, $postId, Request $request)
    {
        $comments = $this->commentRepo->findCommentsAfterACommentPaginate($postId, $request->comment_id, $request->order, $request->limit);
        return CommentResource::collection($comments);
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
            "post_id" => $postId,
            "user_id" => $user->id,
            "upvote" => 0,
            "downvote" => 0
        ]);

        $this->postRepo->increment($post->id, "num_comments");

        $createCommentSocketEvent = new CreateCommentSocketEvent([
            "comment" => new CommentResource($comment)
        ]);
        $this->socketService->publishEvent($subDomain, $createCommentSocketEvent);

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

        $this->postRepo->decrement($postId, "num_comments");

        $this->commentRepo->delete($commentId);

        return $this->success(["message" => "deleted"]);
    }

    /**
     * Vote comment
     * $vote = {up,down}
     */
    public function vote($subDomain, $commentId, $vote)
    {
        $voteValue = $vote == "up" ? 1 : -1;

        $post = $this->commentRepo->show($commentId);
        if ($post == null) {
            return $this->badRequest(["message" => "comment not found"]);
        }

        $user = Auth::user();
        // $user = User::find("b4619dc6-3d3d-4dbf-91a2-f677cab665bd");

        $vote = $this->commentVoteRepo->findVoteByUserIdAndCommentId($user->id, $commentId);

        if ($vote == null) {
            // user have not upvote or downvote yet
            $this->commentVoteRepo->create([
                "user_id" => $user->id,
                "value" => $voteValue,
                "comment_id" => $commentId
            ]);
            if ($voteValue == 1) {
                $this->commentRepo->increment($commentId, "upvote");
            } else if ($voteValue == -1) {
                $this->commentRepo->increment($commentId, 'downvote');
            }
        } else {
            if ($vote->value == $voteValue) {
                //remove the vote
                $this->commentVoteRepo->delete($vote->id);
                if ($voteValue == 1) {
                    $this->commentRepo->decrement($commentId, "upvote");
                } else if ($voteValue == -1) {
                    $this->commentRepo->decrement($commentId, "downvote");
                }
            }
            if ($vote->value == -1 * $voteValue) {
                //change to oposite vote
                $this->commentVoteRepo->update([
                    "value" => $voteValue
                ], $vote->id);


                if ($voteValue == 1) {
                    $this->commentRepo->increment($commentId, "upvote");
                    $this->commentRepo->decrement($commentId, "downvote");
                } else if ($voteValue == -1) {
                    $this->commentRepo->increment($commentId, "downvote");
                    $this->commentRepo->decrement($commentId, "upvote");
                }
            }
        }

        $comment = $this->commentRepo->show($commentId);

        return new CommentResource($comment);
    }
}
