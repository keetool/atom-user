<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 4:23 PM
 */

namespace App\GraphQL\Type;

use App\Image;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ImageType extends GraphQLType
{
    protected $attributes = [
        'name' => "Image",
        'description' => 'A image',
        'model' => Image::class
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
            'path' => [
                'type' => Type::string(),
            ],
            'url' => [
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