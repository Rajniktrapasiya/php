<?php

if (!isset($_SESSION['session'])) {
    header("Location:Login.php");
    die("Plese goto Login Page");
}

function setProfileItem($arr) {
    foreach ($arr as $key => $value) {
        setValue($arr,$key);
    }
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
}

function IntregrationData($num,$deleteQuery){
    global $conn;
    $_SESSION["dataBase"] = "Yes";
    if (isset($_GET["blogdelete"]) || isset($_GET["categorydelete"])) {
        $deleteQuery .= $num;
        exicuteQuery($deleteQuery);
        isset($_GET["blogdelete"]) ? header("Location:blogPost.php") : header("Location:blogCategory.php");
    }
    if (isset($_GET["blogedit"]) || $_GET["categoryedit"]) {
        $result = isset($_GET["blogedit"]) ? mysqli_query($conn, "SELECT * FROM `userblogpost`") : mysqli_query($conn, "SELECT * FROM `categorytable`");;
        
        foreach ($result as $column => $currentRow) {
            $check = isset($_GET["blogedit"]) ? $currentRow['postId'] : $currentRow['categoryId'];
            if ($check == $num) {
                if (isset($_GET["blogedit"])) {
                    $_SESSION['updatePostId'] = $currentRow['postId'];
                } 
                editItem($currentRow);
            }
        }
    }
}


function editItem($arr) {
    if (isset($arr['categoryName'])) {
        $arr['categoryName'] = explode("_",$arr['categoryName']);
    }
    foreach ($arr as $key => $value) {
        setValue($arr,$key);
    }
    if (isset($arr['categoryName'])) {
        $_SESSION['updatePost'] = "Yes";
        header("Location:addNewBlogPost.php");
    } else {
        $_SESSION['updateCategory'] = "Yes";
        header("Location:addNewCatagory.php");
    }
}


function setSession($arr) {
    foreach ($arr as $key => $value) {
        foreach ($value as $valuekey => $subvalue) {
            $_SESSION[$key][$valuekey] = $arr[$key][$valuekey];
        }
    }
    header("Location:practice.php");
}

function getValue($key,$returntype="") {
    if (isset($_POST[$key])) {
        if (is_array($_POST[$key])) {
            $temp = [];
            foreach ($_POST[$key] as $value1) {
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