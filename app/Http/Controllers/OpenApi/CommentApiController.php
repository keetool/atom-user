<?php

namespace App\Http\Controllers\OpenApi;

use App\Notifications\Notification;
use App\Notifications\Post\CreateCommentNotification;
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
 * @resource Open comment
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
    )
    {
        parent::__construct();
        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepository;
        $this->commentVoteRepo = $commentVoteRepo;
        $this->socketService = $socketService;
    }

    /**
     * Load comments
     * 
     * param = {}
     */
    public function loadComments($subdomain, $postId, Request $request)
    {
        $comments = $this->commentRepo->findCommentsAfterACommentPaginate($postId, $request->comment_id, $request->order, $request->limit);
        return CommentResource::collection($comments);
    }
}
