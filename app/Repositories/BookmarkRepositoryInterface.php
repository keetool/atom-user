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
    public function getBookmarksBySubDomainPaginate($merchantId, $bookmarkId, $userId, $order = "desc", $limit = 20);

    public function getAllBookmarksPaginate($userId, $order = "desc", $limit = 20);

    public function findByPostIdAndUserId($postId, $userId);
}