<!DOCTYPE html>
<html>

<head>

<title>Student Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<?php

$name="Kritika Goyal";

$college="SKIT Jaipur";

$branch="Computer Science";

$year="2rd Year";

$bio="Passionate Web Developer";

$currentYear=date("Y");

$month=date("n");

if($month<6){

$academic=($currentYear-1)."-".$currentYear;

}

else{

$academic=$currentYear."-".($currentYear+1);

}

?>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center">Student Profile</h2>

<hr>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>College :</b> <?php echo $college; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>Year :</b> <?php echo $year; ?></p>

<p><b>Bio :</b> <?php echo $bio; ?></p>

<p><b>Academic Year :</b> <?php echo $academic; ?></p>

</div>

</div>

</body>

</html>