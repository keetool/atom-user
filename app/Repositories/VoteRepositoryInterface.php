<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface VoteRepositoryInterface
{
    public function findVoteByUserIdAndPostId($userId, $postId);

    public function countByMerchantAndUserId($merchantId, $userId);
}