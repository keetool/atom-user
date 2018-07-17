<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 4:23 PM
 */

namespace App\GraphQL\Type;

use App\Image;
use App\Merchant;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class MerchantType extends GraphQLType
{
    protected $attributes = [
        'name' => "Merchant",
        'description' => 'A merchant',
        'model' => Merchant::class
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
            'name' => [
                'type' => Type::string(),
            ],
            'sub_domain' => [
                'type' => Type::string(),
            ],
            'created_at' => [
                'type' => Type::string(),
                "description" => "created_at"
            ],
            'updated_at' => [
                'type' => Type::string()
            ],

        ];
    }
}