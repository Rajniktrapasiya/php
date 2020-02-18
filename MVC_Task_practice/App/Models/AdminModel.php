<?php

namespace App\Models;

class AdminModel extends \Core\Model {
    public function getAll($Query) {
        $db = self::getDB();
        $stmt = $db->query($Query);
        return $stmt;
    }

    public function getProducts() {
        $selectQuery = "SELECT * FROM `products`";
        $posts = self::getAll($selectQuery);
        return $posts;
    }

    public function getCategories() {
        $selectQuery = "SELECT * FROM `categories`";
        $posts = self::getAll($selectQuery);
        return $posts;
    }
}

?>