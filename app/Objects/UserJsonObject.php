<?php
namespace App\Objects;


class UserJsonObject extends JsonObject
{
    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }
    public function toArray() {
        return [
            'type' => 'user',
            'data' => [
                "user_id" => $this->user->id
            ],
        ];
    }
}
