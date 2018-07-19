<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 3:56 PM
 */

namespace App\GraphQL\Query;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => "User query",
        'description' => "A query of users"
    ];

    public function type()
    {

        // result of query with pagination laravel
        return GraphQL::type('user');

//        return Type::listOf(GraphQL::type('user'));
    }

    // arguments to filter query
    public function args()
    {
        return [
            'id' => [
                "name" => "id",
                "type" => Type::string()
            ],
            'email' => [
                "name" => "email",
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
            if (isset($args['email'])) {
                $query->where("email", $args['email']);
            }
        };
        $user = User::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->first();
        return $user;
    }
}