<?php

namespace App\Controllers;
use \Core\View;
use App\Controllers\Validation;
use App\Models\UserRegistration;

class Login extends \Core\Controller {
    public function viewAction() {

        View::renderTemplate('login.html', [
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }

    public function actionAction() {
        if (isset($_POST['loginButton'])) {
            if (Validation :: userLogin($_POST)) {
                $result = UserRegistration :: getUserService();
                View::renderTemplate('dashbord.html', [
                    'userData' => $result,
                    'base_url' => dirname($_SERVER['SCRIPT_NAME'])
                ]);
            } else {
                header("Location:http://localhost/cybercom/php/vehicleserviceregistration/public/");
            }
        }
        if (isset($_POST['registrationButton'])) {
            View::renderTemplate('registration.html', [
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    public function registrationAction() {
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    
        $check = Validation :: userValidation($_POST);

        if ($check[0]) {

            UserRegistration :: insertIntoDb($_POST);
            header("Location:http://localhost/cybercom/php/vehicleserviceregistration/public/");
        } else {
            View::renderTemplate('registration.html', [
                'error' => $check[1],
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);  
        }

        
    }
}

?>