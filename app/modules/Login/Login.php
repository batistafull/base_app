<?php

class Login extends Module{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $theme = $this->getComponent('Themes');
        $theme->partials($this->data, 'login');
        $this->view('login');
    }

    public function auth(){

    }

}