<?php
namespace App\Repositories;


use App\Post;
use Illuminate\Support\Facades\DB;

class PostRepository extends Repository implements PostRepositoryInterface {

    public function __construct(){
        parent::__construct(new Post());
    }

    public function findByMerchantId($merchantId, $limit = 20, $order = "desc") {
        return $this->model->where("merchant_id", $merchantId)->orderBy("created_at", $order)->paginate($limit);
    }


    public function increment($postId, $column)
    {
        DB::table('posts')->where('id', $postId)->increment($column);
    }

    public function decrement($postId, $column)
    {
        DB::table('posts')->where('id', $postId)->decrement($column);

    }
}
