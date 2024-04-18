<?php 
session_start();

class Auth extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkLogin(){
        if (!isset($_SESSION['auth_id'])) {
            flight::redirect('/login');
        }
    }
}