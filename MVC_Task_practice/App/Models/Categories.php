<?php

namespace App\Models;
use Core\Model;
use PDO;
use PDOException;

// include_once "Core/Model.php";

class CategoryAdd extends \Core\Model {
    public function dataBase($Query) {
        $db = self::getDB();
        $stmt = $db->query($Query);
        return $stmt;
    }
    public function executeQuery($Query) {
        try {
            $stmt = self::dataBase($Query);
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    
    public function insertProduct($Query) {
        try {
            self::dataBase($Query);
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    
    public function findCategorieIdFromUrl($url) {
        $Query = "SELECT `categories_id` FROM `categories` WHERE `url_key`= '$url'";
        $CategorieId = self :: executeQuery($Query);
        // print_r($CategorieId[0]['categories_id']);
        $selectedProducts = "SELECT `image`,`product_name`, `url_key`, `price`, `short_description`, `status` FROM `products` AS P INNER JOIN (SELECT `product_id` FROM `products_categories` WHERE category_id = ".$CategorieId[0]['categories_id'].") As T WHERE T.product_id = P.products_id";
        $relatedProducts = self :: executeQuery($selectedProducts);
        // print_r($relatedProducts);
        return $relatedProducts;
    }
    public function getSubCategories() {
        $subCategoryQuery = "SELECT `category_name`, `url_key`, parent_category FROM `categories`  WHERE parent_category != 0 ORDER by parent_category";
        $subCategory = self :: executeQuery($subCategoryQuery);
        return $subCategory;
        }
    
    public function insertIntoCategorie($postData) {
        $inserQuery = "INSERT INTO `categories`(`category_name`, `url_key`, `status`, `description`, `parent_category`, `image`) VALUES (";
        foreach ($postData as $key => $value) {
            $inserQuery .= "'".$value."',";
        }
        $inserQuery = substr($inserQuery,0,-1);
        $inserQuery .= ")";
        // echo $inserQuery;
        self ::insertProduct($inserQuery);
    }

    public function getParentCategories() {
        $parentCategoryQuery = "SELECT `categories_id`, `category_name` FROM `categories` WHERE parent_category = 0";
        $parentCategory = self :: executeQuery($parentCategoryQuery);
        return $parentCategory;
    }

    public function getOnlyParentCategories() {
        $parentCategoryQuery = "SELECT `category_name`, `categories_id` FROM `categories` WHERE parent_category = 0";
        $parentCategory = self :: executeQuery($parentCategoryQuery);
        return $parentCategory;
    }

    public function getCategoriesForEdit($params) {
        $SelectQuery = "SELECT `category_name`, `url_key`, `image`, `status`, `description`, `parent_category`, `created_at`, `updated_at` FROM `categories` WHERE categories_id = ".$params['value'];
        $editProduct = self ::executeQuery($SelectQuery);
        return $editProduct;
    }

    public function updateCategories($params) {
        $updateQuery = "UPDATE `categories` SET ";
        foreach ($_POST['categorie'] as $key => $value) {
            $updateQuery .= $key ."=\"". $value."\",";
        }
        $updateQuery = substr($updateQuery, 0, -1);
        $updateQuery .= " WHERE categories_id = ".$params['value'];
        // echo $updateQuery;
        self ::insertProduct($updateQuery);
    }

    public function deleteCategories($params) {
        $deleteQuery = "DELETE FROM `categories` WHERE `categories_id` = ".$params['value'];
        self ::insertProduct($deleteQuery);
    }
}

?>