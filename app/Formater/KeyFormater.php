<?php
namespace App\Formater;

class KeyFormater extends Formater
{
    public function format() {
        if (array_key_exists("value", $this->data)) {
            $value = $this->data["value"];
        }
        return [
            "type" => "key",
            "data" => $value
        ];
    }
}
