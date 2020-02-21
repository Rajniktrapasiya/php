<?php


namespace App\Controllers;

use App\Models\UserRegistration;

session_start();
class Validation {

    public function userValidation($post) {
        $bol = true;
        $error = [];
        foreach ($post as $key =>$value) {
            foreach ($value as $keys => $values) {
                // echo $keys." ".$values."<br>";
                if ($values == "") {
                    $error[$keys] = "REQUIRE NOT Emptry";
                    $bol = false;
                }
            }
            
        }

        return [$bol,$error];
    }

    public function userLogin($post) {
        
        $result = UserRegistration :: getUserIdPass();
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        $id = $pass = false;
        foreach ($result as $key => $value) {
            foreach ($value as $keys => $values) {
                if ($post['loginId'] == $values) {
                    $id = true; 
                }
                if ($post['password'] == $values) {
                    $pass = true; 
                }
                if ($id == true && $pass == true) {
                    $_SESSION['userId'] = $value['user_id'];
                    // echo $_SESSION['userId'];
                    // echo $key['user_id'];
                    return true;
                    break;
                }
            }
        }
    }

    public function serviceRegistration($post) {
        
        $timeSlot = UserRegistration :: getTimeSlotDetail();
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        foreach ($timeSlot as $key => $value) {
            if ($post['service']['Date'] == $value['Date']) {
                if ($post['service']['timeSlot'] == $value['timeSlot']) {
                    if ($value['count'] >= 3) {
                        $timeSlotError = "TimeSloat Allocated";
                        return $timeSlotError;
                    break;
                    }
                }
            }
        }
        return $timeSlotError = "";
    }
}
?>