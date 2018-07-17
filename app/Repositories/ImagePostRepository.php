<?php

namespace App\Repositories;


use App\ImagePost;

class ImagePostRepository extends Repository implements ImagePostRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new ImagePost());
    }

    public function deleteImagePostsByPostId($postId)
    {
        $imagePosts = $this->model->where('post_id', $postId)->get();
        if ($imagePosts) {
            foreach ($imagePosts as $imagePost) {
                $this->delete($imagePost->id);
            }
        }
    }
}
