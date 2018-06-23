<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 6/23/18
 * Time: 8:47 AM
 */

namespace App\Logs;


abstract class LogFactory
{
    protected $action;
    protected $api;
    protected $user;

    public function __construct($action, $api, $user)
    {
        $this->action = $action;
        $this->api = $api;
        $this->user = $user;
    }

    /**
     * @return Log
     */
    abstract public function makeLog();
}