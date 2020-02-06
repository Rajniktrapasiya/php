<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Category</title>
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
        mysqli_select_db($conn , 'test');
        $selcetQuery = "SELECT `categoryId`, `categoryImage`, `categoryName`,`createdDate` FROM `categorytable`";
        $deleteQuery = "DELETE FROM `categorytable` WHERE categoryId =";
        $result = mysqli_query($conn, $selcetQuery);
        if (isset($_GET["categoryedit"]) || isset($_GET["categorydelete"])) {
            if (isset($_GET["categorydelete"])) {
                IntregrationData($_GET["categorydelete"],$deleteQuery);
            } else {
                IntregrationData($_GET["categoryedit"],"");
            }
        }
    ?>
<h1>BLOG Category</h1>
    <a href="addNewCatagory.php">addCatagory</a>
    <a href="blogPost.php">BlogPost</a>
    <a href="addNewBlogPost.php">addBlogPost</a>
    <a href="blogCategory.php">manageCatagory</a>
    <a href="Registration.php">myProfile</a>
    <a href="logout.php">Logout</a>
    <br>
    <br>
<?php
    
    ?>
    <form method="POST" action="blogCategory.php">
    <?php
        echo "<table style='border: 1px solid black'>";
        // print_r($result);
        $imageLocation = "images\ ";
        $imageLocation = substr($imageLocation, 0, -1);
        if ($row = mysqli_num_rows($result) > 0) {
            // output data of each row
            foreach ($result as $column => $currentRow) {
                echo "<tr>";
                foreach ($currentRow as $field => $VALUE) {
                    if ($column == 0) {
                        echo  "<th style='border: 1px solid black'>".$field."</th>";
                    }
                    if ($column == 0 && $field == "createdDate") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach ($currentRow as $field => $VALUE) {
                    if ($field == "categoryImage") {
                        echo  "<td style='border: 1px solid black'><image style='height:50px; width:50px;' src='".$imageLocation.$VALUE."'></td>";
                    } else {
                        echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                    }
                }
                echo "<td style='border: 1px solid black'><a href='blogCategory.php?categoryedit=".$currentRow['categoryId']."'>Edit</a> <a href='blogCategory.php?categorydelete=".$currentRow['categoryId']."'>Delete</a></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
</body>
</html>