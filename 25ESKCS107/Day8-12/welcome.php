<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

echo "Hello World <br>";

echo "H";
echo "e";
echo "l";
echo "l";
echo "o";
echo " ";
echo "W";
echo "o";
echo "r";
echo "l";
echo "d";

$name = "Nill Nitin Mukesh";
$cgpa = 0.0;
$branch = "GTH";
$branch_full_name = "Go to hell";
$post = "Underarm Graduate";

$year = date("Y");
$month = date("M");
$prev_year = $year-1;
$next_year = $year+1;


if($month < 7){
    echo "Year $year - $next_year";
}else{
    echo "Year $prev_year - $year";
}

?>
<h1><?= $name ?></h1>
<h1><?= $cgpa ?></h1>
<h1><?= $branch ?></h1>
<span>Date : <>date("Y-M-D h:i:s a")?></span>
<img src="https://robohash.org/${name}?set=set2&size=180x180" alt="">
<img src="https://robohash.org/${cgpa}?set=set2&size=180x180" alt="">
<img src="https://robohash.org/${branch}?set=set2&size=180x180" alt="">
<img src="https://robohash.org/${branch_full_name}?set=set2&size=180x180" alt="">
<img src="https://robohash.org/${post}?set=set2&size=180x180" alt="">
<img src="https://robohash.org/${name}?set=set2&size=180x180" alt="">

echo "Values received : $name $branch $email $phonenumber"

</body>
</html>
