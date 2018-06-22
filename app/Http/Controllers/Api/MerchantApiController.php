<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Merchant;
use App\Http\Controllers\ApiController;

class MerchantApiController extends ApiController
{
    public function merchant($merchantId)
    {
        $merchant = Merchant::find($merchantId);
        if($merchant == null) {
            return [
                'status' => 0,
                'message' => 'Non-existing merchant_id',
            ];
        }
        return [
            'id' => $merchant->id,
            'name' => $merchant->name,
            'sub_domain' => $merchant->sub_domain
        ];
    }

    public function createMerchant(){

    }
}
