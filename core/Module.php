<?php

namespace core;

class Module{
    protected $className;
    protected $data;
    protected $manifest;
    protected $props;

    public function __construct()
    {
        $this->className = get_called_class();
        $this->data = [];
        $this->data['base_url'] = BASE_URL.SUBDIR;
        $this->manifest = $GLOBALS['manifest'];
        foreach ($GLOBALS['app_manifest'] as $key => $value) {
            $this->data[$key] = $value;
        }
        $this->props = $this->getParams();
    }

    protected function view($path){
        Flight::render('modules/' . $this->className . '/views' . '/' . $path, $this->data); 
    }

    protected function dependencies($classname){
        if (!isset($this->manifest['dependencies']) || empty($this->manifest['dependencies'])) {
            throw new \Exception("No hay dependencias definidas en el manifiesto.");
        }
        $module = array_search($className, $this->manifest['dependencies'], true);
        if ($module === false) {
            throw new \Exception("La clase $className no está definida como una dependencia en el manifiesto.");
        }
        $classFile = realpath("app/modules/$module/includes/$className.php");
        if (!$classFile || !file_exists($classFile)) {
            throw new \Exception("El archivo de la clase $className no existe en el módulo $module.");
        }
        require_once $classFile;
        return new $className();
    }

    protected function getComponent($component){
        $componentDirectory = 'app/components/' . $component;
        if (!is_dir($componentDirectory)) {
            throw new \Exception("El directorio del componente $component no existe");
        }
        $manifestFile = $componentDirectory . '/manifest.php';
        if (!file_exists($manifestFile)) {
            throw new \Exception("El archivo de manifiesto para el componente $component no existe");
        }
        require_once $manifestFile;
        
        $className = $manifest['className'];
        $classFile = $componentDirectory . '/' . $className . '.php';
        if (!file_exists($classFile)) {
            throw new \Exception("El archivo de clase para el componente $component no existe");
        }
        require_once $classFile;

        $classNameFinal = 'components\\' . $manifest['className'];
        return new $classNameFinal();
    }

    protected function redirect($url){
        Flight::redirect($url);
    }

    private function getParams(){
        $url = strtok($_SERVER['REQUEST_URI'], '?');
        $routes = explode('/', $url);
        if (!defined('NAME')) {
            throw new \Exception("La constante NAME no está definida.");
        }
        $startIndex = ($routes[1] == NAME) ? 2 : 1;
        return array_slice($routes, $startIndex);
    }

}