<?php

namespace App\Controllers\Admin;
use App\Models\PagesAdd;
use Core\View;

class Cms extends \Core\Controller {
    public function pagesAction () {
        $result = PagesAdd :: getCmsPages();
        $action = 'pages';
        $title = [];
        foreach ($result as $key => $value) {
            foreach ($value as $keys => $val) {
                array_push($title,$keys);
            }
            break;
        }
        if (isset($_POST['AddCmsItem'])) {
            header("Location:pages/add");
        } else {
            View ::renderTemplate("Admin/Cms/Pages.html",[
                'submit' => 'AddCmsItem',
                'title' => $title,
                'result' => $result,
                'posts' => 'add',
                'action' => $action,
                'base_url' => dirname($_SERVER['SCRIPT_NAME'])
            ]);
        }
    }
}

?>