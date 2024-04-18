<?php
use Medoo\Medoo;

class Module{
    protected $className;
    protected $data;
    protected $manifest;
    protected $db;

    public function __construct()
    {
        $this->className = get_called_class();
        $this->data = [];
        $this->manifest = $GLOBALS['manifest'];
        $this->db = new Medoo([
            'type' => DB_CONFIG['type'],
            'host' => DB_CONFIG['host'],
            'database' => DB_CONFIG['database'],
            'username' => DB_CONFIG['username'],
            'password' => DB_CONFIG['password']
        ]);
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

    protected function getController($controller){
        if(is_dir('app/controllers/'.$controller)){
            if(file_exists('app/controllers/'.$controller.'/manifest.php')){
                require_once 'app/controllers/'.$controller.'/manifest.php';
                if(file_exists('app/controllers/'.$manifest['className'].'/'.$manifest['className'].'.php')){
                    require_once 'app/controllers/'.$controller.'/'.$manifest['className'].'.php';
                    return new $manifest['className']();
                }
            }
            
        }
    }


}