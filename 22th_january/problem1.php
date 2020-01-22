<?php



$num = 5;
$temp = $num;
while($num != 1) {
    $temp *= ($num-1);
    $num--;
}
echo $temp;

?>