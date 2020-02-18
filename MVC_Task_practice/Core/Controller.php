<?php

namespace Core;

abstract class Controller {
    protected $route_params = [];

    public function __construct($route_params) {
        $this->route_params = $route_params;
    }

    public function __call($name, $arguments = [])
    {
        $method = $name. 'Action';
        // echo "Caling<br>    ";
        if (method_exists($this, $method)) {
            call_user_func_array([$this,$method],$arguments);
        } else {
            echo "Method :- $method Not Found".get_class($this);
        }
    }

}


?>