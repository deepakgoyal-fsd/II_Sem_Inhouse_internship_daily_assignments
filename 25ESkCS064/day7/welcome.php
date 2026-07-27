<html>
    <body>

<?php


$name ="divyansh Shah";
$cgpa =8.1;
$branch ="AI";
$today=date("d-m-Y");
$time=date("H:i:s");
$favprogramminglang ="c++";
$myline="hey theree";
$year=date("Y");
$month=date("m");
$prev_year= $year-1;
$next_year= $year+1;

if($month < 7){
    echo "year $year-($year+1)";

}else{
    echo "year ($year-1) - $year";

}


?>
<body style="background-color:#87CEEB;
text-align:left;">


<h1> <?= $name?> </h1>
<p> <?= $cgpa?></p>
<p> <?= $branch?></p>
<p> <?= $favprogramminglang?></p>
<p> <?= $today?></p>
<p> <?= $time?></p>
<p> <?= $myline?></p>



</body>
</html>