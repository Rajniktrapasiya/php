<?php
namespace App\Controllers;
use \Core\View;

class Home extends \Core\Controller {

    protected function before()
    {
        // echo "(before)";
    }

    protected function after()
    {
        //echo "(after)";
    }

    public function indexAction() {
        // echo 'Hello From The index action in the Home controller!';
        // View::render('Home/index.php', [
        //     'name' => 'Rajnik' ,
        //     'colours' => ['red', 'green', 'blue']
        // ]);

        View::renderTemplate('Home/index.html', [
            'name' => 'Rajnik',
            'colours' => ['red','green', 'blue'] ,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);

    }
}
?>