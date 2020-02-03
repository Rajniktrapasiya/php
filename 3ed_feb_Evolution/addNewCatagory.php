<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    include_once "insertDataBase.php";
    if(empty($_SESSION['session'])) {
        die("Plese goto Login Page");
    }
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
    if(isset($_POST['submit'])) {
        insertCategoryIntoDb($_POST);
    }
?>
<h1>Add New catagory</h1>
    <form method="POST" action="addNewCatagory.php">
        <div class="AddNewCatagory">
            <div class="title">
                <label>Title</label>
                <input type="text" name="categoryName">
            </div>
            <div class="content">
                <label>content</label>
                <input type="text" style="height:40px; width:200px;" name="content">
            </div>
            <div class="URL">
                <label>URL</label>
                <input type="text" name="url">
            </div>
            <div class="metaTitel">
                <label>Meta Title</label>
                <input type="text" name="meta Title">
            </div>
            <div class="parentCatagory">
                <label>parent Catagory</label>
                <?php $arr =["Electronics","Education","Accesories","Automobile"];?>
                <select>
                <?php foreach ($arr as $key) :?>
                    <option value="<?php $key?>" ><?php echo $key?></option>
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