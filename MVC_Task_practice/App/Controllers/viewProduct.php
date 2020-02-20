<?php

namespace App\Controllers;

use App\Models\CategoryAdd;
use App\Models\ProductAdd;
use Core\View;

class Product extends \Core\Controller{

    public function viewAction($params = []) {
        $parentCategories = CategoryAdd :: getOnlyParentCategories();
        $subCategories = CategoryAdd :: getSubCategories();
        $getProducts = ProductAdd ::  findProductDetailFromUrl($params['url']);

        
        View ::renderTemplate('view.html', [
            'parentCategories' => $parentCategories,
            'subCategories' => $subCategories,
            'name' => 'Rajnik',
            'product' => $getProducts,
            'colours' => ['red','green', 'blue'] ,
            'base_url' => dirname($_SERVER['SCRIPT_NAME'])
        ]);
        // View ::renderTemplate('view.html', []);
    }
}


?>