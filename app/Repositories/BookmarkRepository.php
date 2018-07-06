<?php

namespace App\Repositories;

use App\Bookmark;

class BookmarkRepository extends Repository implements BookmarkRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Bookmark());
    }
}
