<?php
namespace App\Repositories;


use App\Post;

class PostRepository extends Repository {

    public function __construct(){
        parent::__construct(new Post());
    }

    public function findByMerchantId($merchantId, $limit = 20, $order = "desc") {
        return $this->model->where("merchant_id", $merchantId)->orderBy("created_at", $order)->paginate($limit);
    }
}
