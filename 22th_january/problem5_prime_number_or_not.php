<?php

$num = 23;
$bol = false;
for($i=1; $i<$num; $i++){
    if(($num % $i) == 0) {
        if($i!=1)
        {
            $bol = true;
        }
    }
}

if($bol == true) {
    echo $num." Number <strong>Is Not Prime</strong>";
    $bol = false;
} else {
    echo $num." Number <strong>IsPrime</strong>";
}
?>