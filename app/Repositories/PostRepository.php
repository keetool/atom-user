<?php
namespace App\Repositories;


use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Post as PostResource;
use Illuminate\Support\Facades\Auth;

class PostRepository extends Repository implements PostRepositoryInterface
{

    public function __construct()
    {
        parent::__construct(new Post());

        // $this->model = $this->model->where("hide", false);
    }

    public function findByMerchantId($merchantId, $limit = 20, $order = "desc")
    {
        return $this->model->where("merchant_id", $merchantId)->orderBy("created_at", $order)->paginate($limit);
    }

    public function loadByMerchantId($merchantId, $postId = null, $limit = 10, $order = "desc")
    {
        if ($limit == null)
            $limit = 10;
        $posts = $this->model->where("merchant_id", $merchantId);
        if ($postId) 
            $posts = $posts->where("created_at", "<", $this->model->find($postId)->created_at);
        $posts = $posts->orderBy("created_at", $order)->limit($limit)->get();
        return $posts;
    }

    public function loadTopByMerchantId($merchantId, $postId = null, $limit = 10, $order = "desc")
    {
        if ($limit == null)
            $limit = 10;
        $posts = $this->model->where("merchant_id", $merchantId);
        if ($postId) {
            $post = $this->show($postId);
            $value = 1000000000 * ($post->upvote + $post->downvote) / (2500000000 - (strtotime($post->created_at) - 1));
            $posts = $posts->whereRaw("1000000000*((upvote + downvote)/(2500000000-extract(epoch from (created_at::timestamp - '1970-01-01 00:00:01'::timestamp)))) < " . (string)$value);
        }
        $posts = $posts->orderByRaw("((upvote + downvote)/(2500000000-extract(epoch from (created_at::timestamp - '1970-01-01 00:00:01'::timestamp)))) desc")->limit($limit)->get();

        return $posts;
    }


    public function increment($postId, $column)
    {
        DB::table('posts')->where('id', $postId)->increment($column);
    }

    public function decrement($postId, $column)
    {
        DB::table('posts')->where('id', $postId)->decrement($column);
    }

    public function hide($postId)
    {
        $post = $this->show($postId);
        $post->hide = 1;
        $post->save();
    }

    public function isCreator($postId)
    {
        $post = $this->show($postId);
        return $post->creator_id == Auth::user()->id;
    }
}
