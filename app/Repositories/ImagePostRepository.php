<?php

namespace App\Repositories;


use App\ImagePost;

class ImagePostRepository extends Repository implements ImagePostRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new ImagePost());
    }

}
