<?php
namespace App\Logs;

use App\Logs\Log;


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
            [
                'type' => 'user',
                'data' => [
                    "user_id" => $this->user->id
                ],
            ],
            [
                'type' => 'key',
                'data' => [
                    "value" => 'manage.log.merchant.create'
                ]
            ],
            [
                'type' => 'merchant',
                'data' => [
                    "merchant_id" => $this->merchant->id,
                ]
            ]
        ]);
    }
}
