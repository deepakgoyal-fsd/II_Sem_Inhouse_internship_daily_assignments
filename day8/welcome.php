<html>
<body>
    
<?php
 echo "Hello";
$name = "viyoum";
$cgpa = 9.9;
$branch = "CSE";
$year = date("Y");
$month = date("m");
$next_year = $year+1;
$next_month = $month+1;

if($month < 7){
    echo "Year $year-$next_year";
} else {
    echo "Year $next_year-$next_month";
}
?>
 <h1> viyoum</h1>