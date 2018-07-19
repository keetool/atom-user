<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/15/18
 * Time: 4:23 PM
 */

namespace App\GraphQL\Type;

use App\Merchant;
use App\MerchantUser;
use App\Notifications\Notification;
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

    public function resolveNumUsersField($root, $args)
    {
        $merchantId = $root->id;
        return MerchantUser::where("merchant_id", $merchantId)->count();
    }

    public function resolveUnseenNotificationsField($root, $args)
    {
        $merchantId = $root->id;
        $notifications = \App\Notification::where("merchant_id", $merchantId)->where("status", Notification::UNSEEN);

        if (isset($args['user_id'])) {
            $notifications = $notifications->where("actor_id", $args['user_id']);
        }

        return $notifications->count();
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
            'num_users' => [
                'type' => Type::int(),
                'description' => "Number of users of each merchant",
                "selectable" => false
            ],
            'unseen_notifications' => [
                'type' => Type::int(),
                'description' => "Number of unseen notifications of this merchant",
                "selectable" => false
            ]
        ];
    }
}