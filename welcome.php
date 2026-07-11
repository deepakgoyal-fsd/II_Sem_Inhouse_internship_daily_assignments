<html>
    <body>
        <?php
echo "<h1> Hello World</h1> <br>";

echo "Ayushi Kumar <br>";

echo "Btech CSE-IOT <br>";


$name="Ayushi Kumar";
$cgpa=9.0;
$branch="IOT";
$year=date("Y");
$month=date("m");
$prev_year =$year-1;
$prev_year =$year+1;

if($month<7){
    echo "Year $year-$next_year";
    }
    else{
        echo"Year $prev_year-$year";
    }


?>

<h1><?=$name?></h1>
<p><?=$cgpa?></p>
<p><?=$branch?></p>
</body>
</html>




