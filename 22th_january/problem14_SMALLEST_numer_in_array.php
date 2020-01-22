<?php

$arr = [89,56,75,55,78,63,95,65];
$i = sizeof($arr)-1;
$res = $arr[$i];
while($i != 1) {
    if($arr[$i-1] <= $res)
    {
        $res = $arr[$i-1];
    }
    $i--;
}

print_r($arr);
echo "<br>Shortest Number is:- ".$res;

?>

