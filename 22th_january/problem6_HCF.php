<?php

// $num = 48;
// $temp = $num;
// $arr = [];
// $bol = false;
// $i = 9;
// while($i != 1) {
//     $s = $temp % $i;
//     echo $s."ok";
//     if($s == 0) {
//         if($i == 4){
//             echo $temp." <br>";
//             $arr[] = 2;
//             $arr[] = 2;
//             $bol = true;
//         } elseif($i == 6) {
//             echo $temp." <br>";
//             $arr[] = 3;
//             $arr[] = 2;
//             $bol = true;
//         } elseif($i == 8) {
//             echo $temp." <br>";
//             $arr[] = 2;
//             $arr[] = 2;
//             $arr[] = 2;
//             $bol = true;
//         } elseif($i == 9) {
//             echo $temp." <br>";
//             $arr[] = 3;
//             $arr[] = 3;
//             $bol = true;
//         } else {
//             echo $temp." <br>";
//             $arr[] = $i;
//             $bol = true;
//         }
//     }
//     if($bol = true) {
//         echo $i." calling";
//         echo $temp;
//         $temp = $temp / $i;
//         echo $temp;
//         $bol = false; 
//     }
//     $i--;
// }
// var_dump($arr);

$name1 = 15;
$name2 = 35;
$hcf = 0;
for($i=1; $i<$name1 && $i<$name2; $i++) {
    if($name1 % $i ==0 && $name2 % $i ==0)
    {
        $hcf = $i;
    }
}

echo $hcf;
?>