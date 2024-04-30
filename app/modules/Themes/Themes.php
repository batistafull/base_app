<?php

namespace modules;

class Themes extends \core\Module
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $themes = $this->getComponent('Themes');
        $this->data['nombre'] = 'Alberto';
        $themes->display('Home', 'home', $this->data);
    }

    public function changeThemes(){
        /*$constants = file_get_contents('core/constants.php');
        $constants = str_replace("define('THEME_NAME', '" . THEME_NAME . "')", "define('THEME_NAME', '" . $_POST['theme_name'] . "')", $constants);
        file_put_contents('core/constants.php', $constants);*/
        //$this->redirect('/Themes');
    }
}