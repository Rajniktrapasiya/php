<?php
include_once "databaseConnection.php";
$conn = openCon();
mysqli_select_db($conn ,"test");
$insertQuery = "INSERT INTO `userinfo`(`prefix`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `information`) VALUES (";
$insertCategoryQuery = "INSERT INTO `categorytable`(`categoryName`, `categoryContent`, `categoryUrl`, `categoryMetaTitle`, `parentCategory`, `categoryImage`) VALUES (";
$insertBlogQuery = "INSERT INTO `userblogpost`(`title`, `content`, `url`, `publishedDate`,`categoryName`, `image`, `userId`) VALUES (";


function insertBlogIntoDb($arr){
    global $insertBlogQuery,$conn;
    $q = "INSERT INTO `post_category`(`PostId`, `CategoryId`) VALUES (";
    foreach ($arr as $key => $value) {
        if ($key != "submit") {
            $insertBlogQuery .= "'".$value."',";
            if ($key == "categoryName") {
                $a = explode("_",$value);
            }
        }
        
    }
    // print_r($_SESSION);
    $insertBlogQuery .= "'".$_SESSION['userId']."')";
    echo $insertBlogQuery;
    exicuteQuery($insertBlogQuery);
    $lastId = mysqli_insert_id($conn);//------------------------------------------------/
    foreach($a as $key) {
        $q .= "'".$lastId."','".$key."')";
        echo $q;
        mysqli_query($conn,$q);
        $q = "INSERT INTO `post_category`(`PostId`, `CategoryId`) VALUES (";
        echo "ok";
    }
    header("Location:blogPost.php");
}

function insertCategoryIntoDb($arr){
    global $insertCategoryQuery;
    foreach ($arr as $key => $value) {
        if ($key != "submit") {
            $insertCategoryQuery .= "'".$value."',";
        }
    }
    $insertCategoryQuery = substr($insertCategoryQuery, 0, -1);
    $insertCategoryQuery .= ")";
    exicuteQuery($insertCategoryQuery);
    header("Location:blogCategory.php");
}

function insertIntoDb($arr) {
    global $insertQuery,$conn;
    print_r($arr);
    foreach ($arr as $key => $value) {
        if ($key == "termCondition" || $key == "confirmPassword") {
        } else {
            $insertQuery .= "'".$value."',";
        }
    }
    $insertQuery = substr($insertQuery, 0, -1);
    $insertQuery .= ")";
    echo $insertQuery;
    exicuteQuery($insertQuery);
    $_SESSION['userId'] = mysqli_insert_id($conn);
    $_SESSION['session'] = "yes"; 
    echo $_SESSION['userId'];
    header("Location:blogPost.php");
}

function updateIntoDb($arr ,$updateQuery) {
    global $conn;
    $deletePostCategory = "DELETE FROM `post_category` WHERE PostId = ".$_SESSION['updatePostId'];
    exicuteQuery($deletePostCategory);
    $impValue = isset($_SESSION['updatePost']) ? ["categoryName","title","publishedDate","userId","url","image","content"] :
    ["categoryName","categoryContent","categoryUrl","categoryMetaTitle","parentCategory","categoryImage"];
    $q = "INSERT INTO `post_category`(`PostId`, `CategoryId`) VALUES (";
    foreach ($arr as $key => $value) {
        foreach ($impValue as $key1) {
            if ($key == $key1) {
                $updateQuery .= $key."='".$value."',";
                if ($key == "categoryName" && isset($_SESSION['updatePost'])) {
                    $a = explode("_",$value);
                }
            }
        }
    }
    $updateQuery = substr($updateQuery, 0, -1);
    $updateQuery .= isset($_SESSION['updatePost']) ? " WHERE postId =".$_SESSION['updatePostId'] :" WHERE categoryId =".$_SESSION['categoryId'];
    echo $updateQuery;
    exicuteQuery($updateQuery);
    foreach($a as $key) {
        $q .= "'".$_SESSION['updatePostId']."','".$key."')";
        echo $q;
        exicuteQuery($q);
        $q = "INSERT INTO `post_category`(`PostId`, `CategoryId`) VALUES (";
        echo "ok";
    }
    if (isset($_SESSION['updatePost'])) {
        unset($_SESSION['updatePostId']);
        unset($_SESSION['updatePost']);
        header("Location:blogPost.php");
    } else {
        unset($_SESSION['updateCategory']);
        header("Location:blogCategory.php");
    }
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