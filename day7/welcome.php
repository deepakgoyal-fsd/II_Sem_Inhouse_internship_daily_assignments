<html>
    <body>
    <?php
// echo "<h1>hello world</h1> <br>";
// echo "Name: Ankita <br>";
// echo "Branch: AI <br>";
// echo "Cgpa: 9.9 <br>";

$Name ="Ankita";
$cgpa =9.9;
$branch = "AI";
$date =date("Y-m-d");
$Fav_language="Java";
$year = date("Y");
$month = date("m");
$prev_year = $year-1;
$next_year= $year+1;


if($month<7){
    echo "Year $year-$next_year";
}
    else{
        echo "Year $prev_year_$year";
    }

?>

<h1><?=$Name?></h1>
<p>CGPA:<?=$cgpa?></p>
    <p>Branch:<?=$branch?></p>
    <p>Date:<?=$date?></p>
    <p>Fav_Language: <?=$Fav_language?></p>
    

    <p>Date:<?= date("Y-m-d H:i:s")?></p>
    <p>You are visiting from: <?=$_SERVER["REMOTE_ADDR"]?></p>
</body>
</html>
    
