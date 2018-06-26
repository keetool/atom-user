<?php
namespace App\Formater;

use App\Repositories\LogRepository;
use App\Http\Resources\User as UserResource;


class ConstantFormater extends Formater
{
    public function format() {
        if (array_key_exists("value", $this->data)){
            $value = $this->data["value"];
        }
        return [
            "type" => "constant",
            "data" => $value
        ];
    }
}
