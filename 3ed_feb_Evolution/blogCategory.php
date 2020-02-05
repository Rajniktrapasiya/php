<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Category</title>
    <script>
        function chngevalue(i) {
            document.getElementsByName("delete").values = i;
        }
    </script>
</head>
<body>
    <?php
        session_start();
        if(!isset($_SESSION['session'])) {
            die("Plese goto Login Page");
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
    include_once "insertDataBase.php";
    include_once "manageEditing.php";
    $conn = openCon();
    //session_start();
    mysqli_select_db($conn , 'test');
    $selcetQuery = "SELECT `categoryId`, `categoryImage`, `categoryName`,`createdDate` FROM `categorytable`";
    $deleteQuery = "DELETE FROM `categorytable` WHERE categoryId =";
    $result = mysqli_query($conn, $selcetQuery);

    if(isset($_POST["submit"]) || isset($_POST["delete"])) {
        //echo "----------".$_REQUEST["submit"];
        if(isset($_POST["delete"])) {
            IntregrationData($_REQUEST["delete"]);
            //echo "----------".$_REQUEST["delete"];
        } else {
            IntregrationData($_REQUEST["submit"]);
        }
    }


    function IntregrationData($num){
        global $result,$conn,$deleteQuery;
        $_SESSION["dataBase"] = "Yes";
        //echo "call";
        if(isset($_POST["delete"])) {
            $deleteQuery .= $num;
            //echo $deleteQuery;
            if(mysqli_query($conn,$deleteQuery)) {
                echo "Data inserted<br>";
                
            } else {
                echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
            }
            header("Location:blogCategory.php");
        }
        if(isset($_POST["submit"])) {
            //$_SESSION['userId'] = $currentRow['userId'];
            foreach($result as $column => $currentRow) {
                if($currentRow['categoryId'] == $num) {

                    editCatagory($currentRow);
                }
            }
        }
    }

    ?>
    <form method="POST" action="blogCategory.php">
    <?php
        echo "<table style='border: 1px solid black'>";
        // print_r($result);
        $imageLocation = "images\ ";
        $imageLocation = substr($imageLocation, 0, -1);
        if ($row = mysqli_num_rows($result) > 0) {
            // output data of each row
            foreach($result as $column => $currentRow) {
                echo "<tr>";
                foreach($currentRow as $field => $VALUE) {
                    if($column == 0) {
                        echo  "<th style='border: 1px solid black'>".$field."</th>";
                    }
                    if($column == 0 && $field == "createdDate") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach($currentRow as $field => $VALUE) {
                    if($field == "categoryImage") {
                        echo  "<td style='border: 1px solid black'><image style='height:50px; width:50px;' src='".$imageLocation.$VALUE."'></td>";
                    } else {
                        echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                    }
                }
                echo "<td style='border: 1px solid black'><input type='submit' name='submit' value='".$currentRow['categoryId']."' onclick ='this.".$currentRow['categoryId']."'><input type='submit' name='delete' value='".$currentRow['categoryId']."' onclick ='chngevalue(".$currentRow['categoryId'].")'></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
</body>
</html>