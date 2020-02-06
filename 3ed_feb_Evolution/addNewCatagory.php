<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AddNewCategory</title>
</head>
<body>
<?php
    session_start();
    include_once "insertDataBase.php";
    include_once "manageEditing.php";
    if (!isset($_SESSION['session'])) {
        header("Location:Login.php");
        die("Plese goto Login Page");
    }
    if (isset($_POST['submit'])){
        $filename = $_FILES['categoryImage']['name'];
        $tempName = $_FILES['categoryImage']['tmp_name'];
        if (isset($filename)) {
            $location = "images/";
            if (move_uploaded_file($tempName,$location.$filename)) {
                echo "Uploaded";
            }
        }
        $_POST['categoryImage'] = $filename;
        mysqli_select_db($conn,"test");
        $category = mysqli_query($conn,"SELECT * FROM `categorytable`");
        while ($row = mysqli_fetch_assoc($category)) {
            if ($row['categoryName'] == $_POST['parentCategory']) {
                $_POST['parentCategory'] = $row['categoryId'];
            }
        }
        if (isset($_SESSION['updateCategory'])) {
            updateCategoryIntoDb($_POST);
        } else {
            insertCategoryIntoDb($_POST);
        }
    }
    $arr = [];
    mysqli_select_db($conn,"test");
    $result = mysqli_query($conn,"SELECT categoryName FROM `categorytable`");
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($arr,$row['categoryName']);
    }
    

?>
<h1>Add New catagory</h1>
    <form method="POST" action="addNewCatagory.php" id="addNewCategory" enctype="multipart/form-data">
        <div class="AddNewCatagory">
            <div class="title">
                <label>Title</label>
                <input type="text" name="categoryName" value="<?php echo getValue("categoryName"); ?>">
            </div>
            <div class="content">
                <label>content</label>
                <input type="text" style="height:40px; width:200px;" name="categoryContent" value="<?php echo getValue("categoryContent"); ?>">
            </div>
            <div class="URL">
                <label>URL</label>
                <input type="text" name="categoryUrl" value="<?php echo getValue("categoryUrl"); ?>">
            </div>
            <div class="metaTitel">
                <label>Meta Title</label>
                <input type="text" name="categoryMetaTitle" value="<?php echo getValue("categoryMetaTitle"); ?>">
            </div>
            <div class="parentCatagory">
                <label>parent Catagory</label>
                <select name="parentCategory" form="addNewCategory">
                    <?php $q = "select categoryName from categorytable where categoryId =".getValue("parentCategory"); ?> 
                    <?php $array = mysqli_fetch_assoc(mysqli_query($conn,$q)); ?>
                    <?php foreach ($arr as $key) :?>
                        <option value="<?php echo $key?>" <?php if($array["categoryName"] == $key){ echo "SELECTED";}?>><?php echo $key?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="uploadImage">
                <label>Image</label>
                <input type="file" name="categoryImage">
            </div>
        </div>
        <input type="submit" name="submit" value="SUBMIT">
    </form>
</body>
</html>