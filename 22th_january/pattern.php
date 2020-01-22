<?php

// $t = 1;
// $r = 10;
// for($i = 1; $i<=10; $i++) {
//     if($i>5)
//     {
//         $t--;
//         $r++;
//     }
//     for($j = 1; $j<=10; $j++){
//         if($i <= 5)
//         {
//             if($j==$t||$r==$j ||$j==1 ||$j==10) {
//                 echo "*";
//             } else {
//                 echo "&nbsp&nbsp";
//             }
//         } else {
//             if($j==$t||$r==$j ||$j==1 ||$j==10) {
//                 echo "*";
//             } else {
//                 echo "&nbsp&nbsp";
//             }   
//         }
//     }
//     if($i<=5)
//     {
//         $t++;
//         $r--;
//     }
//     echo "<br>";
// }


// $t = 1;
// $r = 10;
// for($i = 1; $i<=10*10; $i++) {
//     $j = $i %10;
//     if($j == 0){
//         $j = 10;
//     }
//     if($j<=$t || $r<=$j ||$j==1 ||$j==10) {
//         echo $j;
//     } else {
//         echo "&nbsp&nbsp";
//     }
//     if($i%10 == 0)
//     {
//         echo "<br>";
//         if($i<50)
//         {
//             $t++;
//             $r--;
//         }
//         if($i>50)
//         {
//             $t--;
//             $r++;
//         }
//     }
// }

$d = 25;
$t = 1;
$r = $d;
$table = "<table><tr>";
for($i = 1; $i<=$d*$d; $i++) {
    $j = $i % $d;
    if($j == 0){
        $j = $d;
    }
    if($j<=$t || $r<=$j ||$j==1 ||$j==$d) {
        $table .= "<td>".$j."</td>";
    } else {
        $table .= "<td></td>";
    }
    if($i%$d == 0)
    {
        $table .= "</tr><tr>";
        if($i<($d*$d/2))
        {
            $t++;
            $r--;
        }
        if($i>($d*$d/2))
        {
            $t--;
            $r++;
        }
        if($i==$d*$d){
            $table .= "</table>";
        }
    }
}

echo $table;
?>