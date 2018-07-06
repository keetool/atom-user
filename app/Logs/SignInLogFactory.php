<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:52 AM
 */

namespace App\Logs;


class SignInLogFactory extends LogFactory
{
    protected $userAgent;

    public function __construct($api, $user, $userAgent)
    {
        parent::__construct("manage.action.user.signin", $api, $user);
        $this->userAgent = $userAgent;
    }

    /**
     * Create createMerchantLog
     * @return Log
     */
    public function makeLog()
    {
        return new SignInLog(
            $this->user,
            $this->action,
            $this->api,
            $this->userAgent
        );
    }
}