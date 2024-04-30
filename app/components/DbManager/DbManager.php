<?php

namespace components;

use Medoo\Medoo;

class DbManager extends \core\Component{

    public function __construct()
    {
        parent::__construct();
    }

    public function initConexion(){
        return new Medoo([
            'type' => DB_CONFIG['type'],
            'host' => DB_CONFIG['host'],
            'database' => DB_CONFIG['database'],
            'username' => DB_CONFIG['username'],
            'password' => DB_CONFIG['password']
        ]);
    }

}