<?php
session_start();

function month_time_table($month_,$year_) {
$month = $month_;
$t = date('F', mktime(0, 0, 0, $month, 10));
$year = $year_;
$days = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
$table = "<style>td,th{border: 1px solid black}</style><table><tr><strong>".$t."</strong></tr><tr><th>SUN</th><th>MON</th><th>TUE</th><th>WED</th><th>THU</th><th>FRI</th><th>SAT</th></tr><tr>";

for($i = 1; $i<=cal_days_in_month(CAL_GREGORIAN, $month, $year); $i++) {
    $timestamp = strtotime($year."-".$month."-".$i);
    $day = date('D', $timestamp);
    if($i == 1) { $bol = false;}
    for($j=0; $j<sizeof($days); $j++) {
        if($i == 1 && $bol == false) {
                if($day == $days[$j]) {
                    if($day == 'Sun') {
                        $table .= "<tr>";
                        $table .= "<td>".$i."</td>";
                        $bol = true;
                    } elseif ($day == 'Sat'){
                        $table .= "<td>".$i."</td>";
                        $table .= "</tr>";
                        $bol = true;
                    } else {
                        $table .= "<td>".$i."</td>";
                        $bol = true;
                    }
                } else {
                    $table .= "<td></td>";
                }
            } else {
            if($day == $days[$j]) {
                if($day == 'Sun') {
                    $table .= "<tr>";
                    $table .= "<td>".$i."</td>";
                } elseif ($day == 'Sat'){
                    $table .= "<td>".$i."</td>";
                    $table .= "</tr>";
                } else {
                $table .= "<td>".$i."</td>";
                }
            }
        }
    }
}

$Last_day = date('D', strtotime($year."-".$month."-".cal_days_in_month(CAL_GREGORIAN, $month, $year)));
$v = 0;


$table .= "</table>";
return $table;
}

if(isset($_POST['submit']) && !empty($_POST['month1'] && !empty($_POST['month2']) && !empty($_POST['year']))){

    $_SESSION["month1"] = $_POST['month1'];
    $_SESSION['month2'] = $_POST['month2'];
    $_SESSION['year'] = $_POST['year'];
} else {
    if(empty($_POST['month1'])) {
        echo "Enter Month1<br>";
    }
    if(empty($_POST['month2'])) {
    echo "Enter Month2<br>";
    }
    if(empty($_POST['year'])) {
    echo "Enter Year<br>"; 
    }
}


if(!empty($_SESSION['month1']) && !empty($_SESSION['month2']) && !empty($_SESSION['year'])) {
    $final = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
    </head>
    <body>
    ';
    $final .="<table style='border: 0px solid white'><tr>";
    $month1 = $_SESSION['month1'];
    $month2 = $_SESSION['month2'];
    $year = $_SESSION['year'];
    $count = 1;
    for($i = $month1; $i <= $month2; $i++) {
        if($count == 4) {
            $final .= "<td>".month_time_table($i,$year)."</td>";
            $final .="</tr><tr>";
            $count = 1;
        } else {
            $final .= "<td>".month_time_table($i,$year)."</td>";
            $count++;
        }
    }
    $final .= "</body></html>";
    echo $final;
}
?>


<form action="calender.php" method="POST">
<br><br><bt>
    <input type="number" name="month1" placeholder="Enter First Month">
    <br>
    <input type="number" name="month2" placeholder="Enter Second Month">
    <br>
    <input type="number" name="year" placeholder="Enter year">
    <br>
    <input type="submit" name="submit" value="SUBMIT">
</form>