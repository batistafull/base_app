<?php

namespace modules;

class Ext extends \core\Module
{
    private $auth;
    private $mm;
    private $theme;
    private $db;
    public function __construct()
    {
        parent::__construct();
        $this->auth = $this->getComponent('Auth');
        $this->mm = $this->getComponent('ModuleManager');
        $this->theme = $this->getComponent('Themes');
        $this->db = $this->getComponent('DbManager')->initConexion();
    }

    public function index()
    {
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
        });
        if(isset($_GET['module']) && !empty($_GET['module'])){
            $action = $_GET['action'] ?? 'list';
            $defs = $this->mm->getExt($_GET['module'], $action);
            $this->data[$action] = $this->db->select('ext_clientes','*');
            $this->data['listDefs'] = $defs[$action];
            $this->theme->display('Ext', $defs['action'], $this->data);
        }else{
            $this->theme->display('Ext', 'There is no module!', $this->data);
        }
    }

    public function studio(){
        $this->auth->getSession('auth_id', function(){
            $this->redirect('login');
        });
        $this->theme->display('Ext', 'studio', $this->data);
    }
}
