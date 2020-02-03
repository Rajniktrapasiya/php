<?php
include_once "databaseConnection.php";
$conn = openCon();
$insertQuery = "INSERT INTO `userinfo`(`prefix`, `firstName`, `lastName`, `email`, `phoneNumber`, `password`, `information`) VALUES (";
$insertCategoryQuery = "INSERT INTO `usercategory`( `categoryName`,`content`,`url`,`meta Title`,`categoryImage`, `userId`) VALUES (";
$insertBlogQuery = "INSERT INTO `userblogpost`(`title`, `content`, `url`, `publishedDate`,`categoryName`, `image`, `userId`) VALUES (";


function insertBlogIntoDb($arr){
    global $insertBlogQuery;
    foreach($arr as $key => $value) {
        $insertBlogQuery .= "'".$value."',";
    }
    $insertBlogQuery .= "'".$_SESSION['userId']."')";
    // echo "<br>".$insertBlogQuery;
    exicuteQuery($insertBlogQuery);

}

function insertCategoryIntoDb($arr){
    global $insertCategoryQuery;
    foreach($arr as $key => $value) {
        if($key == "submit") {

        } 
        else {
        $insertCategoryQuery .= "'".$value."',";
        }
    }
    $insertCategoryQuery .= ",'".$_SESSION['userId']."')";
    echo "<br>".$insertCategoryQuery;
    exicuteQuery($insertCategoryQuery);
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