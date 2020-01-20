<?php


if(1)
{
    echo "if(1) is working<br><br>";
}

//else if
$age = 26;
if($age >= 18){
    echo "you are Young<br><br>";
}
else{
    echo "You are TeenAger<br>";
}

//else-if lader
$totalMarks = 450;
if($totalMarks <= 150){
    echo "Fail<br>";
}
elseif($totalMarks >150 && $totalMarks <= 250){
    echo "Grade D<br>";
}
elseif($totalMarks >250 && $totalMarks <= 350){
    echo "Grade C<br>";
}
elseif($totalMarks >350 && $totalMarks <= 450){
    echo "Grade B<br>";
}
elseif($totalMarks >450 && $totalMarks <= 550){
    echo "Grade A<br>";
}

?>