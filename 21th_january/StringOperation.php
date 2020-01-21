<?php

function find_number($string) {
    if(preg_match('/ /',$string))
    {
        return true;
    } else {
        return false;
    }
}

if (find_number('this is php.')) {
    echo "yeah! match found";
} else {
    echo "not found";
}
echo "<br>";

//-------------------------------------------------------------This is substring position replace Example---------------------------------
$str = 'This is Java';
$str_replace = substr_replace($str,'php  ',8 ,4);

$string = 'hello this is tutorial.';
echo "(".$string.") LENGTH:-".strlen($string);
echo "<br>";
echo "Upper Case:-".strtoupper($string)."<br>";
echo "Lower Case:-".strtolower($string)."<br>";

if(strtolower($_POST['name']) == 'rajnik') {
    echo "your name varified";
}

?>

<form action="StringOperation.php" method="POST">
    Enter Any type(small,capital) name:-<input type="text" placeholder="Enter Rajnik" name="name"><br>
    <input type="submit" value="submit">
    <br>
    <br>
    <br>
    This is string position Example:-<br>
    Enter string:-<input type="text" placeholder="Enter string" name="String"><br>
    Enter Finding string:-<input type="text" placeholder="Enter substring" name="subString"><br>
    <input type="submit" value="submit">
    <br>
    <br>
    <br>
    This is substring position replace Example:-<br>
    Enter string:-<input type="text" placeholder="Enter string" name="String"><br>
    Enter Finding string:-<input type="text" placeholder="Enter substring" name="subString"><br>
    <input type="submit" value="submit">
</form>
<?php

    $mainString = $_POST['String'];
    $subString = $_POST['subString'];
    $offset = 0;
    while($string_position = strpos($mainString ,$subString ,$offset)) {
        echo $subString." is found at ".$string_position."<br>";
        $offset = $string_position + strlen($subString);
    }
?>
