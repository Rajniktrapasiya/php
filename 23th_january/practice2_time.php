<?php

$time = time();
$YesterDay_time = date('d /m /Y @ H:i:s', strtotime("-1 day"));
$actual_time = date('d /m /Y @ H:i:s', $time);
$tommorow_time = date('d /m /Y @ H:i:s', strtotime("1 day"));
echo "<br>YesterDay Time:- ".$YesterDay_time."<br>Todays___  Time:- ".$actual_time." <br>Tommorow Time:- ".$tommorow_time;
?>+