<?php

namespace SiteMicroEngine\App\Controllers;

class Controller {

    public $view;

    public function render($fileView, $data = null) {
        $view = new \SiteMicroEngine\App\Views\View();
        $className = str_replace('SiteMicroEngine\App\Controllers\\', '', get_class($this));
        $view->generate($className, $fileView, $data);
    }

    public function actionIndex($params = null) {
        
    }

    public function getModel() {
        $modelName = (new \ReflectionClass($this))->getShortName();
        $fullModelName = '\SiteMicroEngine\App\Models\\' . $modelName;
        return new $fullModelName();
    }

}

?>