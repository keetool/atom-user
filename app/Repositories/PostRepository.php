<?php
namespace App\Repositories;


use App\Post;

class PostRepository extends Repository {

    public function __construct(){
        parent::__construct(new Post());
    }
}
