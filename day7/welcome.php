<html>
    <body>

<?php



$name = "Mahi Meena";
$language= "html";
$branch = "AI";
$year = date("Y");
$month = date("m");
$prev_year = $year-1;
$next_year = $year+1;
if($month < 7){
    echo "Year $year-($next_year+1)";
}else{
    echo"Year $prev_year - $year";
}

?>

<h1><?=$name?> </h1>
<p><?=$language?></p>
<p><?=$branch?></p>
<p><?=date("Y-m-d")?></p>
<p><?= "current time:".date("h:i:s A");?><p>


</body>
</html>