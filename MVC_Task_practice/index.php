<?php

// echo "<pre>";
require "vendor/autoload.php";
// die;
// spl_autoload_register(function ($class) {
//     $root = dirname(__DIR__);
//     $file = $root. '/' .str_replace('\\', '/', $class) . '.php';
//     if (is_readable($file)) {
//         require $root. '/' .str_replace('\\', '/', $class) . '.php';
//         // print_r($file);
//     }
// });

$routes = new Core\Router();

$routes -> add("",['controller'=> 'Home','action'=> 'Home']);
$routes -> add("{controller}",['action'=> 'Home']);
$routes -> add("{controller}/{action}");
$routes -> add("admin/{controller}/{action}",['namespace' => 'Admin']);
$routes -> add('admin/{controller}/{action}/{id}/{value:\d+}',['namespace' => 'Admin']);
$routes -> add("admin/cms/{controller}/{action}",['namespace' => 'Admin\Cms']);
$routes -> add('admin/cms/{controller}/{action}/{id}/{value:\d+}',['namespace' => 'Admin\Cms',]);
// $routes -> add("admin/{controller}/{action}",['namespace' => 'Admin']);


// echo $_SERVER['QUERY_STRING']."<br>";
$routes->dispatch($_SERVER['QUERY_STRING']);
?>