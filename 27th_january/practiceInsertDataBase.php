<?php

include_once 'databaseConnection.php';
$conn = openCon();


$insertQuery ="INSERT INTO `customers`(`prefix`, `firstName`, `lastName`, `dateOfBirth`, `phoneNumber`, `email`, `passWord`) VALUES ";
$insertQueryAddress = "INSERT INTO `customer_address`(`customers_id`, `addressLine1`, `addressLine2`, `compunyName`, `cityName`, `state`, `country`, `postalCode`) VALUES ";
$insertQueryAdditionalInfo = "INSERT INTO `customer_additional_info`(`customers_id`, `fieldKey`, `value`) VALUES ";
$tempValue = "";

$updateCustomers = "UPDATE `customers` SET ";
$updateQueryAddress = "UPDATE `customer_address` SET ";
$updateQueryAdditionalInfo = "UPDATE `customer_additional_info` SET ";
$lastId;

function insertQuery($arr) {
    global $conn,$tempValue,$insertQuery,$insertQueryAddress,$lastId,$insertQueryAdditionalInfo;
    if(array_key_exists('firstName',$arr)) {
        foreach($arr as $key => $value){
            $tempValue .= "'".$arr[$key]."',";
        }
        $tempValue = substr($tempValue, 0, -1);
        $insertQuery .= "(".$tempValue.")";
        //echo $insertQuery;
        exicuteQuery($insertQuery);
        $lastId = mysqli_insert_id($conn);
        $tempValue = "";
    }
    if(array_key_exists('addressLine1',$arr)) {
        $tempValue .= "'".$lastId."',";
        foreach($arr as $key => $value){
            $tempValue .= "'".$arr[$key]."',";
        }
        $tempValue = substr($tempValue, 0, -1);
        $insertQueryAddress .= "(".$tempValue.")";
        //echo $insertQueryAddress;
        exicuteQuery($insertQueryAddress);
        $tempValue = "";
    }
    if(array_key_exists('discriptionAboutSelf',$arr)) {
        foreach($arr as $key => $value){
            $tempValue .= "'".$lastId."',";
            $tempValue .= "'".$key."','".$value."'";
            $insertQueryAdditionalInfo .= "(".$tempValue.")";
            //echo $insertQueryAdditionalInfo;
            exicuteQuery($insertQueryAdditionalInfo);
            $tempValue = "";
            $insertQueryAdditionalInfo = "INSERT INTO `customer_additional_info`(`customers_id`, `fieldKey`, `value`) VALUES ";
        } 
    }
}

function updateQuery($arr) {
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    global $tempValue,$updateCustomers,$updateQueryAdditionalInfo,$updateQueryAddress;
    if(array_key_exists('firstName',$arr)) {
        foreach($arr as $key => $value){
            $tempValue .= "".$key." = '".$value."',";
        }
        $tempValue = substr($tempValue, 0, -1);
        $updateCustomers .= $tempValue." WHERE customers_id = ".$_SESSION['customers_id'];
        //echo $updateCustomers."<br>";
        exicuteQuery($updateCustomers);
        $tempValue = "";
    }
    if(array_key_exists('addressLine1',$arr)) {
        foreach($arr as $key => $value){
            $tempValue .= "".$key." = '".$value."',";
        }
        $tempValue = substr($tempValue, 0, -1);
        $updateQueryAddress .= $tempValue." WHERE customers_id = ".$_SESSION['customers_id'];
        //echo $updateQueryAddress."<br>";
        exicuteQuery($updateQueryAddress);
        $tempValue = "";
    }
    if(array_key_exists('discriptionAboutSelf',$arr)) {
        foreach($arr as $key => $value){
            $tempValue .= "fieldKey = '".$key."',";
            $tempValue .= "value = '".$value."'";
            $updateQueryAdditionalInfo .=  $tempValue." WHERE customers_id = '".$_SESSION['customers_id']."' AND fieldKey ='".$key."'";
            //echo $updateQueryAdditionalInfo."<br>";
            exicuteQuery($updateQueryAdditionalInfo);
            $tempValue = "";
            $updateQueryAdditionalInfo = "UPDATE `customer_additional_info` SET ";
        } 
        unset($_SESSION['customers_id']);
        unset($_SESSION["dataBase"]);
        header("Location:practiceRetriveData.php");
    }
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    // echo $updateCustomers;
    // $tempValue = "";
    //echo "--------------------------------";
}

function exicuteQuery($insertQuery){
    global $conn;
    mysqli_select_db($conn , 'customer_portal');
    if(mysqli_query($conn,$insertQuery)) {
        echo "Data inserted<br>";
        
    } else {
        echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
    }  
}

?>