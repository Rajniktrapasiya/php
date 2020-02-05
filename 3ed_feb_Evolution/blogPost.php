<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Posts</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['session'])) {
        die("Plese goto Login Page");
        
    }
    
    // print_r($_SESSION);
    // //echo $_SESSION['session'];
    ?>
    <h1>BLOG POSTS</h1>
    <a href="addNewBlogPost.php">addBlogPost</a>
    <a href="blogCategory.php">manageCatagory</a>
    <a href="Registration.php">myProfile</a>
    <a href="logout.php">Logout</a>
    <br>
    <br>
    <?php
    include_once "insertDataBase.php";
    include_once "manageEditing.php";
    $conn = openCon();
    //session_start();
    mysqli_select_db($conn , 'test');
    $selcetQuery = "SELECT `postId`, `categoryName`, `title`, `publishedDate` FROM `userblogpost` WHERE userId = ".$_SESSION['userId'];
    $deleteQuery = "DELETE FROM `userblogpost` WHERE postId =";
    $result = mysqli_query($conn, $selcetQuery);

    if(isset($_GET["edit"]) || isset($_GET["delete"])) {
        //echo "----------".$_REQUEST["submit"];
        if(isset($_GET["delete"])) {
            IntregrationData($_GET["delete"]);
            //echo "----------".$_REQUEST["delete"];
        } else {
            IntregrationData($_GET["edit"]);
        }
    }


    function IntregrationData($num){
        global $result,$conn,$deleteQuery;
        $_SESSION["dataBase"] = "Yes";
        
        if(isset($_GET["delete"])) {
            $deleteQuery .= $num;
            echo $deleteQuery;
            if(mysqli_query($conn,$deleteQuery)) {
                echo "Data inserted<br>";
                
            } else {
                echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
            }
            header("Location:blogPost.php");
        }
        if(isset($_GET["edit"])) {
            $result =mysqli_query($conn, "SELECT * FROM `userblogpost`");;
            foreach($result as $column => $currentRow) {
                //print_r($currentRow);
                if($currentRow['postId'] == $num) {
                    $_SESSION['updatePostId'] = $currentRow['postId'];
                    editblog($currentRow);
                }
            }
        }
    }

    ?>
    <form method="POST" action="blogPost.php">
    <?php
        $imageLocation = "images\ ";
        $imageLocation = substr($imageLocation, 0, -1);
        echo "<table style='border: 1px solid black'>";
        // print_r($result);
        if ($row = mysqli_num_rows($result) > 0) {
            // output data of each row
            foreach($result as $column => $currentRow) {
                echo "<tr>";
                foreach($currentRow as $field => $VALUE) {
                    if($column == 0) {
                        echo  "<th style='border: 1px solid black'>".$field."</th>";
                    }
                    if($column == 0 && $field == "publishedDate") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach($currentRow as $field => $VALUE) {
                    if($field == "image") {
                        echo  "<td style='border: 1px solid black'><image style='height:50px; width:50px;' src='".$imageLocation.$VALUE."'></td>";
                    } else {
                        echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                    }
                }
                echo "<td style='border: 1px solid black'><a href='blogPost.php?edit=".$currentRow['postId']."'>Edit</a> <a href='blogPost.php?delete=".$currentRow['postId']."'>Delete</a></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
</body>
</html>