<?php

namespace App\Controllers\Admin;

use Core\View;

use App\Models\ProductAdd;
use App\Controllers\Admin\Validation;

class Products extends \Core\Controller {
    public function addAction($params=[]) {
        $bol = true;
        if(isset($_POST['AddProductItem'])) {
            
            $check = Validation :: productValidation($_POST);
            if ($check[0]) {
            $this ->image();
            $productCategorie = $_POST['product']['category'];
            unset($_POST['product']['category']);
            ProductAdd :: insertIntoProduct($$_POST['product'],$productCategorie);

            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/products");
            } else {
                $this->displayaddProduct($check[1]);
                $bol = false;   
            }
        }

        if ($bol) {
        $productCategories = ProductAdd :: getCategorieForProduct();
        // print_r($productCategories);
        isset($_POST['AddProducts']) ? $action = 'products/add' : $action = 'add' ; 
        View :: renderTemplate("Admin/products/add.html",[
            'submit' => 'AddProductItem',
            'categories' => $productCategories,
            'posts' => 'add',
            'action' => $action,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
        }
    }

    public function image() {
        $filename = $_FILES['image']['name'];
            $_POST['product']['image'] = $filename;
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

    public function displayaddProduct($error=[],$params=[]) {
        // print_r($error);
        if (!empty($params)) {
            $editProduct = ProductAdd ::editGetProduct($params);
            // print_r($editProduct);
            $arr = [];
            $keys = [];
            foreach ($editProduct as $key => $value) {
                foreach ($value as $keys => $values) {
                    $arr[$keys] = $values;
                }
            }
        }
        $productCategories = ProductAdd :: getCategorieForProduct();
        // print_r($productCategories);
        // print_r($arr);
        if (empty($arr) && empty($params)) {
            View :: renderTemplate("Admin/products/add.html",[
                'submit' => 'updateItem',
                'posts' => "add",
                'categories' => $productCategories,
                'error' => $error,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        } else {
            View :: renderTemplate("Admin/products/add.html",[
                'submit' => 'updateItem',
                'posts' => "add",
                'categories' => $productCategories,
                'error' => $error,
                'get' => $arr,
                'action' => $params['value'],
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    public function editAction($params=[]) { 
        $check = Validation :: productValidation($_POST);
        if(isset($_POST['updateItem'])) {
            if ($check[0]) {
                $this ->image();
                $productCategorie = $_POST['product']['category'];
                unset($_POST['product']['category']);
                if (isset($_POST['product']['image']) && $_POST['product']['image'] == "") {
                    unset($_POST['product']['image']);
                }
                ProductAdd :: updateProducts($params,$productCategorie);
                header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/products");
            } else {
                $this->displayaddProduct($check[1],$params);
            }
        }
        if ($check[0]) {
            if (isset($params['value'])) {
                $this->displayaddProduct($check[1],$params);
            }
        }
    }

    public function deleteAction($params=[]) {
        if (isset($params['value'])) {
            
            ProductAdd ::deleteProducts($params);

            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/products");

        }
    }
}

?>