<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
   $name = "msc";
   $cgpa = 7.0;
   $branch = "DS";
   $currentTime = time();
   $formattedTime = date("Y-m-d H:i:s", $currentTime);
   
   ?>
   
   <h1> <?= $name?> </h1>
   <p> <?= $cgpa?></p>
    <p> <?= $branch?></p>
    
    <p>Current Time: <?= $formattedTime ?></p>


</body>
</html>