<?php
namespace App\Formater;

use App\Http\Resources\Merchant as MerchantResource;
use App\Merchant;


class MerchantFormater extends Formater
{
    public function format() {
        if (array_key_exists("merchant_id", $this->data)){
            $merchant = Merchant::find($this->data['merchant_id']);
        }
        if ($merchant == null) {
            return [];
        }
        return [
            "type" => "merchant",
            "data" => new MerchantResource($merchant)
        ];
    }
}
