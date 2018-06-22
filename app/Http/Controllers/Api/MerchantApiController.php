<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Merchant;
use App\Http\Controllers\ApiController;

class MerchantApiController extends ApiController
{
    public function merchant($merchantId)
    {
        if (!preg_match('/^[0-9a-fA-F]{8}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{4}-[0-9a-fA-F]{12}$/', $merchantId))
            return $this->notFound([
                "message" => "Invalid id format"
            ]);
        $merchant = Merchant::find($merchantId);
        if ($merchant == null) {
            return $this->notFound([
                "message" => "Non-existing merchant id"
            ]);
        }
        return [
            'id' => $merchant->id,
            'name' => $merchant->name,
            'sub_domain' => $merchant->sub_domain
        ];
    }

    public function createMerchant()
    {

    }
}
