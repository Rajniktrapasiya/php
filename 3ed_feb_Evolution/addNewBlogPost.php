<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Blog Post</title>
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
    if(isset($_POST["submit"])) {
        $filename = $_FILES['image']['name'];
        $tempName = $_FILES['image']['tmp_name'];
        if(isset($filename)) {
            $location = "images/";
            if(move_uploaded_file($tempName,$location.$filename)) {
                echo "Uploaded";
            }
        }
        $_POST['image'] = $filename;
        if(isset($_POST['categoryName'])) {
            $_POST['categoryName'] = implode("_",$_POST['categoryName']);
        }
        if(isset($_SESSION['updatePost'])) {
            updateBlogIntoDb($_POST);
        } else {
            insertBlogIntoDb($_POST);
        }
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    }
    $arr = [];
    mysqli_select_db($conn,"test");
    $result = mysqli_query($conn,"SELECT categoryName FROM `categorytable`");
    while($row = mysqli_fetch_assoc($result)) {
        array_push($arr,$row['categoryName']);
    }

?>
    <h1>Add New Blog Post</h1>
    <form method="POST" action="addNewBlogPost.php" enctype="multipart/form-data">
        <div class="AddNewBlog">
            <div class="title">
                <label>Title</label>
                <input type="text" name="title" value="<?php echo getValue("title"); ?>">
            </div>
            <div class="content">
                <label>content</label>
                <input type="text" style="height:40px; width:200px;" name="content" value="<?php echo getValue("content"); ?>">
            </div>
            <div class="URL">
                <label>URL</label>
                <input type="text" name="url" value="<?php echo getValue("url"); ?>">
            </div>
            <div class="publisedAt">
                <label>publised At</label>
                <input type="date" name="publishedDate" value="<?php echo getValue("publishedDate"); ?>">
            </div>
            <div class="catagory">
                <label>catagory</label>
                <select name="categoryName[]" multiple>
                    <?php foreach($arr as $key => $value) :?>
                        <?php $array = !empty(array_intersect(getValue("categoryName",[]),[$value])) ? "SELECTED" : "";?>
                        <option value="<?php echo $value;?>" <?php echo $array;?>><?php echo $value;?></option>
                    <?php endforeach?>
                </select>
            </div>
            <div class="uploadImage">
                <label>Image</label>
                <input type="file" name="image">
            </div>
        </div>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>
</html>