<?php

namespace App\Repositories;

use App\CommentVote;

class CommentVoteRepository extends Repository implements CommentVoteRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new CommentVote());
    }
    
    public function findVoteByUserIdAndCommentId($userId, $commentId)
    {
        return CommentVote::where("user_id", $userId)->where("comment_id", $commentId)->first();
    }
}
