<?php

$var1 = 0;
$var2 = 1;
echo $var1." ".$var2." ";
for($i=1; $i<=10; $i++) {
    $var2 = $var2 + $var1;
    $var1 = $var2 - $var1;
    echo $var2." ";
}
?>