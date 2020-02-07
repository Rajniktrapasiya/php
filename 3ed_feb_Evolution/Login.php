<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<body>
    <?php
    if(isset($_POST['login'])) {
        $selectUserTable = "SELECT * FROM `userinfo`";
        include_once "databaseConnection.php";
        $conn = openCon();
        mysqli_select_db($conn , 'test');
        $user = mysqli_query($conn,$selectUserTable);
        session_start();
        $bolpass = false;
        $bolemail = false;
        if ($row = mysqli_num_rows($user) > 0) {
            foreach ($user as $column => $currentRow) {
                foreach ($currentRow as $field => $VALUE) {
                    if ($field == "email") {
                        if ($_POST['email'] == $VALUE) {
                            $bolemail = true; 
                        }
                    }
                    if ($field == "password") {
                        if ($_POST['password'] == $VALUE) {
                            $bolpass = true;
                        }
                    }
                    if ($bolemail == true && $bolpass == true) {
                        $_SESSION["user"] = $currentRow;
                        $_SESSION["userId"] = $currentRow["userId"];
                        $bolemail = false;
                        $bolpass = false;
                        $_SESSION['session'] = "Yes";
                        header("Location:blogPost.php");
                    }
                }
                if ($bolemail == false && $bolpass == false) {
                    $err = "Please Enter Valid Email And PassWord";
                }
            }
        }
    }
    ?>
    <form method="POST" action="Login.php">
    <h1>LoGIN</h1>
    <div class="Email">
    <label>Email</label>
    <input type="email" name="email" >
    </div>
    <div class="password">
    <label>PassWord</label>
    <input type="password" name="password" >
    <span><?php echo isset($err)? $err: "";?></span>
    </div>
    <div class="Submit">
    <input type="submit" name="login" value="LOGIN" >
    <a href="registration.php">REGISTRATION</a>
    </div>
    </form>
</body>
</html>