<?php


$num = '1634';
$str_length = strlen($num);
$num = $num;
$final =0;
$starting = 0;
$ending = -($str_length-1);


for($i=1; $i<=$str_length; $i++) {
    if($i == $str_length)
    {
        $temp = (int)substr($num,-1);
    } else {
        $temp = (int)substr($num,$starting ,$ending);
    }
    $result = 1;
    for($j=1; $j<=$str_length; $j++) {
        $result = $result * $temp;
    }
    $final += $result;
    $starting ++;
    $ending ++;
}

if($final == $num)
{
    echo $num." is <strong>Armstrong</strong> Number";
} else {
    echo $num." is <strong>Not Armstrong</strong> Number";
}
?>