<?php

namespace App\Controllers;

use App\Models\PagesAdd;
use Core\View;

class AboutUs extends \Core\Controller{

    public function homeAction () {

        $getCmsPages = PagesAdd :: getCmsPages();

        View :: renderTemplate("aboutUs.html", [
            'cms' => $getCmsPages
        ]);
    }
}


?>