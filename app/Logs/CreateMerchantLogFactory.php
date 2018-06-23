<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:52 AM
 */

namespace App\Logs;

class CreateMerchantLogFactory extends LogFactory
{
    protected $merchant;

    public function __construct($api, $user, $merchant)
    {
        parent::__construct('manage.action.merchant.create', $api, $user);
        $this->merchant = $merchant;
    }

    /**
     * Create createMerchantLog
     * @return MerchantLog
     */
    public function makeLog()
    {

        return new MerchantLog(
            $this->user,
            $this->merchant,
            $this->action,
            $this->api
        );
    }
}