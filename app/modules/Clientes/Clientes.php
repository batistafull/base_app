<?php

class Clientes extends Module{
    private $auth;
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->getComponent('Auth');
    }

    public function index(){
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
         });
    }
}