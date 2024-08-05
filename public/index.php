<?php
// echo 'Request URL = "' . $_SERVER['QUERY_STRING'] . '"';
require_once dirname(__DIR__) . '/vendor/autoload.php';
// Twig_Autoloader::register();

spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

error_reporting(E_ALL);
set_error_handler('Core\Error::exceptionHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router();

//echo get_class($router);

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Posts', 'action' => 'index']);
// $router->add('posts/add-new', ['controller' => 'Posts', 'action' => 'new']);
// $router->add('admin/{action}/{controller}');
$router->add('{controller}/action');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);
// echo '??';

// print_r($router->getRoutes());
// echo '/<pre>';

// $url = $_SERVER['QUERY_STRING'];
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// if ($router->match($url)) {
//     echo '<pre>';
//     print_r($router->getParams());
//     echo '</pre>';
// } else {
//     echo "<br/> Route not found, $url. 404 error";
// }

$router->dispatch($_SERVER['QUERY_STRING']);
