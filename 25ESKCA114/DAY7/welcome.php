<?php
$name = "Kangana"; // change to your name
$favLang = "PHP";

date_default_timezone_set("Asia/Kolkata");

$currentDate = date("Y-m-d");
$currentTime = date("H:i:s");

$ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Welcome Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white text-center">

<div class="container mt-5">
    <h1 class="mb-4">Welcome Page</h1>

    <div class="card p-4 bg-secondary">
        <h3>Name: <?php echo $name; ?></h3>
        <p>Date: <?php echo $currentDate; ?></p>
        <p>Time: <?php echo $currentTime; ?></p>
        <p>Favorite Language: <?php echo $favLang; ?></p>
        <p class="text-warning">You are visiting from <?php echo $ip; ?></p>
    </div>
</div>

</body>
</html>