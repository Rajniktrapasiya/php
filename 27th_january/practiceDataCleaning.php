<?php

include_once "practiceMain.php";
include_once 'practiceInsertDataBase.php';

$wellFormatData;
function cleaning($ExperimantalData) {
    global $wellFormatData,$flag;
    $wellFormatData = $ExperimantalData;
    foreach($wellFormatData as $key =>$value) {
        if(is_array($value)) {
            $tempData = $value;
            $stringConversation = implode("_",$tempData);
            $wellFormatData[$key] = $stringConversation;
        }
        if($key == 'confirmPassword') {
            unset($wellFormatData[$key]);
        }
        if($key == 'submit') {
            unset($wellFormatData[$key]);
        }
    }
    if($_SESSION["dataBase"] == "Yes") {
        updateQuery($wellFormatData);
    } else {
        insertQuery($wellFormatData);
    }
    // echo "<pre>";
    // print_r($wellFormatData);
    // echo "</pre>";
}

function DataIntigration($tableData) {
    $account = ['prefix','firstName','lastName','dateOfBirth','phone','email','password','confirmPassword'];
    $account_address =['addressLine1','addressLine2','compunyName','cityName','state','country','postalCode'];
    $account_additional_info = ['discriptionAboutSelf','uploadImage','uploadCertificate','howLongInBusiness','numberOfClients','getInTouch','Hobbies'];
    $arr = ["account"=>[],"account_address"=>[],"account_additional_info"=>[]];
    array_fill_keys($arr["account"],$account);
    array_fill_keys($arr["account_address"],$account_address);
    array_fill_keys($arr["account_additional_info"],$account_additional_info);
    foreach($tableData as $tableKey => $tableValue) {
        //print_r($tableKey);
        foreach($account as $key) {
            
            if($key == $tableKey) {
                $arr["account"][$tableKey] = $tableValue;
            }
        }
        foreach($account_address as $key) {
            if($key == $tableKey) {
                // $temp = [$tableKey =>[]];
                // array_push($arr["account_address"],$tableKey);
                $arr["account_address"][$tableKey] = $tableValue;
            }
        }
        foreach($account_additional_info as $key) {

            if($key == $tableKey) {
                if($key == 'getInTouch' || $key == 'Hobbies') {
                    $temp = $tableValue;
                    echo $tableValue;
                    $temp = explode("_",$temp);
                    echo "<pre>";
                    print_r($temp);
                    echo "-----------------------";
                    echo "</pre>";
                    $arr["account_additional_info"][$tableKey] = $temp;
                } else {
                    $arr["account_additional_info"][$tableKey] = $tableValue;
                }
            }
        }
    }
    // echo "Calling";
    // print_r($tableData);
    // print_r($arr);
    setSession($arr);
}


?>