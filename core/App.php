<?php
require 'vendor/autoload.php';
require 'core/constants.php';
require 'core/Module.php';
require 'core/Controller.php';

class App{

    private $manifest;
    public function __construct()
    {
        require 'manifest.php';
        $this->manifest = $GLOBALS['app_manifest'] = $manifest;
    }

    public function prepareApp(){
        Flight::set('flight.views.path', 'app');
        $this->prepareModules();
    }

    public function start(){
        Flight::start(); 
    }

    private function prepareModules(){
        Flight::route('/*', function(){
            $this->getParams();
            $module = (!empty($this->manifest['routes'][0]) && is_dir('app/modules/'.$this->manifest['routes'][0])) ? $this->manifest['routes'][0] : $this->manifest['main'];
            if(file_exists('app/modules/' . $module . '/manifest.php')){
                require_once 'app/modules/' . $module . '/manifest.php';
                $GLOBALS['manifest'] = $manifest;
                if(file_exists('app/modules/'.$manifest['className'].'/'.$manifest['className'].'.php')){
                    require_once 'app/modules/'.$manifest['className'].'/'.$manifest['className'].'.php';
                    $m = new $manifest['className']();
                    $method = method_exists($m, $this->manifest['routes'][1]) ? $this->manifest['routes'][1] : $manifest['index'];
                    //$m->getController($this, 'prepareControllers');
                    $m->$method();
                    
                }else{
                    echo json_encode(['Error con la clase' . $manifest['className']]);
                }
            }else{
                echo json_encode(['Archivo manifest no existe']);
            }
        });
    }

    private function getParams(){
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if($routes[1] == $this->manifest['name']){
            $this->manifest['routes'] = array_slice($routes, 2);
        }else{
            $this->manifest['routes'] = array_slice($routes, 1);
        }
    }
}