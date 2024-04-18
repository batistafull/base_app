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

    }

    public function edit(){
        $theme = $this->getController('Themes');
        $theme->partials($this->data);
        $this->data['nombre'] = 'Alberto';
        $this->view('home');
    }

    public function test(){
        echo 'dos';
    }

}