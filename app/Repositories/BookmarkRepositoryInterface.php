<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface BookmarkRepositoryInterface
{
    public function getBookmarkPostsBySubDomainPaginate($merchantId, $userId, $order = "desc", $limit = 20);

    public function getAllBookmarkPostsPaginate($userId, $order = "desc", $limit = 20);

    public function findByPostIdAndUserId($postId, $userId);
}