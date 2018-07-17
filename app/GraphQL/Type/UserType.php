<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 4:23 PM
 */

namespace App\GraphQL\Type;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => "User",
        'description' => 'A user',
        'model' => User::class
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
                'description' => 'The id of the user'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user'
            ],
            'phone' => [
                'type' => Type::string(),
            ],
            'username' => [
                'type' => Type::string(),
            ],
            'avatar_url' => [
                'type' => Type::string(),
            ],
            'is_root' => [
                'type' => Type::boolean(),
            ],
            'lang_encode' => [
                'type' => Type::string(),
                'description' => 'Language of current user'
            ],
            "created_at" => [
                'type' => Type::string()
            ],
            "updated_at" => [
                'type' => Type::string()
            ]
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}