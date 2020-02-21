<?php

namespace App\Models;

use PDO;
use PDOException;

class UserRegistration extends \Core\Model {

    public function getData($Query) {
        try {
            $db = self::getDB();
            $stmt = $db->query($Query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function insertDb($Query,$return=[]) {
        try {
            $db = self::getDB();
            $db->query($Query);
            if (isset($return)) {
                return $db->lastInsertId();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function updateDataFromAdmin($post) {
        foreach ($post as $key => $value) {
            $serviceInsert = "UPDATE `service_registrations` SET `status` = 'accept' WHERE `service_id` =";
            $serviceInsert .= $value;
            self:: insertDb($serviceInsert);
        }
        return true;
    }

    public function getAllAdminData() {
        $Query = "SELECT * FROM `service_registrations`";
        $result = self :: getData($Query);
        return $result;
    }

    public function getVehicleDetail() {
        $Query = "SELECT  `user_id`,`vehicleNumber`, `userLicenceNumber` FROM `service_registrations`";
        $result = self :: getData($Query);
        return $result;
    }

    public function getUserService() {
        $Query = "SELECT  `title`, `vehicleNumber`, `userLicenceNumber`, `Date`, `timeSlot`, `VehicleIssue`, `center`, `status` FROM `service_registrations` WHERE `user_id` = ".$_SESSION['userId'];
        $result = self :: getData($Query);
        return $result;
    }

    public function insertServiceIntoDb($post) {
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        $serviceInsert = "INSERT INTO `service_registrations`(`user_id`, `title`, `vehicleNumber`, `userLicenceNumber`, `Date`, `timeSlot`, `VehicleIssue`, `center`) VALUES (";
        $serviceInsert .= "'".$_SESSION['userId']."',";
        foreach ($post["service"] as $key => $value) {
            $serviceInsert .= "'".$value."',";
        }
        $serviceInsert = substr($serviceInsert, 0, -1);
        $serviceInsert .= ")";

        self:: insertDb($serviceInsert);
    }

    public function getTimeSlotDetail() {
        $Query = "SELECT  `Date`, COUNT(`timeSlot`) AS count ,`timeSlot` FROM `service_registrations` GROUP by timeSlot ,Date";
        $result = self :: getData($Query);
        return $result;
    }

    public function getUserIdPass() {
        $Query = "SELECT `user_id`,`email`, `password` FROM `users`";
        $result = self :: getData($Query);
        return $result;
    }

    public function insertIntoDb($post) {
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";

        
        
        $userInserQuery = "INSERT INTO `users`(`firstName`, `lastName`, `email`, `password`, `phoneNumber`) VALUES (";
        foreach ($post["user"] as $key => $value) {
            $userInserQuery .= "'".$value."',";
        }
        $userInserQuery = substr($userInserQuery, 0, -1);
        $userInserQuery .= ")";
        echo $userInserQuery,"<br>";        

        $lastId = self:: insertDb($userInserQuery, true);

        $userAddressInserQuery = "INSERT INTO `user_addresses`(`user_id`, `street`, `city`, `state`, `zipCode`, `country`) VALUES (";
        $userAddressInserQuery .= "'$lastId',";
        foreach ($post["userAddress"] as $key => $value) {
            $userAddressInserQuery .= "'".$value."',";
        }
        $userAddressInserQuery = substr($userAddressInserQuery, 0 ,-1);
        $userAddressInserQuery .= ")";
        self :: insertDb($userAddressInserQuery);
        return true;
    }
}


?>