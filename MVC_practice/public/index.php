<?php
// this is front controller index

// require '../Core/Router.php';

// require '../App/Controllers/Posts.php';

//echo get_class($router);
//echo "Requested URL :- ".$_SERVER['QUERY_STRING'];

require '../vendor/autoload.php';
 

// spl_autoload_register(function ($class) {
//     $root = dirname(__DIR__);
//     $file = $root. '/' .str_replace('\\', '/', $class) . '.php';
//     if (is_readable($file)) {
//         require $root. '/' .str_replace('\\', '/', $class) . '.php';
//     }
// });

$router = new Core\Router();

//$router -> add('',['controller' => 'Home', 'action' => 'index']);
//$router -> add('posts',['controller' => 'Posts', 'action' => 'index']);
// $router -> add('posts/new',['controller' => 'Posts', 'action' => 'new']);
$router -> add('{controller}/{action}');
$router -> add('{controller}/{id:\d+}/{action}');
$router -> add('admin/{controller}/{action}', ['namespace' => 'Admin']);

// echo "<pre>";
// print_r($router);
// echo "</pre>";
// echo '<pre>';
// echo htmlspecialchars(print_r($router->getRoutes(), true));
// echo '</pre>';

// $url = $_SERVER['QUERY_STRING'];

// if ($router->match($url)) {
//     echo "<pre>";
//     var_dump($router->getParams());
//     echo "</pre>";
// } else {
//     echo "No route found ".$url;
// }

$router->dispatch($_SERVER['QUERY_STRING']);
?> 