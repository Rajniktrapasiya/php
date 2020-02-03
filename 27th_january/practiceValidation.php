<?php 

$firstNameErr = $lastNameErr = $emailErr = $phoneErr = $add1Err = $add2Err = $contryErr = $postalcodeErr = $confirmPassWordErr="";

function validationItems($checkItem) {
    global $firstNameErr , $lastNameErr , $emailErr , $phoneErr , $add1Err , $add2Err , $contryErr , $postalcodeErr , $confirmPassWordErr;
    switch($checkItem) {
        case "firstName":
            if (!preg_match("/^[a-z,A-Z]{3,20}$/",$_POST['account']['firstName'])) {
                empty($_POST['account']['firstName']) ? $firstNameErr = "First Name Require." : $firstNameErr = "Enter Valid Name";
            }
        break;
        case 'lastName':
            if(!preg_match("/^[a-z,A-Z]{3,20}$/",$_POST['account']['lastName'])) {
                empty($_POST['account']['lastName']) ? $lastNameErr = "Last Name Require." : $lastNameErr = "Enter Valid Name";
            }
        break;
        case 'email':
            if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/",$_POST['account']['email'])) {
                empty($_POST['account']['email']) ? $emailErr = "email Require." : $emailErr = "Enter Valid Email";
            }
        break;
        case 'phone':
            if(!preg_match("/^[0-9]{10}$/",$_POST['account']['phone'])) {
                empty($_POST['account']['phone']) ? $phoneErr = "phoneNumber Require." : $phoneErr = "Enter Valid phone Number";
            }
        break;
        case 'postalCode':
            if(!preg_match("/^[0-9]{6}$/",$_POST['account_address']['postalCode'])) {
                empty($_POST['account_address']['postalCode']) ? $postalcodeErr = "postalCode Require." : $postalcodeErr = "Enter Valid Postal Code";
            }
        break;
        case 'addressLine1':
            empty($_POST['account_address']['addressLine1']) ? $add1Err = "addLine1 Require." : "" ;
        break;
        case 'addressLine2':
            empty($_POST['account_address']['addressLine2']) ? $add2Err = "addLine2 Require." : "" ;
        break;
        case 'country':
            empty($_POST['account_address']['country']) ?  $contryErr = "contry Name Require." : "" ;
        break;
        case 'confirmPassword':
            $_POST['account']['password'] == $_POST['account']['confirmPassword'] ? $confirmPassWordErr ="" : $confirmPassWordErr = "Password is not match";
        break;
        default:
        break;
    }
}
?>