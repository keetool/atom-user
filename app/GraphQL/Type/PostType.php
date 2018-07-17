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
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => "User",
        'description' => 'A user',
        'model' => Post::class
    ];

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
            ]
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}