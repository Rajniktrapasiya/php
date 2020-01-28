<?php
function setValue($key,$value) {
    $_SESSION[$key][$value] = isset($_POST[$key][$value]) ? $_POST[$key][$value] : "" ;

}

function getValue($key,$value) {
    if(isset($_POST[$key][$value])) {
        if(is_array($_POST[$key][$value])) {
            $temp = [];
            foreach($_POST[$key][$value] as $value1) {
                array_push($temp,$value1);
            }
            $_POST[$key][$value] = $temp;
        } 
        return $_POST[$key][$value];
    } else {
        return isset($_SESSION[$key][$value]) ? $_SESSION[$key][$value] : "";
    }
    
    
}


function setValuePrifix($value) {
    $_SESSION[$value] = isset($_POST[$value]) ? $_POST[$value] : [] ;
}

if(isset($_POST['submit'])) {
    foreach($_POST as $key => $value) {
        foreach($value as $valuekey => $Mainvalue) {
            setValue($key,$valuekey);
        }
    }
}

?>