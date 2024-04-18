<?php

use Medoo\Medoo;

class Controller{
    protected $controller_path;
    protected $className;

    public function __construct()
    {
        $this->className = get_called_class();
        $this->controller_path = 'controllers/'.$this->className.'/';
    }
}