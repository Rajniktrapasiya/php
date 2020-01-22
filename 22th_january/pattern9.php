<?php

$t = 1;
for($i=1; $i<=5; $i++) {
    for($j=1; $j<=5; $j++) {
        if($j<=$i) {
            echo $t." ";
            $t++;
        } else {
            echo "&nbsp&nbsp";
        }
    }
    echo "<br>";
}
?>