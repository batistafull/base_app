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

    /*private function prepareModules(){
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
    }*/

    /**
     * prepare module
     */
    private function prepareModules() {
        Flight::route('/*', function() {
            $this->getParams();
            $module = $this->getModule();
            
            if (!$this->loadManifest($module)) {
                echo json_encode(['Archivo manifest no existe']);
                return;
            }
    
            $className = $GLOBALS['manifest']['className'];
    
            if (!$this->loadClass($className)) {
                echo json_encode(['Error con la clase ' . $className]);
                return;
            }
    
            $m = $this->createClassInstance($className);
            $method = $this->getMethod($m, $className);
            $m->$method();
        });
    }
    
    private function getModule() {
        return (!empty($this->manifest['routes'][0]) && is_dir('app/modules/' . $this->manifest['routes'][0])) ? 
               $this->manifest['routes'][0] : 
               MAIN;
    }
    
    private function loadManifest($module) {
        $manifestPath = 'app/modules/' . $module . '/manifest.php';
        if (file_exists($manifestPath)) {
            require_once $manifestPath;
            $GLOBALS['manifest'] = $manifest;
            return true;
        }
        return false;
    }
    
    private function loadClass($className) {
        $classPath = 'app/modules/' . $className . '/' . $className . '.php';
        if (file_exists($classPath)) {
            require_once $classPath;
            return true;
        }
        return false;
    }
    
    private function createClassInstance($className) {
        $classFullName = 'modules\\' . $className;
        return new $classFullName();
    }
    
    private function getMethod($instance, $className) {
        $defaultMethod = $GLOBALS['manifest']['index'];
        $route = $this->manifest['routes'][0];
        $subRoute = $this->manifest['routes'][1] ?? null;
    
        if (in_array(strtolower($route), [strtolower(MAIN), strtolower($className)])) {
            if ($subRoute && method_exists($instance, $subRoute)) {
                return $subRoute;
            }
        } else if (method_exists($instance, $route)) {
            return $route;
        }
    
        return $defaultMethod;
    }
    /**
     * Fin prpare module
     */

    private function getParams(){
        if (!defined('NAME')) {
            throw new \Exception("La constante NAME no está definida.");
        }
        $request_uri = parse_url($_SERVER['REQUEST_URI']);
        $routes = explode('/', $request_uri['path']);
        $startIndex = ($routes[1] == NAME) ? 2 : 1;
        $this->manifest['routes'] = array_slice($routes, $startIndex);
        return $this->manifest['routes'];
    }
}