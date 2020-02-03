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
    if(empty($_SESSION['session'])) {
        die("Plese goto Login Page");
    }
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
    $conn = openCon();
    session_start();
    mysqli_select_db($conn , 'test');
    $selcetQuery = "SELECT * FROM `userblogpost`";
    $deleteQuery = "DELETE FROM `userblogpost` WHERE userId =";
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
        foreach($result as $column => $currentRow) {
            if($column == $num) {
                if(isset($_POST["submit"])) {
                    $_SESSION['userId'] = $currentRow['userId'];
                    DataIntigration($currentRow);
                } else {
                    $deleteQuery .= $currentRow['userId'];
                    echo $deleteQuery;
                    if(mysqli_query($conn,$deleteQuery)) {
                        echo "Data inserted<br>";
                        
                    } else {
                        echo "Error Connecting Database  :-".mysqli_error($conn)."<br>";
                    }
                    header("Location:blogPost.php");
                }
            }
        }
    }

    ?>
    <form method="POST" action="blogPost.php">
    <?php
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
                    if($column == 0 && $field == "userId") {
                        echo "<th>PERFORM OPERATION</th></tr><tr>";
                    }
                }
                foreach($currentRow as $field => $VALUE) {
                    echo  "<td style='border: 1px solid black'>".$VALUE."</td>";
                }
                echo "<td style='border: 1px solid black'><input type='submit' name='submit' value='Edit' onclick ='this.".$column."'><input type='submit' name='delete' value='delete' onclick ='this.".$column."'></td></tr>";
            }
        } else {
            echo "0 results";
        }
        echo "</table>";
        
    ?>
</form>
</body>
</html>