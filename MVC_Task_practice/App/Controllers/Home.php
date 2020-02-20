<?php

namespace App\Controllers;

use App\Models\CategoryAdd;
use Core\View;

class Home extends \Core\Controller {

    public function HomeAction() {
        
        $parentCategories = CategoryAdd :: getOnlyParentCategories();
        $subCategories = CategoryAdd :: getSubCategories();
        // echo "<pre>";
        // print_r($subCategories);
        // echo "</pre>";
        View ::renderTemplate('Home/index.html', [
            'parentCategories' => $parentCategories,
            'subCategories' => $subCategories,
            'name' => 'Rajnik',
            'colours' => ['red','green', 'blue'] ,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
        // echo "<h1>HOME</h1>";

    }
}

?>