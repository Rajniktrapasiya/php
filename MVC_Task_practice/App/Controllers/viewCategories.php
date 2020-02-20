<?php

namespace App\Controllers;

use App\Models\CategoryAdd;
use Core\View;

class Category extends \Core\Controller{

    public function viewAction($params = []) {
        $parentCategories = CategoryAdd :: getOnlyParentCategories();
        $subCategories = CategoryAdd :: getSubCategories();
        $getProducts = CategoryAdd :: findCategorieIdFromUrl($params['url']);
        // echo $params['url'];
        View ::renderTemplate('view.html', [
            'parentCategories' => $parentCategories,
            'subCategories' => $subCategories,
            'products' => $getProducts,
            'name' => 'Rajnik',
            'colours' => ['red','green', 'blue'] ,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
    }
}

?>