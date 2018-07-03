<?php

/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface CommentRepositoryInterface
{
    public function findAllCommentByPostIdPaginate($postId, $order = "asc", $limit = 10);

    public function findCommentsAfterACommentPaginate($postId, $commentId = null, $order = "asc", $limit = 10);
}