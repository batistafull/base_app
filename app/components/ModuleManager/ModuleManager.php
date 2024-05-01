<?php

namespace components;

class ModuleManager extends \core\Component{

    public function __construct()
    {
        parent::__construct();
    }

    public function getExt($module, $action){
        $defs =[];
        if(is_dir('app/components/ModuleManager/ext/' . $module) 
        && file_exists('app/components/ModuleManager/ext/' . $module . '/varDefs.php')){
            if(file_exists('app/components/ModuleManager/ext/' . $module . '/' . $action . 'Defs.php')){
                require 'app/components/ModuleManager/ext/' . $module . '/' . $action . 'Defs.php';
                $defs['action'] = $action . '.view';
                $defs['list'] = $listView;
                return $defs;
            }else{
                return [
                    'action' => 'Error'
                ];
            }
        }
    }
}