<?php

$fullName = 'My Name Is Rajnik Trapasiya.';

if (preg_match('/Rajnik/',$fullName)) {     // in prag_match('/<-this is required (/)->/','') without / not working; it's compulsory.
    echo "yah! Rajnik Word's found<br>";
} else {
    echo 'Rajnik Word not found';
}

$nameOne = 'Raj';
$nameTwo = 'Raj';

/* if (preg_match($nameOne,$nameTwo)) {                 // not working
    echo 'it\'s working on string comparision<br>s' ;
} else {
    echo 'try another way';
} */

if (preg_match('/Rajnik/','this is Rajnik')) {         
    echo 'it\'s working on string comparision<br>' ;
} else {
    echo 'try another way';
}
?>