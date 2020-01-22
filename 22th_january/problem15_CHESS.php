<?php


$table = "<table style='border:1px solid black;border-spacing: 0;border-collapse: collapse;'>";

function addWhite() {
    global $table;
    $table .= "<td style='height: 10px; width :10px;background-color : white'></td>";
}

function addBlack() {
    global $table;
    $table .= "<td style='height: 10px; width :10px;background-color : black'></td>";
}

for($i=1; $i<=8; $i++) {
    $table .= "<tr>";
    for($j=1; $j<=4; $j++) {
        if($i % 2 ==0) {
            addBlack();
            addWhite();
        } else {
            addWhite();
            addBlack();
        }

    }
    $table .= "</tr>";
}

echo $table;
?>