<?php
namespace Core;

use PDO;
use PDOException;

abstract class Model {
    protected static function getDB() {
        static $db = null;

        // echo "main model file<br>";
        if ($db === null) {
            $host = 'localhost';
            $dbname = 'mvc';
            $username = 'root';
            $password = '1234';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username, $password);
                return $db;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}

?>