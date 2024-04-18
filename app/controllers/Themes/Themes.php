<?php

class Themes extends Controller{
    public function __construct()
    {
        parent::__construct();
    }

    public function getThemes(){
        echo 'offk';
    }

    public function partials($data = []){
        Flight::render($this->controller_path.'views/header', $data, 'headerContent');
        Flight::render($this->controller_path.'views/footer', $data, 'footerContent');
    }


}