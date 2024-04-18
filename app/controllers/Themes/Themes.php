<?php

class Themes extends Controller{
    private $themeName;
    private $themePath;
    private $metadata;
    public function __construct()
    {
        parent::__construct();
        $this->themeName = THEME_NAME;
        $this->themePath = 'app/controllers/Themes/templates/'.$this->themeName.'/';
        if(file_exists('app/controllers/Themes/templates/'.$this->themeName.'/metadata.php')){
            require_once 'app/controllers/Themes/templates/'.$this->themeName.'/metadata.php';
            $this->metadata = $metadata;
        }
    }

    public function getThemes(){
        echo 'offk';
    }

    public function partials($data = []){
        $data['themePath'] = $this->themePath;
        Flight::render($this->controller_path.'templates/'.$this->themeName.'/views/header', $data, 'headerContent');
        Flight::render($this->controller_path.'templates/'.$this->themeName.'/views/navbar', $data, 'navbarContent');
        Flight::render($this->controller_path.'templates/'.$this->themeName.'/views/sidebar', $data, 'sidebarContent');
        Flight::render($this->controller_path.'templates/'.$this->themeName.'/views/footer', $data, 'footerContent');
    }

    public function display($module, $path, $data = []){
        $this->partials($data);
        Flight::render('modules/' . $module . '/views' . '/' . $path, $data, 'bodyContent');
        Flight::render($this->controller_path.'templates/'.$this->themeName.'/views/body', $data);
    }

}