<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 3:56 PM
 */

namespace App\GraphQL\Query;

use App\Merchant;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\SelectFields;

class MerchantQuery extends Query
{
    protected $attributes = [
        'name' => "Merchants query",
        'description' => "A query of merchants"
    ];

    public function type()
    {
        return GraphQL::paginate('merchant');
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
            'user_id' => [
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
        $merchants = Merchant::with(array_keys($fields->getRelations()))
            ->where($where)
            ->select($fields->getSelect())
            ->paginate($args['limit'], ['*'], 'page', $args['page']);
        return $merchants;
    }
}