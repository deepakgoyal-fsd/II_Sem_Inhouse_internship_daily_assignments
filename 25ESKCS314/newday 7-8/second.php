<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
$name = "shambhavi agarwal"; 
$college = "SKIT";
$branch = "CSE";
?>
<h1>Hello, <?= $name ?></h1>
<h2><?= $college ?> | <?= $branch ?></h2>
<form action="process.php" method="post">

    <input type="text" name="name" placeholder="Enter your name"><br><br>
    <input type="text" name="college" placeholder="Enter your college"><br><br>
    <input type="text" name="branch" placeholder="Enter your branch"><br><br>
    <input type="submit" value="Submit">
</form>
</body>
</html>