<?php
namespace Core;

include_once "../App/Controllers/Admin/Users.php";

class Router {
    protected $routes = [];

    protected $params = [];
  
    public function add($route, $params = []) {
        $route = preg_replace('/\//', '\\/', $route);

        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);


        $route = '/^'.$route.'$/i';

        // echo 
        
        $this->routes[$route] = $params;
        
    } 

    public function getRoutes() {
        return $this->routes;
    }   

    // foreach ($this->routes as $route => $params) {
    //     if ($url == $route) {
    //         $this->params = $params;
    //         return true;
    //     }
    // }

    public function match($url) {
        // $reg_exp = "/^(?P<controller>[a-z-]+)\/(?P<action>[a-z-]+)$/";
        // echo "<pre>";
        //print_r($this->routes); die;
        foreach ($this->routes as $route => $params) {
            // echo $route."<br>";
            // echo $url."<br>";
            if (preg_match($route, $url, $matches)) {
                // $param = [];
                // echo "<pre>";
                // print_r($matches);
                // echo "<br>";
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }

                $this->params = $params;
                // echo "<pre>";
                // print_r($params);
                // echo "</pre>";
                // die;
                return true;
            }
        }
        return false;
    }

    public function getParams() {
        return $this->params;
    }

    public function dispatch($url) {
        $url = $this->removeQueryStringVariables($url);

        // print_r($url);
        // echo "<br>";
        if($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            // $controller = "App\Controllers\\$controller";
            $controller = $this->getNamespace().$controller;
            // echo $controller;    
            
            if (class_exists($controller)) {
                // print_r($controller);
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);
                // echo "<br>".$action;

                if (is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                } else {
                    echo "method $action (in controller $controller) not found";
                }
            } else {
                echo "controller class $controller not found";
            }
        } else {
            echo "NO route matched";
        }
    }

    protected function convertToStudlyCaps($string) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
    }

    protected function convertToCamelCase($string) {
        return lcfirst($this->convertToStudlyCaps($string));
    }

    protected function removeQueryStringVariables($url) {
        if ($url != '') {
            // echo $url;
            $parts = explode('&', $url, 2);
            // echo "<pre>";
            // print_r($parts);
            // echo "</pre>";
            if (strpos($parts[0], '=') === false) {
                $url = $parts[0];
                // echo $url;
            } else {
                $url = '';
            }
        }

        return $url;
    }

    protected function getNamespace() {
        $namespace = 'App\Controllers\\';

        if (array_key_exists('namespace', $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
        }
        return $namespace;
    }
}
?>