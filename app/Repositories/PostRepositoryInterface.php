<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface PostRepositoryInterface
{
    public function findByMerchantId($merchantId, $limit = 20, $order = "desc");

    public function loadByMerchantId($merchantId, $postId = null, $limit = 10, $order = "desc");

    public function searchByMerchantId($merchantId, $search, $postId = null, $limit = 10, $order = "desc");

    public function loadByMerchantAndUser($merchantId, $userId, $postId = null, $limit = 10, $order = "desc");

    public function increment($postId, $column);

    public function decrement($postId, $column);

    public function hide($postId);

    public function countByMerchantId($merchantId);

    public function countByMerchantAndUserId($merchantId, $userId);

    public function countVoteByMerchantAndUserId($merchantId, $userId);

    public function isCreator($postId);
}