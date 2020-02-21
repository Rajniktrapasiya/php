<?php

namespace App\Controllers;
use \Core\View;
use App\Controllers\Validation;
use App\Models\UserRegistration;

class User extends \Core\Controller {
    public function addAction() {
        // echo "calling";
        View::renderTemplate('add.html', [
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }

    public function checkAction() {
        $check = Validation :: userValidation($_POST);
        $timeSlotError = Validation :: serviceRegistration($_POST);
        $VehicleError = Validation :: vehicleRegistration($_POST);

        if ($check[0] && $timeSlotError == "" && $VehicleError == "") {

            UserRegistration :: insertServiceIntoDb($_POST);
            
            $result = UserRegistration :: getUserService();
            
            View::renderTemplate('dashbord.html', [
                'userData' => $result,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);

        } else {
            View::renderTemplate('add.html', [
                'error' => $check[1],
                'vehicleNumber' => $VehicleError,
                'timeSlot' => $timeSlotError,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);  
        }
    }

}


?>