<?php

namespace App\Repositories;

use App\Comment;

class CommentRepository extends Repository implements CommentRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Comment());
    }
}
