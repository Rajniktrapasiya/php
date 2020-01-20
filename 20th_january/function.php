<?php
//printName(); //above function declaration is work

function printName() {
    echo 'Hello Rajnik<br>';
}

printName();

/*function printName($name){   function name not sem(passing Parameter Like) otherwise give error like can't redclare function
    echo "Hello ".$name;
}*/

$globleVar = 'Globle Declare';
function printVarName($name) {
 // echo $name."<br>".$globleVar; //it's give error like $globlevar is not declare beacause it can't access without any specific calling.
    global $globleVar;   //declaration of globle variable.
    echo $name." ".$globleVar."<br>"; // now we can use globle variable in our function
}

$name = 'Kishan';
printVarName("Ronak"); //working
printVarName($name);   //working

function addNumber($numberOne , $numberTwo) {
    return $numberOne + $numberTwo;
}

echo addNumber(20,50)." okay it's return function calling<br>";

$tempData = addNumber(48,92);
echo $tempData." return value store and print";
?>