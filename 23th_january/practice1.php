<?php

// $name = ['Rajnik','Tej','r'];
// $replace_name = ['Rrhsjhbsbrrrjk','Traaaarrrrj'];
// $user_input = "Type Hear......";
// if(isset($_POST) && !empty($_POST)) {
//     $user_input = $_POST['user_input'];
//     $final_output = str_ireplace($name, $replace_name, $user_input);
//     echo $final_output;
// }



if(isset($_POST) && !empty($_POST)) {
    $name = $_POST['serch'];
    $name = explode(" ",$name);
    $replace_name = $_POST ['replace'];
    $replace_name = explode(" ",$replace_name);
    $user_input = $_POST['user_input'];
    $final_output = str_ireplace($name, $replace_name, $user_input);
}
?>

<form action="practice1.php" method="POST">
    <textarea cols="50" rows="10" name="user_input" placeholder="Type Hear......"><?php if(isset($final_output)) {echo $final_output;}?></textarea><br><br>
    Serch for :-<br>
    <input type="text" name="serch" placeholder="element1 element2 ..."><br><br>
    Replace with :-<br>
    <input type="text" name="replace" placeholder="element1 element2 ..."><br>
    <input type="submit" value="Submit">
</form>