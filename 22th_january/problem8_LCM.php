<?php




$num1 = 7;
$num2 = 99;
$bol = true;
$hcf = 0;
for($i=1; $i<$num1 && $i<$num2 && $bol == true; $i++) {
    if($num1 % $i ==0 && $num2 % $i ==0)
    {
        $hcf = $i;
    }
}

echo ($num1*$num2)/$hcf;
?>