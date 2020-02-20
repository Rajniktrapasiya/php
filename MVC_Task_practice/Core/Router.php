<?php

namespace Core;

// require_once "../App/Controllers/Home.php";
include_once "App/Controllers/Admin/edit.php";
include_once "App/Controllers/viewCategories.php";
include_once "App/Controllers/viewProduct.php";
include_once "App/Controllers/viewAboutUs.php";
include_once "App/Controllers/Admin/editCategory.php";
include_once "App/Controllers/Admin/Cms/editCms.php";
include_once "App/Models/Categories.php";
include_once "App/Models/ProductAdd.php";
include_once "App/Models/Cms.php";

class Router {
    protected $routes = [];

    protected $params = [];

    public function add($route, $params = []) {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
        
        
        $route = '/^'.$route.'$/i';
        
        // echo $route."<br>";
        
        $this->routes[$route] = $params;
        
    } 
    
    public function match($url) {
        // echo $url."<br>";
        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url ,$match)) {
                // echo "<pre>";
                // var_dump($match);
                // echo '</pre>';
                
                foreach ($match as $key => $value) {
                    if (is_string($key)) {
                        $params[$key] = $value;
                    }
                }
                // echo "<pre>";
                // var_dump($params);
                // echo '</pre>';
                
                $this->params = $params;
                // print_r($this->params);

                return true;
            }
        }
        return false;
    }

    public function dispatch($url){
        $url = $this->removeQueryStringVariables($url);
        // echo $url."<br>";

        if ($this->match($url)) {
            // echo "Match Found";
            $controller = $this->params['controller'];  
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace().$controller;
            // echo $controller."<br>";
            // die;

            if (class_exists($controller)) {
                $controller_object = new $controller($this->params);
                // echo "<pre>";
                // var_dump($controller);
                // echo "</pre>";
                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                // echo $action;

                if (is_callable([$controller_object,$action])) {
                    $controller_object->$action($this->params);
                } else {
                    echo "Method :- $action  Not Found";
                }

            } else {
                echo "Controller Class :- $controller Not Found";
            }

        } else {
            echo "NO Route Found :-(";
        }
    }

    public function removeQueryStringVariables($url) {
        if ($url != '') {
            $parts = explode('&',$url,2);
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
            } else {
                $url = '';
            }
            return $url;
        }
    }

    public function convertToStudlyCaps($string) {
        return str_replace(' ','',ucwords(str_replace('-',' ',$string)));
    }

    public function convertToCamelCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    public function getNamespace() {
        $namespace = "App\Controllers\\";

        if (array_key_exists('namespace',$this->params)) {
            $namespace .= $this->params['namespace'] . "\\"; 
        }
        // echo $namespace;
        return $namespace;
    }
}

?>