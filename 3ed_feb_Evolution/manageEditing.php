<?php

function setProfileItem($arr) {
    foreach($arr as $key => $value) {
        setValue($arr,$key);
    }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}

function editblog($arr) {
    if(isset($arr['categoryName'])) {
        $arr['categoryName'] = explode("_",$arr['categoryName']);
    }
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    foreach($arr as $key => $value) {
        
        setValue($arr,$key);
      
    }
    $_SESSION['updatePost'] = "Yes";
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    header("Location:addNewBlogPost.php");
}

function editCatagory($arr) {
    // echo "<pre>";
    // print_r($arr);
    // echo "</pre>";
    foreach($arr as $key => $value) {
        setValue($arr,$key);
    }
    $_SESSION['updateCategory'] = "Yes";
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    header("Location:addNewCatagory.php");
}


function setSession($arr) {
    foreach($arr as $key => $value) {
        foreach ($value as $valuekey => $subvalue) {
            $_SESSION[$key][$valuekey] = $arr[$key][$valuekey];
        }
    }
    echo "----------------------";
    print_r($_SESSION);
    header("Location:practice.php");
}

function getValue($key,$returntype="") {
    if(isset($_POST[$key])) {
        if(is_array($_POST[$key])) {
            $temp = [];
            foreach($_POST[$key] as $value1) {
                array_push($temp,$value1);
            }
            $_POST[$key] = $temp;
        } 
        return $_POST[$key];
    } else {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : $returntype;
    }    
}
function setValue($arr ,$key) {
    $_SESSION[$key] = isset($arr[$key]) ? $arr[$key] : "" ;
}
?>