<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 3:56 PM
 */

namespace App\GraphQL\Query;

use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class PostsQuery extends Query
{
    protected $attributes = [
        'name' => "Posts query",
        'description' => "A query of posts"
    ];

    public function type()
    {
        // result of query with pagination laravel
        return GraphQL::paginate('post');
    }

    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                "name" => "id",
                "type" => Type::string()
            ],
            'limit' => [
                "name" => "limit",
                "type" => Type::int()
            ],
            'page' => [
                "name" => "page",
                "type" => Type::int()
            ],
            "order" => [
                "name" => "order",
                "type" => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where("id", $args['id']);
            }
        };

        $order = 'desc';

        if (isset($args['order'])) {
            $order = $args['order'];
        }

        $limit = 20;
        $page = 1;
        if (isset($args['limit'])) {
            $limit = $args['limit'];
        }
        if (isset($args['page'])) {
            $page = $args['page'];
        }

        $posts = Post::with(array_keys($fields->getRelations()))
            ->where($where)
            ->orderBy("created_at", $order)
            ->select($fields->getSelect())
            ->paginate($limit, ['*'], 'page', $page);
        return $posts;
    }
}