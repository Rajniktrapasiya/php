<?php
include_once "databaseConnection.php";
$conn = openCon();
$insertQuery = "INSERT INTO `userinfo`(`prefix`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `information`) VALUES (";
$insertCategoryQuery = "INSERT INTO `categorytable`(`categoryName`, `categoryContent`, `categoryUrl`, `categoryMetaTitle`, `parentCategory`, `categoryImage`) VALUES (";
$insertBlogQuery = "INSERT INTO `userblogpost`(`title`, `content`, `url`, `publishedDate`,`categoryName`, `image`, `userId`) VALUES (";
$updateBlogQuery = "UPDATE `userblogpost` SET ";
$updateCategoryQuery = "UPDATE `categorytable` SET ";
function insertBlogIntoDb($arr){
    global $insertBlogQuery;
    foreach($arr as $key => $value) {
        if($key == "submit") {

        } else {
            $insertBlogQuery .= "'".$value."',";
        }
    }
    $insertBlogQuery .= "'".$_SESSION['userId']."')";
    //echo "<br>".$insertBlogQuery;
    exicuteQuery($insertBlogQuery);
    header("Location:blogPost.php");
}

function updateBlogIntoDb($arr) {
    global $updateBlogQuery;
    $impValue = ["categoryName","title","publishedDate","userId","url","image","content"];
    foreach($arr as $key => $value) {
        foreach($impValue as $key1) {
            if($key == $key1) {
                $updateBlogQuery .= $key."='".$value."',";
            }
        }
    }
    $updateBlogQuery = substr($updateBlogQuery, 0, -1);
    $updateBlogQuery .= " WHERE postId =".$_SESSION['updatePostId'];
    //echo $updateBlogQuery;
    exicuteQuery($updateBlogQuery);
    unset($_SESSION['updatePostId']);
    header("Location:blogPost.php");
}

function updateCategoryIntoDb($arr) {
    global $updateCategoryQuery;
    $impValue = ["categoryName","categoryContent","categoryUrl","categoryMetaTitle","parentCategory","categoryImage"];
    foreach($arr as $key => $value) {
        foreach($impValue as $key1) {
            if($key == $key1) {
                $updateCategoryQuery .= $key."='".$value."',";
            }
        }
    }
    $updateCategoryQuery = substr($updateCategoryQuery, 0, -1);
    $updateCategoryQuery .= " WHERE categoryId =".$_SESSION['categoryId'];
    echo $updateCategoryQuery;
    exicuteQuery($updateCategoryQuery);
    unset($_SESSION['updateCategory']);
    header("Location:blogCategory.php");

}

function insertCategoryIntoDb($arr){
    global $insertCategoryQuery;
    //print_r($arr);
    foreach($arr as $key => $value) {
        if($key == "submit") {

        } 
        else {
        $insertCategoryQuery .= "'".$value."',";
        }
    }
    $insertCategoryQuery = substr($insertCategoryQuery, 0, -1);
    $insertCategoryQuery .= ")";
    //echo "<br>".$insertCategoryQuery;
    exicuteQuery($insertCategoryQuery);
    header("Location:blogCategory.php");
}

function insertIntoDb($arr) {
    global $insertQuery,$conn;
    // echo "<pre>";
    // print_r($arr);

    foreach($arr as $key => $value) {
        if($key == "termCondition" || $key == "confirmPassword") {

        } else {
            $insertQuery .= "'".$value."',";
        }
    }
    $insertQuery = substr($insertQuery, 0, -1);
    $insertQuery .= ")";
    // echo $key;
    // $insertQuery .= $key.") VALUES ('".$value."')";
    exicuteQuery($insertQuery);
    $_SESSION['userId'] = mysqli_insert_id($conn);
    $_SESSION['session'] = "yes"; 
    //echo $insertQuery;
    // $insertQuery = "INSERT INTO `userinfo`(";
    header("Location:blogPost.php");
}


function exicuteQuery($insertQuery){
    global $conn;
    mysqli_select_db($conn , 'test');
    if(mysqli_query($conn,$insertQuery)) {
        echo "Data inserted<br>";
        
    } else {
        echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
    }  
}
?>