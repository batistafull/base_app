<?php

class Home extends Module
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $auth = $this->getComponent('Auth');
        $auth->getSession('auth_id', function(){
           $this->redirect('login');
        });

        $theme = $this->getComponent('Themes');
        $this->data['nombre'] = 'Alberto';
        $theme->display('Home', 'home', $this->data);
    }
    
    public function test() {
        echo 'ok';
    }
}
