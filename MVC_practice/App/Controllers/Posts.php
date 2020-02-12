<?php
namespace App\Controllers;

use \Core\View;

class Posts extends \Core\Controller {
    public function indexAction() {
        // echo 'Hello this is Index action in post controller';
        // echo '<p>Query string parameters: <pre>'. htmlspecialchars(print_r($_GET, true)) . '</pre></p>';  
        View::renderTemplate('Posts/index.html',
    [
        'base_url' => dirname($_SERVER['SCRIPT_NAME'])
    ]);
    }
 
    public function addNewAction() {
        echo 'Hello this is addNew i Post Controller';
    }

    public function editAction() {
        echo "Hello from the action in the Posts Controller!";
        echo '<p>Route parameters: <pre>'. htmlspecialchars(print_r($this->route_params, true)) . '</pre></p>';
    }
}

?>