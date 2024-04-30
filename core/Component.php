<?php

namespace core;

use Medoo\Medoo;

class Component{
    protected $component_path;
    protected $className;

    public function __construct()
    {
        $this->className = get_called_class();
        $this->component_path = $this->className.'/';
    }
}