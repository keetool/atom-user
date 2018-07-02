<?php
/**
 * Created by PhpStorm.
 * User: quan
 * Date: 7/2/18
 * Time: 9:22 AM
 */

namespace App\SocketEvent;


abstract class SocketEvent
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public abstract function getName();

    public function getData()
    {
        return $this->data;
    }
}