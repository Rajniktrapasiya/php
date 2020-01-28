<?php


if(isset($_POST['button'])) {
    $random = rand(1,100);
    echo "Randome Number Is:- ".$random;
}
?>



<form action="practice3_RandomeNumber.php" method="POST">
    <input type="submit" name="button" value="Submit">
</form>