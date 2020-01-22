<?php


$t = 15;
for($i=1; $i<=8; $i++) {
    for($j=1; $j<=15; $j++) {
        if($j<=$t)
        {
            echo "*";
        }
    }
    echo "<br>";
    $t -=2;
}
?>