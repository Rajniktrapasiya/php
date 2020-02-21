<?php

namespace App\Controllers;

use \Core\View;
use App\Models\UserRegistration;

class Admin extends \Core\Controller {
     
    
    public function indexAction() {
        $result = UserRegistration :: getAllAdminData();

        View::renderTemplate('admin.html', [
            'data' => $result,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }

    public function updateAction() {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
        UserRegistration :: updateDataFromAdmin($_POST);
        self :: indexAction();
    }

    // public function editAction() {

    // }
}

?>