<?php
namespace App\Repositories;

use App\MerchantUser;
use App\Merchant;


class MerchantUserRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new MerchantUser());
    }

    /**
     * Add user to merchant
     * @param [string] user_id
     * @param [object] merchant
     * @return [MerchantUser] $merchantUser
     */
    public function createMerchantUser($merchant_id, $user_id, $role = "root")
    {
        if (Merchant::where('merchant_id', $merchant_id)->where('user_id', $user_id)->first() == null)
            return $this->model->create([
            "merchant_id" => $merchant_id,
            "user_id" => $user_id,
            "role" => $role
        ]);
    }

}
