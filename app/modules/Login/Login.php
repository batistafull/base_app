<?php

class Login extends Module{
    private $db;
    private $theme;
    private $auth;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->getComponent('DbManager')->initConexion();
        $this->theme = $this->getComponent('Themes');
        $this->auth = $this->getComponent('Auth');
    }

    public function index(){
        $this->theme->partials($this->data, 'login');
        $this->view('login');
    }

    public function auth(){
        $user = $this->db->select('users', '*', ['username' => $_POST['username']]);

        if(count($user) > 0){
            $this->auth->setSession(['auth_id' => $user[0]['id']], function(){
                $this->redirect('/');
            });
        }else{
            $this->redirect('/login');
        }
    }

}