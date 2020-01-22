<?php


$arr = [4,88,6,58,2,35,1,7];
$i = 0;
//var_dump($a);
$res = 0;
while(!empty($arr[$i])){
    if($res < $arr[$i]) {
        $res = $arr[$i]; 
    }
    $i++;
}

echo $res;
?>