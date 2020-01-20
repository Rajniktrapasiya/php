<?php

for($i = 1; $i <= 10; $i++)
{
    echo $i." Calling<br>";
}

//foreach loop
$array = array("rajnik","priyank","tej","Kishan");
foreach($array as &$i){
    echo "<br>".$i."<br>";
}
?>