<?php

class Clientes extends Module{
    private $auth;
    private $theme;
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->getComponent('Auth');
        $this->theme = $this->getComponent('Themes');
    }

    public function index(){
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
        });
        $this->data['props'] = $this->props;
        $this->theme->display('Clientes', 'clientes', $this->data);
    }
}