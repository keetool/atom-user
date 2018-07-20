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

class MerchantsQuery extends Query
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
            ],
            "order" => [
                "name" => "order",
                "type" => Type::string()
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields)
    {
        $merchants = Merchant::with(array_keys($fields->getRelations()))->select("merchants.*");

        if (isset($args['user_id'])) {
            $merchants = $merchants->join("merchant_user", 'merchants.id', '=', 'merchant_user.merchant_id');
        }

        $where = function ($query) use ($args) {
            if (isset($args['id'])) {
                $query->where("id", $args['id']);
            }
        };

        $limit = 20;
        $page = 1;

        if (isset($args['limit'])) {
            $limit = $args['limit'];
        }

        if (isset($args['page'])) {
            $page = $args['page'];
        }

        $order = "desc";
        if (isset($args['order'])) {
            $order = $args['order'];
        }


        $merchants = $merchants
            ->where($where)
            ->select($fields->getSelect())
            ->orderBy("created_at", $order)
            ->paginate($limit, ['*'], 'page', $page);
        return $merchants;
    }
}