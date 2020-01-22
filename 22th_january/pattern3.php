<?php


$t = 8;
for($i=1; $i<=8; $i++) {
    for($j=1; $j<=8; $j++) {
        if($j<=$t)
        {
            echo $j;
        }
    }
    echo "<br>";
    $t--;
}
?>