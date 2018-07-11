<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:35 AM
 */

namespace App\Repositories;


interface UserRepositoryInterface
{
    public function joinMerchantUser();

    public function uniqueUserMerchant($subDomain, $email);

    public function findUserByMerchantEmailPassword($merchant_id, $email, $password);

    public function findNewUserByMerchant($subDomain, $limit = 10);
}