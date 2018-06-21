<?php
namespace App\Logs;

use App\Logs\Log;
use App\Objects\UserJsonObject;
use App\Objects\KeyJsonObject;
use App\Objects\ConstantJsonObject;


class SignInLog extends Log
{
    protected $userAgent;

    public function __construct($user, $action, $api, $userAgent)
    {
        parent::__construct($user, $action, $api);
        $this->userAgent = $userAgent;
    }

    /**
     * [
     *  {type: "user", data: userId},
     *  {type: "key", data: "manage.log.user.signin"}
     *  {type: "merchant", data: merchantId}
     * ]
     */
    protected function format()
    {
        return json_encode([
            (new UserJsonObject($this->user))->toArray(),
            (new KeyJsonObject('manage.log.user.signin'))->toArray(),
            (new ConstantJsonObject($this->userAgent))->toArray()
        ]);
    }
}
