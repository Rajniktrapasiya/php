<?php

session_start();
include_once "insertDataBase.php";
if(isset($_POST['registrationPageSubmit'])) {
    $firstNameErr = $lastNameErr = $emailErr = $phoneErr = $confirmPassWordErr="";
    $acceptTermErr = "-------Check Term Condition";
    foreach($_POST as $key => $value) {
        foreach($value as $key1 => $value1) {
            validationItems($key1);
        }
    }
    if($firstNameErr == "" && $lastNameErr == "" && $emailErr == "" && $phoneErr == "" && $confirmPassWordErr == "" && $acceptTermErr == "") {
        foreach($_POST as $key => $value) {
            foreach ($value as $valuekey => $subvalue) {
                setValue($key,$valuekey);
            }
        }
        insertIntoDb($_POST["user"]);
    } else {
    }
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
function setValue($key,$value) {
    $_SESSION[$key][$value] = isset($_POST[$key][$value]) ? $_POST[$key][$value] : "" ;
}

function validationItems($checkItem) {
    global $firstNameErr , $lastNameErr , $emailErr , $phoneErr , $confirmPassWordErr,$acceptTermErr;
    switch($checkItem) {
        case "firstName":
            if (!preg_match("/^[a-z,A-Z]{3,20}$/",$_POST['user']['firstName'])) {
                empty($_POST['user']['firstName']) ? $firstNameErr = "First Name Require." : $firstNameErr = "Enter Valid Name";
            }
        break;
        case 'lastName':
            if(!preg_match("/^[a-z,A-Z]{3,20}$/",$_POST['user']['lastName'])) {
                empty($_POST['user']['lastName']) ? $lastNameErr = "Last Name Require." : $lastNameErr = "Enter Valid Name";
            }
        break;
        case 'email':
            if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['user']['email'])) {
                empty($_POST['user']['email']) ? $emailErr = "email Require." : $emailErr = "Enter Valid Email";
            }
        break;
        case 'phoneNumber':
            if(!preg_match("/^[0-9]{10}$/",$_POST['user']['phoneNumber'])) {
                empty($_POST['user']['phoneNumber']) ? $phoneErr = "phoneNumber Require." : $phoneErr = "Enter Valid phone Number";
            }
        break;
        case 'confirmPassword':
            $_POST['user']['password'] == $_POST['user']['confirmPassword'] ? $confirmPassWordErr ="" : $confirmPassWordErr = "Password is not match";
        break;
        case 'termCondition': 
            $acceptTermErr = "";
        break;
    }
}
?>