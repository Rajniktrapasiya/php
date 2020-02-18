<?php

namespace App\Controllers\Admin;

class Validation {
    public function productValidation($post) {
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        $bol = true;
        $error = [];
        foreach ($post as $key =>$value) {
            if ($key == "product") {
                foreach ($value as $keys => $values) {
                    // echo $keys." ".$values."<br>";
                    if ($values == "") {
                        $error[$keys] = "REQUIRE NOT Emptry";
                        $bol = false;
                    }
                }
            }
        }
        // echo "<br>bollean ---".$bol;
        return [$bol,$error];
    }

    public function categorieValidation($post) {
        // echo "<pre>";
        // print_r($post);
        // echo "</pre>";
        $bol = true;
        $error = [];
        foreach ($post as $key =>$value) {
            if ($key == "categorie") {
                foreach ($value as $keys => $values) {
                    // echo $keys." ".$values."<br>";
                    if ($values == "") {
                        $error[$keys] = "REQUIRE NOT Emptry";
                        $bol = false;
                    }
                }
            }
        }
        // print_r($error);
        // echo "<br>bollean ---".$bol;
        return [$bol,$error];
    }
}

?>