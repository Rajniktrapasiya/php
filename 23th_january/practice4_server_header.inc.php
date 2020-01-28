<?php
    $script = $_SERVER['SCRIPT_NAME'];
    $redirect_page = 'https://www.google.com/';

    $ip_current = $_SERVER['REMOTE_ADDR'];
    
    if(isset($_POST['google'])) {
        header('Location: '.$redirect_page);
    }
  
?>

<form action="<?php echo $script; ?>" method="POST">
    <input type="submit" name="button" value="Submit">
    <br><br>
    <input type ="submit" name="google" value="Serch On Google">
</form>

