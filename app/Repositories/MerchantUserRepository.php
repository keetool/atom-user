<?php
namespace App\Repositories;

use App\MerchantUser;


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
        return $this->model->create([
            "merchant_id" => $merchant_id,
            "user_id" => $user_id,
            "role" => $role
        ]);
    }

}
