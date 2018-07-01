<?php

namespace App\Repositories;

use App\Vote;

class VoteRepository extends Repository implements VoteRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Vote());
    }


    public function findVoteByUserIdAndPostId($userId, $postId)
    {
        return Vote::where("user_id", $userId)->where("post_id", $postId)->first();
    }
}
