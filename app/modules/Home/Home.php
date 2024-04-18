<?php

class Home extends Module{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        //$select = $this->db->select('config', '*', ['id' => '01385fde-9683-419c-8045-b397ccdfd737']);
        //echo json_encode($select);
        //$this->dependencies('TestNumber')->numero();
        $theme = $this->getController('Themes');
        $theme->display('Home', 'home', $this->data);

    }

}