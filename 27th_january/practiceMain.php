<?php

include_once 'practiceValidation.php';
include_once 'practiceDataCleaning.php';

function setValue($key,$value) {
    $_SESSION[$key][$value] = isset($_POST[$key][$value]) ? $_POST[$key][$value] : "" ;
}
$flag;
function setSession($arr) {
    foreach($arr as $key => $value) {
        foreach ($value as $valuekey => $subvalue) {
            $_SESSION[$key][$valuekey] = $arr[$key][$valuekey];
        }
    }
    echo "----------------------";
    print_r($_SESSION);
    header("Location:practice.php");
}
function getValue($key,$value,$returntype="") {
    if(isset($_POST[$key][$value])) {
        if(is_array($_POST[$key][$value])) {
            $temp = [];
            foreach($_POST[$key][$value] as $value1) {
                array_push($temp,$value1);
            }
            $_POST[$key][$value] = $temp;
        } 
        return $_POST[$key][$value];
    } else {
        return isset($_SESSION[$key][$value]) ? $_SESSION[$key][$value] : $returntype;
    }    
}

if(isset($_POST['form']['submit'])) {
    foreach($_POST as $key => $value) {
        foreach ($value as $valuekey => $subvalue) {
            validationItems($valuekey);
        }   
    }

    if($firstNameErr == "" && $lastNameErr == "" && $emailErr == "" && $phoneErr == "" && $add1Err == "" && $add2Err == "" && $contryErr == "" && $postalcodeErr == "" && $confirmPassWordErr == "") {
        foreach($_POST as $key => $value) {
            foreach ($value as $valuekey => $subvalue) {
                setValue($key,$valuekey);
            }
        }
        if($_SESSION["dataBase"] == "Yes") {
            foreach($_POST as $key){
                cleaning($key);
            }
        } else {
            foreach($_POST as $key){
                cleaning($key);
                echo "-------------------------------------------------------------------";
            }
        }
    }
}

?>