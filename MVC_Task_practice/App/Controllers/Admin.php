<?php

namespace App\Controllers;

use App\Controllers\Admin\Products;
use App\Models\AdminModel;

use Core\View;

class Admin extends \Core\Controller {

    public function loginAction() {

        if (isset($_POST['Submit'])) {
                if ($_POST['LoginId'] == "trapasiyarajnik82@gmail.com") {
                    if ($_POST['Password'] == "Tra@2399") {
                        $this->dashboardAction();
                    } else {
                        header("Location:login");
                    }
                } else {
                    header("Location:login");
                }
        } else {
            View :: renderTemplate("Admin/login.html",[
                'posts' => 'login',
                'action' => "login",
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    public function dashboardAction() {
        View :: renderTemplate("Admin/dashboard.html",[
            'posts' => 'dashboad',
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }

    public function productsAction() {
        $posts = AdminModel::getProducts();
        $title = [];
        $result = [];
        foreach ($posts as $key => $value) {
            foreach ($value as $keys => $val) {
                // echo $key."<br>";
                if (is_string($keys)) {
                    // echo $val."<br>";
                    $results[$keys] = $val;
                    if ($key == 0) {
                        array_push($title,$keys);
                    }
                }
            }
            array_push($result,$results);
        }

        if (isset($_POST['AddProducts'])) {
            Products :: addAction();
        } else {
            View :: renderTemplate("Admin/products.html",[
                'title' => $title,
                'result' => $result,
                'posts' => 'products',
                'action' => 'products',
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

    public function categoriesAction() {
        if (isset($_POST['AddCategories'])) {
            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/categories/add");
        } else {
            $posts = AdminModel::getCategories();
            $title = [];
            $result = [];
            foreach ($posts as $key => $value) {
                foreach ($value as $keys => $val) {
                    // echo $key."<br>";
                    if (is_string($keys)) {
                        // echo $val."<br>";
                        $results[$keys] = $val;
                        if ($key == 0) {
                            array_push($title,$keys);
                        }
                    }
                }
                array_push($result,$results);
            }
            // echo "<pre>";
            // print_r($posts);
            // echo "</pre>";
            View :: renderTemplate("Admin/categories.html",[
                'result' => $result,
                'title' => $title,
                'submit' => 'AddCategories',
                'posts' => 'categories',
                'action' => "categories",
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }

}

?>