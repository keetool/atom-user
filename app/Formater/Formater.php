<?php
namespace App\Formater;

abstract class Formater
{

    protected $data;

    public function __construct($data)
    {
        $this->data = (array) $data;
    }

    abstract protected function format();
}
