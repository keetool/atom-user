<?php
namespace App\Objects;


class MerchantJsonObject extends JsonObject
{
    protected $merchant;

    public function __construct($merchant)
    {
        $this->merchant = $merchant;
    }
    public function toArray() {
        return [
            'type' => 'merchant',
            'data' => [
                "merchant_id" => $this->merchant->id,
            ]
        ];
    }
}
