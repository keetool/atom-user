<?php
namespace App\Formater;

use App\Http\Resources\User as UserResource;
use App\User;


class UserFormater extends Formater
{
    public function format() {
        if (array_key_exists("user_id", $this->data)){
            $user = User::find($this->data['user_id']);
        }
        if ($user == null) {
            return [];
        }
        return [
            "type" => "user",
            "data" => new UserResource($user)
        ];
    }
}
