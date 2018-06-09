<?php
namespace App\Logs;

use App\Logs\Log;


class MerchantLog extends Log
{
    protected $action;
    protected $user;
    protected $merchant;

    public function __construct($user, $merchant, $action)
    {
        $this->action = $action;
        $this->merchant = $merchant;
        $this->api = ' ';
        $this->user = $user;
    }

    /**
     * [
     *  {type: "user", data: userId},
     *  {type: "key", data: "user.log.create"}
     *  {type: "merchant", data: merchantId}
     * ]
     */
    protected function format()
    {
        return json_encode([
            [
                'type' => 'user',
                'data' => $this->user->id,
            ],
            [
                'type' => 'key',
                'data' => 'user.' . $this->action,
            ],
            [
                'type' => 'merchant',
                'data' => $this->merchant->id,
            ]
        ]);
    }
}
