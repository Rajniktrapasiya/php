<?php

namespace App\Models;

use PDO;
use PDOException;

class ProductAdd extends \Core\Model {
    public function insertProduct($Query,$return=[]) {
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
    public function getAll($Query) {
        try {
            $db = self::getDB();
            $stmt = $db->query($Query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findProductDetailFromUrl($url) {
        $SelectQuery = "SELECT `image`,`product_name`, `short_description`, `description` , `sku`, `price`, `stock` FROM `products` WHERE url_key = '".$url."'";
        $product = self::getAll($SelectQuery);
        return $product;
    }

    public function insertIntoProduct($postData,$productCategorie) {
        $inserQuery = "INSERT INTO `products`(`product_name`, `sku`, `url_key`, `status`, `description`, `short_description`, `price`, `stock`,`image`) VALUES (";
        foreach ($postData as $key => $value) {
            $inserQuery .= "'".$value."',";
        }
        $inserQuery = substr($inserQuery,0,-1);
        $inserQuery .= ")";
        echo "<br>$inserQuery";
        $lastProductId = self ::insertProduct($inserQuery,true);
        $insetProductTransactionTable = "INSERT INTO `products_categories`(`product_id`, `category_id`) VALUES ($lastProductId , $productCategorie)";
        self :: insertProduct($insetProductTransactionTable);
    } 
    
    public function getCategorieForProduct() {
        $productCategories = "SELECT `categories_id`, `category_name` FROM `categories` WHERE parent_category != 0";
        $productCategories = self :: getAll($productCategories);
        return $productCategories;
    }

    public function editGetProduct($params){
        $SelectQuery = "SELECT `product_name`, `sku`, `url_key`, `image`, `status`, `description`, `short_description`, `price`, `stock` FROM `products` WHERE `products_id` = ".$params['value'];
        $editProduct = self ::getAll($SelectQuery);
        return $editProduct;
    }

    public function updateProducts($params,$productCategorie) {
        $updateQuery = "UPDATE `products` SET ";
        foreach ($_POST['product'] as $key => $value) {
            $updateQuery .= "$key = '$value',";
        }
        $updateQuery = substr($updateQuery, 0, -1);
        $updateQuery .= " WHERE products_id = ".$params['value'];
        // echo $updateQuery;
        self ::insertProduct($updateQuery);
        $transactionTableDeleteRecord = "DELETE FROM `products_categories` WHERE `product_id` = ".$params['value'];
        self :: insertProduct($transactionTableDeleteRecord);
        $insetProductTransactionTable = "INSERT INTO `products_categories`(`product_id`, `category_id`) VALUES (".$params['value']." , $productCategorie)";
        self :: insertProduct($insetProductTransactionTable);
    }

    public function deleteProducts($params) {
        $deleteQuery = "DELETE FROM `products` WHERE `products_id` = ".$params['value'];
        ProductAdd ::insertProduct($deleteQuery);
    }
}

?>