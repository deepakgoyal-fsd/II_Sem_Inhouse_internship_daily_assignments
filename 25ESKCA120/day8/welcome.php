<html>
<body>
        
    
<?php

echo "<h1> Hello World </h1>";
echo "Name : Kishor Kumar";

$name = "Kishor Kumar";
$cgpa = 9.0;
$branch = "CSE(AI)";
$year = date("Y");
$month = date("m");
$prev_year = $year-1;
$next_year = $year+1;

if($month < 7){
    echo "Year $year-$next_year";
}
else{
    echo "Year $prev_year - $year";
}



?>

<h1><?=$name?> </h1>
<p><?=$cgpa?> </p>
<p><?=$branch?> </p>

<p>Date:<?= date("Y-m-d H:i:s")?></p>

</body>
</html>