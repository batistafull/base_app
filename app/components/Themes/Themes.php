<?php

class Themes extends Component{
    private $themeName;
    private $themePath;
    private $metadata;
    public function __construct()
    {
        parent::__construct();
        $this->themeName = THEME_NAME;
        $this->themePath = 'app/components/Themes/templates/'.$this->themeName.'/';
        if(file_exists('app/components/Themes/templates/'.$this->themeName.'/metadata.php')){
            require_once 'app/components/Themes/templates/'.$this->themeName.'/metadata.php';
            $this->metadata = $metadata;
        }
    }

    public function partials($data = [], $type = 'main'){
        $data['themePath'] = $this->themePath;
        foreach ($this->metadata['partials'][$type] as $key => $value) {
            Flight::render($this->component_path.'templates/'.$this->themeName.'/views'.'/'.$key, $data, $value);
        }
    }

    public function display($module, $path, $data = [], $type = 'main'){
        $this->partials($data, $type);
        Flight::render('modules/' . $module . '/views' . '/' . $path, $data, 'bodyContent');
        Flight::render($this->component_path.'templates/'.$this->themeName.'/views/body', $data);
    }

}