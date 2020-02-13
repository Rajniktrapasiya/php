<?php
namespace Core;

abstract class Controller {
    protected $route_params = [];

    public function __construct($route_params) {
        $this->route_params = $route_params;
        // echo "<pre>";
        // print_r($route_params);
        // die;
    }

    public function __call($name, $args)
    {
        $method = $name . 'Action';
        // echo "calling";
        // echo "<pre>";
        // print_r($this);
        // echo "</pre>";  
        if (method_exists($this, $method)) {
            // echo $method;
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            echo "Method $method not found in controller ". get_class($this);
        }
    }

    protected function before() {
    }
    protected function after() {
    }
}

?>