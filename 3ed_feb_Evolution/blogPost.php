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
    if (!isset($_SESSION['session'])) {
        header("Location:Login.php");
        die("Plese goto Login Page");
    }
    include_once "insertDataBase.php";
    include_once "manageEditing.php";
    $selcetPostQuery = "SELECT `postId`, `categoryName`, `title`, `publishedDate` FROM `userblogpost` WHERE userId = ".$_SESSION['userId'];
    $deletePostQuery = "DELETE FROM `userblogpost` WHERE postId =";
    $result = mysqli_query($conn, $selcetPostQuery);

    if (isset($_GET["blogedit"]) || isset($_GET["blogdelete"])) {
        if (isset($_GET["blogdelete"])) {
            IntregrationData($_GET["blogdelete"],$deletePostQuery);
        } else {
            IntregrationData($_GET["blogedit"],"");
        }
    }
    ?>
    <h1>BLOG POSTS</h1>
    <a href="addNewBlogPost.php">addBlogPost</a>
    <a href="blogCategory.php">manageCatagory</a>
    <a href="Registration.php">myProfile</a>
    <a href="logout.php">Logout</a>
    <br>
    <form method="POST" action="blogPost.php">
    <?php
        $imageLocation = "images\ ";
        $imageLocation = substr($imageLocation, 0, -1);
        echo "<table style='border: 1px solid black'>";
        if ($row = mysqli_num_rows($result) > 0) {
            foreach ($result as $column => $currentRow) {
                foreach ($currentRow as $field => $VALUE) {
                    if ($column == 0) {
                        echo  "<th style='border: 1px solid black'>".$field."</th>";
                    }
                    if ($column == 0 && $field == "publishedDate") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach ($currentRow as $field => $VALUE) {
                    if ($field == "image") {
                        echo  "<td style='border: 1px solid black'><image style='height:50px; width:50px;' src='".$imageLocation.$VALUE."'></td>";
                    } else {
                        echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                    }
                }
                echo "<td style='border: 1px solid black'><a href='blogPost.php?blogedit=".$currentRow['postId']."'>Edit</a> <a href='blogPost.php?blogdelete=".$currentRow['postId']."'>Delete</a></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
</body>
</html>