<!DOCTYPE html>
<html>
<head>
    <title>PHP Example 1</title>
</head>
<body>

<?php

echo "<h1>Hello World</h1>";
echo "Anirudh Sharma <br>";
echo "B.Tech CSE-IOT <br>";

$name = "Anirudh Sharma";
$cgpa = "9.17";
$branch = "IOT";

$year = date("Y");
$month = date("m");

$prev_year = $year - 1;
$next_year = $year + 1;

if ($month < 7) {
    echo "Academic Year: $prev_year-$year";
} else {
    echo "Academic Year: $year-$next_year";
}

?>

<h2><?php echo $name; ?></h2>
<p>CGPA: <?php echo $cgpa; ?></p>
<p>Branch: <?php echo $branch; ?></p>

</body>
</html>