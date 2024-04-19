<?php


class Module{
    protected $className;
    protected $data;
    protected $manifest;

    public function __construct()
    {
        $this->className = get_called_class();
        $this->data = [];
        $this->manifest = $GLOBALS['manifest'];
        foreach ($GLOBALS['app_manifest'] as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    protected function view($path){
        Flight::render('modules/' . $this->className . '/views' . '/' . $path, $this->data); 
    }

    protected function dependencies($classname){
        if(isset($this->manifest['dependencies']) && !empty($this->manifest['dependencies'])){
            $module = array_search($classname, $this->manifest['dependencies']);
            if(file_exists('app/modules/'. $module . '/includes' . '/' . $classname . '.php')){
                require_once 'app/modules/'. $module . '/includes' . '/' . $classname . '.php';
                return new $classname();
            }
        }
    }

    protected function getComponent($component){
        if(is_dir('app/components/'.$component)){
            if(file_exists('app/components/'.$component.'/manifest.php')){
                require_once 'app/components/'.$component.'/manifest.php';
                if(file_exists('app/components/'.$manifest['className'].'/'.$manifest['className'].'.php')){
                    require_once 'app/components/'.$component.'/'.$manifest['className'].'.php';
                    return new $manifest['className']();
                }
            }
            
        }
    }

    protected function redirect($url){
        Flight::redirect($url);
    }

}