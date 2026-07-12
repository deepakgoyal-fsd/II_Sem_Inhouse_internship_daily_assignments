<html>
    <body>
        <?php


/* echo "<h1>hello world</h1><br>";
echo "name : Dhriti Bishnoi <br>";
echo "branch : AI<br>"; */



$name = "Dhriti Bishnoi";
$cgpa = 8.4;
$branch = "AI";
$year = date("Y");
$month = date("m");
$prev_year = $year-1;
$next_year = $year+1;

if($month < 7){
    echo "Year $year-$next_year";
}else{
    echo "Year $prev_year - $year";
}

?>

<h1><?= $name?></h1>
<p><?=$cgpa?></p>
<p><?=$branch?></p>

<p>Date:<?= date("Y-m-d H:i:s")?></p>
<p>You are visiting from: <?=$_SERVER['REMOTE_ADDR'] ?></p>

</body>
</html>
