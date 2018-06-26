<?php
namespace App\Objects;


class KeyJsonObject extends JsonObject
{
    protected $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
    public function toArray() {
        return [
            'type' => 'key',
            'data' => [
                "value" => $this->value
            ]
        ];
    }
}
