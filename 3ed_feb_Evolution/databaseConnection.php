<?php 

function openCon() {

$dbhost ="localhost";
$dbuser = "root";
$dbpass = "1234";

$conn = new mysqli($dbhost,$dbuser,$dbpass) or die("Connection failed: %s\n".$conn -> error);


return $conn;
}


function closeCon($conn) {
    $conn -> close();
    echo "Connection close<br>";
}
?>