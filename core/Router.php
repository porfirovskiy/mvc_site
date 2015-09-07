<?php

namespace SiteMicroEngine\App\Core;

class Router {

    public static function start() {

        $uriPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uriParts = explode('/', trim($uriPath, ' /'));

        $controllerName = array_shift($uriParts);
        $actionName = array_shift($uriParts);

        if (empty($controllerName) && empty($actionName)) {
            $controllerName = "Main";
            $actionName = "index";
        }

        for ($i = 0; $i < count($uriParts); $i++) {
            $params[$uriParts[$i]] = $uriParts[++$i];
        }

        // include model
        $modelName = $controllerName;
        $modelFile = $modelName . '.php';
        $modelPath = 'app/models/' . $modelFile;
        if (file_exists($modelPath)) {
            require_once $modelPath;
        }
        else {
            self::pageNotFound();
        }

        $controllerFile = $controllerName . '.php';
        $controllerPath = 'app/controllers/' . $controllerFile;
        if (file_exists($controllerPath)) {
            include($controllerPath);
        }
        else {
            self::pageNotFound();
        }
        // create controller
        $namespace = '\SiteMicroEngine\App\Controllers\\' . $controllerName;
        $controller = new $namespace();
        $action = "action" . $actionName;
        if (self::existAction($controller, $action)) {

            if (!empty($params)) {
                $controller->$action($params);
            }
            else {
                $controller->$action();
            }
        }
        else {
            self::pageNotFound();
        }
    }

    private static function existAction($class, $action) {
        $methods = get_class_methods($class);
        foreach ($methods as $method) {
            if ($action == strtolower($method)) {
                return true;
            }
        }
    }

    private static function pageNotFound() {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host . '404');
    }

}

?>