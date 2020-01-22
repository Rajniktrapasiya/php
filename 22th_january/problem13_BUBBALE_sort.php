<?php

$arr =[125,568,42,5,87,654,248,222,459,63,75,95,785,999];

function swap($j){
    global $arr;
    $temp = $arr[$j-1];
    $arr[$j-1] = $arr[$j];
    $arr[$j] = $temp;
}
$arr_size = sizeof($arr);
while($arr_size != 0)
{
for($i=sizeof($arr)-1; $i>=1; $i--) {
    if(($arr[$i-1]) <= $arr[$i]) {
        swap($i);
    }
}
    $arr_size--;
}

print_r($arr);
?>