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
     * @return [boolean]
     */
    public function addUser($merchant, $user_id) {

    }

}
