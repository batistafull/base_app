<?php
namespace core;

require 'vendor/autoload.php';
require 'core/constants.php';
require 'core/Module.php';
require 'core/Component.php';

use Flight;

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
            $module = (!empty($this->manifest['routes'][0]) && is_dir('app/modules/'.$this->manifest['routes'][0])) ? $this->manifest['routes'][0] : MAIN;
            if(file_exists('app/modules/' . $module . '/manifest.php')){
                require_once 'app/modules/' . $module . '/manifest.php';
                $GLOBALS['manifest'] = $manifest;
                $className = $manifest['className'];
                if(file_exists('app/modules/'.$className.'/'.$className.'.php')){
                    require_once 'app/modules/'.$className.'/'.$className.'.php';
                    $classFullName = 'modules\\' . $className;
                    $m = new $classFullName();
                    $method = $manifest['index'];
                    if(in_array(strtolower($this->manifest['routes'][0]), [strtolower(MAIN), strtolower($className)])){
                        if(isset($this->manifest['routes'][1]) && !empty($this->manifest['routes'][1])){
                            $method = (method_exists($m, $this->manifest['routes'][1])) ? $this->manifest['routes'][1] : $manifest['index'];
                        }
                    }else{
                        if(isset($this->manifest['routes'][0]) && !empty($this->manifest['routes'][0])){
                            $method = (method_exists($m, $this->manifest['routes'][0])) ? $this->manifest['routes'][0] : $manifest['index'];
                        }
                    }
                    $m->$method();
                }else{
                    echo json_encode(['Error con la clase' . $className]);
                }
            }else{
                echo json_encode(['Archivo manifest no existe']);
            }
        });
    }

    private function getParams(){
        if (!defined('NAME')) {
            throw new \Exception("La constante NAME no está definida.");
        }
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        $startIndex = ($routes[1] == NAME) ? 2 : 1;
        $this->manifest['routes'] = array_slice($routes, $startIndex);
        return $this->manifest['routes'];
    }
}