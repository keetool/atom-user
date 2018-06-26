<?php
namespace App\Logs;

use App\Logs\Log;
use App\Objects\UserJsonObject;
use App\Objects\KeyJsonObject;
use App\Objects\MerchantJsonObject;


class MerchantLog extends Log
{
    public $merchant;

    public function __construct($user, $merchant, $action, $api)
    {
        parent::__construct($user, $action, $api);
        $this->merchant = $merchant;
    }

    /**log
     * [
     *  {type: "key", data: "manage.log.merchant.create"}
     * ]
     */
    protected function format()
    {
        return json_encode([
            (new UserJsonObject($this->user))->toArray(),
            (new KeyJsonObject($this->action))->toArray(),
            (new MerchantJsonObject($this->merchant))->toArray()
        ]);
    }
}
