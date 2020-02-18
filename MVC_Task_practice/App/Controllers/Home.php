<?php

namespace App\Controllers;
use Core\View;

class Home extends \Core\Controller {

    public function HomeAction() {
        
        View ::renderTemplate('Home/index.html', [
            'name' => 'Rajnik',
            'colours' => ['red','green', 'blue'] ,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
        // echo "<h1>HOME</h1>";

    }
}

?>