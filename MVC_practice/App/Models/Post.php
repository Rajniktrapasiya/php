<?php

namespace App\Models;

use PDO;
use PDOException;

class Post extends \Core\Model {
    public static function getAll() {
        // $host = 'localhost';
        // $dbname = 'mvc';
        // $username = 'root';
        // $password = '1234';

        try {
            // $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",$username, $password);
            $db = static::getDB();
            $stmt = $db->query('SELECT id, title, content FROM posts  ORDER BY created_at');
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            // echo "<pre>";
            // print_r($results);
            // die;
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

?>