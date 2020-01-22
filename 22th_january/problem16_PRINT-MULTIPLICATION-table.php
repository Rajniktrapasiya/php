<?php

$table = "<table style='border:1px solid black;'>";
for($i=1; $i<=10; $i++) {
    $table .= "<tr>";
    for($j=1; $j<=10; $j++) {
        $table .= "<td style='border:1px solid black;'>".$i."*".$j."=".$i*$j."</td>";
    }
    $table .= "</tr>";
}

echo $table;
?>