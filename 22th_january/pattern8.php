<?php

$t = 1;
for($i=1; $i<=6; $i++) {
    for($j=1; $j<=20; $j++) {
        if($j<$t)
        {
            echo "*";
        } elseif($j<($t+$i-1)) {
            echo "0";
        } else {
            echo "&nbsp&nbsp";
        }
    }
    
    echo "<br>";
    $t += $i;
}
?>