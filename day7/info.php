<?php
echo "<h1>Hello World</h1> <br>";
echo "I'm Rishi <br>";
echo "IoT is my branch <br>";
echo "I am a student of B.Tech IoT <br>";


$name ="Rishi";
$cgpa = 10;
$branch = "IoT";
$year = date("Y");
$month = date("m");
if($month < 7){
    echo "Year $year -($year+1)";
}
else{
    echo "Year ($year-1) - $year";
}
?>

<h1><?= $name ?></h1>
<p>CGPA: <?=$cgpa?></p>
<p>Branch: <?=$branch?></p>
<p>Date: <?= date("Y-m-d h:i:s a")?></p>
