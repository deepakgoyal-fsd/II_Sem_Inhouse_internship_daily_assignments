<?php
echo "<h1>Hello World</h1> <br>";
echo "Naman Kabra here <br>";
echo "AI is my branch <br>";
echo "I am a student of B.Tech CSE <br>";

$name ="Naman Kabra";
$cgpa = 8.8;
$branch = "CSE-AI";
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
