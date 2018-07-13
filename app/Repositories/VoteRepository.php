<?php

namespace App\Repositories;

use App\Vote;

class VoteRepository extends Repository implements VoteRepositoryInterface
{
    private $postRepo;
    private $commentRepo;

    public function __construct(PostRepositoryInterface $postRepo, CommentRepositoryInterface $commentRepo)
    {
        parent::__construct(new Vote());

        $this->postRepo = $postRepo;
        $this->commentRepo = $commentRepo;
    }


    public function findVoteByUserIdAndPostId($userId, $postId)
    {
        return $this->model->where("user_id", $userId)->where("post_id", $postId)->first();
    }

    public function countByMerchantAndUserId($merchantId, $userId)
    {
        $vote_post_count = $this->postRepo->countVoteByMerchantAndUserId($merchantId, $userId);
        $vote_comment_count = $this->commentRepo->countVoteByMerchantAndUserId($merchantId, $userId);
        return $vote_comment_count + $vote_post_count;
    }
}
