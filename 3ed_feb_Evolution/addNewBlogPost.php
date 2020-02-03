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
    if(empty($_SESSION['session'])) {
        die("Plese goto Login Page");
    }
    include_once "insertDataBase.php";
    insertBlogIntoDb($_POST);
   
    

?>
    <h1>Add New Blog Post</h1>
    <form method="POST" action="addNewBlogPost.php">
        <div class="AddNewBlog">
            <div class="title">
                <label>Title</label>
                <input type="text" name="title">
            </div>
            <div class="content">
                <label>content</label>
                <input type="text" style="height:40px; width:200px;" name="content">
            </div>
            <div class="URL">
                <label>URL</label>
                <input type="text" name="url">
            </div>
            <div class="publisedAt">
                <label>publised At</label>
                <input type="date" name="publishedDate">
            </div>
            <div class="catagory">
                <label>catagory</label>
                <input type="text" name="categoryName">
            </div>
            <div class="uploadImage">
                <label>Image</label>
                <input type="file" name="image">
            </div>
        </div>
        <input type="submit" value="SUBMIT">
    </form>
</body>
</html>