<?php

namespace App\Controllers\Admin\Cms;

use Core\View;
use App\Models\PagesAdd;

class Pages extends \Core\Controller {
    public function addAction() {

        if (isset($_POST['AddCmsItem'])) {
            // echo "<pre>";
            // print_r($_POST);
            // echo "</pre>";
            PagesAdd :: insertIntoCms($_POST['cms']);
            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/cms/pages");
        }


        $action = 'add';
        
        View ::renderTemplate("Admin/Cms/Pages/add.html",[
            'submit' => 'AddCmsItem',
            'posts' => 'add',
            'action' => $action,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    
    }

    public function editAction($param=[]) {
        if (isset($_POST['UpdateCmsItem'])) {
            PagesAdd :: updateCms($param);
            header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/cms/pages");
        }
        $get = PagesAdd :: getCmsForEdit($param);
        $action = '';
        
        View ::renderTemplate("Admin/Cms/Pages/add.html",[
            'submit' => 'UpdateCmsItem',
            'posts' => 'add',
            'get' => $get,
            'action' => $action,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }

    public function deleteAction($param=[]) {
        PagesAdd :: deleteCms($param);
        header("Location:http://localhost/cybercom/php/MVC_Task_practice/admin/cms/pages");
    }
}

?>