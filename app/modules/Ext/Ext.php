<?php

namespace modules;

class Ext extends \core\Module
{
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->getComponent('Auth');
    }

    public function index()
    {
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
        });
        if(isset($_GET['module']) && !empty($_GET['module'])){
            if(isset($_GET['action']) && in_array($_GET['action'], ['listview', 'detailview', 'editview'])){
                echo $_GET['action'];
            }else{
                echo 'listview Default';
            }
        }else{
            echo 'No is set module';
        }
    }
}
