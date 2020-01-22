<?php

$num = 123456789;

$privious_value = $num;
$final = 0;
for($i=1; $i<=strlen($num); $i++) {

    
        $mod = $privious_value % 10;
        $temp = $privious_value/10;
        $privious_value = (int)$temp;
        $final = ($final*10) + $mod;
    
}
echo $final;

?>