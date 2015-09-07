<?php
/* OLD VERSION
ini_set('error_reporting', E_ALL);
spl_autoload_register(function ($class) {
    include $class.'.php';
});
//echo $_SERVER['REQUEST_URI'];

require_once("views/header.php");

$router = new Router();
$router->runModule();

require_once("views/footer.php");
*/
/* NEW VERSION - MVC */
//session_start();
ini_set('error_reporting', E_ALL);
session_start();
require_once 'app/bootstrap.php';
SiteMicroEngine\App\Core\Router::start();
?>