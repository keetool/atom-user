<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 4:23 PM
 */

namespace App\GraphQL\Type;

use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => "Post",
        'description' => 'A post',
        'model' => Post::class
    ];

    public function resolveCreatedAtField($root, $args)
    {
        return strtotime($root->created_at);
    }

    public function resolveUpdatedAtField($root, $args)
    {
        return strtotime($root->updated_at);
    }

    // define field of type
    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the post'
            ],
            'downvote' => [
                'type' => Type::int(),
                'description' => 'The number of downvotes'
            ],
            'upvote' => [
                'type' => Type::int(),
                'description' => 'The number of upvotes'
            ],
            'num_comments' => [
                "type" => Type::int(),
                "description" => 'The number of comments'
            ],
            'vote' => [
                "type" => Type::int(),
                "description" => 'Number of votes'
            ],
            'isBookmarked' => [
                'type' => Type::boolean(),
                'description' => "This post is bookmarked by this user"
            ],
            'body' => [
                'type' => Type::string(),
                'description' => "Body of post"
            ],
            'created_at' => [
                'type' => Type::string(),
                "description" => "created_at"
            ],
            'updated_at' => [
                'type' => Type::string()
            ],
            'creator' => [
                "type" => GraphQL::type("user")
            ],
            'merchant' => [
                "type" => GraphQL::type("merchant")
            ],
            'images' => [
                'type' => Type::listOf(GraphQL::type('image')),
                "description" => "Get the images list of this post",
            ]
        ];
    }
}