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
        foreach (glob('app/components/Themes/templates/*') as $value) {
            require 'app/components/Themes/templates/'.basename($value).'/metadata.php';
            $this->data['templates'][basename($value)] = $metadata;
        }
        $themes->display('Themes', 'themes', $this->data);
    }

    public function changeThemes(){
        if(isset($_GET['theme_name']) && !empty($_GET['theme_name'])){
            if(is_dir('app/components/Themes/templates/'.$_GET['theme_name'])){
                $constants = file_get_contents('core/constants.php');
                $constants = str_replace("define('THEME_NAME', '" . THEME_NAME . "')", "define('THEME_NAME', '".$_GET['theme_name']."')", $constants);
                file_put_contents('core/constants.php', $constants);
                $this->redirect('/Themes');
            }
        }
    }
}