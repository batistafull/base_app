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
        $this->auth->getSession('auth_id', function(){
            $this->redirect('/');
         }, true);
        $this->theme->partials($this->data, 'login');
        $this->view('login');
    }

    public function auth(){
        $user = $this->db->select('users', '*', ['username' => $_POST['username'], 'user_hash' => hash('sha256', $_POST['password'])]);
        if(count($user) > 0){
            $this->auth->setSession(['auth_id' => $user[0]['id']], function(){
                $this->redirect('/');
            });
        }else{
            $this->redirect('/login');
        }
    } 

    public function logout(){
        $this->auth->deleteSession(function(){
            $this->redirect('/');
        });
    }

}