<?php 
session_start();

class Auth extends Component{
    public function __construct()
    {
        parent::__construct();
    }

    public function getSession($session, $callback, $diff = false){
        if ($diff ? isset($_SESSION[$session]) && !empty($_SESSION[$session]) : !isset($_SESSION[$session])) {
            call_user_func($callback);
        }
    }

    public function setSession($data, $callback){
        foreach ($data as $key => $value) {
            $_SESSION[$key] = $value;
        }
        call_user_func($callback);
    }

    public function checkMethod($method, $callback, $diff = false){
        if ($diff ? $_SERVER['REQUEST_METHOD'] !== strtoupper($method) : $_SERVER['REQUEST_METHOD'] === strtoupper($method)) {
            call_user_func($callback);
        }
    }
}