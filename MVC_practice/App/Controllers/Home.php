<?php
namespace App\Controllers;

class Home extends \Core\Controller {

    protected function before()
    {
        echo "(before)";
    }

    protected function after()
    {
        echo "(after)";
    }

    public function indexAction() {
        echo 'Hello From The index action in the Home controller!';
    }
}
?>