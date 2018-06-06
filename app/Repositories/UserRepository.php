<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\User;

class UserRepository extends Repository
{
    protected $merchantRepository;

    public function __construct(MerchantRepository $merchantRepository)
    {
        parent::__construct(new User());
        $this->merchantRepository = $merchantRepository;
    }

    /**
     * Check if user exists in merchant
     * @param [string] $merchantName
     * @param [string] $email
     * @return [bool] userExist
     */
    public function uniqueUserMerchant($subDomain, $email)
    {
        $merchant = $this->merchantRepository->findBySubDomain($subDomain);
        if (!$merchant) {
            return false;
        }
        $user = $this->model->where("merchant_id", $merchant->id)->where("email", $email)->first();
        return $user != null;
    }
}
