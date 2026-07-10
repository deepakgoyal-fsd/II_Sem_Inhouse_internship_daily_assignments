<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Task</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
$name = "Yash Agarwal";
$lang = "Java";
$date = date("Y-m-d");
$time = date("h:i:s A");

?>

<div class="container">

    <h1>I am <?= $name; ?></h1>

    <p><strong>Date:</strong> <?= $date; ?></p>

    <p><strong>Time:</strong> <?= $time; ?></p>

    <p><strong>My Favourite Programming Language:</strong> <?= $lang; ?></p>

    <img src="https://as2.ftcdn.net/jpg/03/92/02/65/1000_F_392026569_GY7ysbevJK4ZwYV1i9Jvmkf7gFNP79VD.jpg"
         alt="Java Image">

</div>

</body>
</html>