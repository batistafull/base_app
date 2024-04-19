<?php 
session_start();

class Auth extends Component{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSession($session, $callback){
        if (!isset($_SESSION[$session])) {
            $callback();
        }
    }

    public function setSession($data, $callback){
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
        $callback();
    }
}