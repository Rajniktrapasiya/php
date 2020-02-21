<?php

namespace App\Controllers\Admin;

use Core\View;

use App\Models\ProductAdd;
use App\Models\CategoryAdd;
use App\Controllers\Admin\Validation;

class Categories extends \Core\Controller {
    public function urlAction() {
        $parentCategories = CategoryAdd :: getOnlyParentCategories();
        $subCategories = CategoryAdd :: getSubCategories();
        $result = [$parentCategories,$subCategories];
        echo json_encode($result);
         
    }

    public function addAction($params=[]) {
        // echo "-------------------";
        $bol = true;
        if(isset($_POST['AddCategoriesItem'])) {
            $check = Validation :: categorieValidation($_POST);
            if ($check[0]) {
                $this->image();
                CategoryAdd ::insertIntoCategorie($_POST['categorie']);
                header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/categories");
            } else {
                $this->displayAddCategories($check[1]);
                $bol = false;   
            }
        }

        if ($bol) {
            $parentCategory = CategoryAdd :: getParentCategories();
            
            isset($_POST['AddCategories']) ? $action = 'categories/add' : $action = 'add' ; 
            View :: renderTemplate("Admin/Categories/add.html",[
                'submit' => 'AddCategoriesItem',
                'parent' => $parentCategory,
                'posts' => 'add',
                'action' => $action,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    function image() {
        $filename = $_FILES['image']['name'];
            $_POST['categorie']['image'] = $filename;
            $tempName = $_FILES['image']['tmp_name'];
            // echo "<pre>";
            // var_dump($_POST);
            // echo "</pre>";
            if (isset($filename)) {
                $location = "C:/xampp/htdocs/cybercom/php/MVC_Task_practice/images/";
                if (move_uploaded_file($tempName,$location.$filename)) {
                    echo "Uploaded";
                }
            }
    }

    public function displayAddCategories($error=[],$params=[]) {
        if (!empty($params)) {
            $editProduct = CategoryAdd ::getCategoriesForEdit($params);
            $parentCategory = CategoryAdd :: getParentCategories();
            $arr = [];
            $keys = [];
            foreach ($editProduct as $key => $value) {
                foreach ($value as $keys => $values) {
                    $arr[$keys] = $values;
                }
            }
        }
            // print_r($error);
        if (empty($arr) && empty($params)) {
            $parentCategory = CategoryAdd :: getParentCategories();
            View :: renderTemplate("Admin/Categories/add.html",[
                'submit' => 'AddCategoriesItem',
                'posts' => "add",
                'parent' => $parentCategory,
                'error' => $error,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
            // $this-> addAction();
        } else {
            View :: renderTemplate("Admin/Categories/add.html",[
                'submit' => 'updateCategorieItem',
                'posts' => "add",
                'parent' => $parentCategory,
                'error' => $error,
                'get' => $arr,
                'action' => $params['value'],
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    public function editAction($params=[]) {
        $check = Validation :: categorieValidation($_POST);
        if(isset($_POST['updateCategorieItem'])) {
            if ($check[0]) {
                $this->image();
                if (isset($_POST['categorie']['image']) && $_POST['categorie']['image'] == "") {
                    unset($_POST['categorie']['image']);
                }
                CategoryAdd ::updateCategories($params);
                header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/categories");
            } else {
                $this->displayAddCategories($check[1],$params);
            }
        }

        if ($check[0]) {
            if (isset($params['value'])) {
                $this->displayAddCategories($check[1],$params);
            }
        }
    }
    public function deleteAction($params=[]) {
        if (isset($params['value'])) {
            CategoryAdd ::deleteCategories($params);
            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/categories");
        }
    }
}

?>