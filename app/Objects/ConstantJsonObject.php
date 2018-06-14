<?php
namespace App\Objects;


class ConstantJsonObject extends JsonObject
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
    public function toArray() {
        return [
            'type' => 'constant',
            'data' => [
                "value" => $this->value
            ]
        ];
    }
}
