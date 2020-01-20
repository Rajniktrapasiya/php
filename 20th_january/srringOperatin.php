<?php
$string = 'This Is String Operations & Try it .';

$String_word_count = str_word_count($string);

echo $String_word_count."<br>";    // 4

$String_word_count = str_word_count($string , 1);

print_r($String_word_count);    //print_r is use to print array

echo "<br>";

$String_word_count = str_word_count($string , 2);

print_r($String_word_count);

echo "      //Hear not consider & and .<br>";

$String_word_count = str_word_count($string , 2 ,'&.'); // in third argumrnt we parse character which is consider as word.

print_r($String_word_count);
echo "<br><br>";

//------------------------------------------- string shuffle -------------------------------------------------------

$stringExampal = 'abcdefghi0123456789';
$string_suffled = str_shuffle($stringExampal); // this function is use for combination of each character in given string

echo "original Printing:-";
echo $string_suffled;
echo "<br>";
echo "Reverse  Printing:-";

$string_Reverse = strrev($string_suffled); //reverse string .
echo $string_Reverse;
echo "<br>";

$halfOfString = substr($string_suffled , 0 , strlen($stringExampal)/2); //sub string operation and string length operation

echo $halfOfString;
echo "<br>";

$halfOfString = substr($string_suffled , 0 , 5);

echo $halfOfString;
echo "<br>";

//-----------------------------------------------------Similar String match---------------------------------------

$stringOne = 'This is my practice. I like php.';
$stringTwo = 'This is your home work in php.';

echo "String One:-".$stringOne."<br>";
echo "String Two:-".$stringTwo."<br>";

similar_text($stringOne , $stringTwo , $stringMatch);
echo "String Maching Is (%) :-".$stringMatch."<br>";

//---------------------------------------------------- Trim function------------------------------------------------

$str = '__&nbsp__Hello this is example of trim \t\t hear we learn';
var_dump($str);

$trimmed = trim($str);
echo "<br>only trim use :-";
var_dump($trimmed);

//-----------------------------------------------------add slashing -------------------------------------------------

$strTwo = 'this is <input type="text" placeholder="Input-Tag"> tag.';
echo "<br>".$strTwo;

$string_slashes = htmlentities(addslashes($strTwo));    //addslashes is use to add slashes before " , ' starting.
echo "<br>".$string_slashes;
echo "<br>".stripslashes($string_slashes);  //in stripslashes remove slash

?>