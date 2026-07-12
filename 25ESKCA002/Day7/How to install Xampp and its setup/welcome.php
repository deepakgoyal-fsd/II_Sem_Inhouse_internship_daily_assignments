<!-- 
 echo "<h1>Hello world</h1><br>";
 echo"Aarish jain<br>";
 echo"2nd year<br>";
 echo"CS(AI)<br>";
 echo"10.0<br>"; -->
<html>
    <body>
<?php

$name="Aarish Jain";
$cgpa=10.0;
$branch="CSE(AI)";
$year=date("Y");
$month=date("m");
$prev_year=$year-1;
$next_year=$year+1;
if($month<7){
    echo "Year $year-$next_year";
}
    else{
        echo "Year $prev_year-$year";
    }





?>
<h1><?=$name?> </h1>
<p><?=$cgpa?></p>
<p><?=$branch?></p>
<img src="https://images.unsplash.com/photo-1782565739939-15b4178554d9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxmZWF0dXJlZC1waG90b3MtZmVlZHwxMHx8fGVufDB8fHx8fA%3D%3D">

</body>
</html>