<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
    <?php echo "This is my page main title" ?>
    </h1>
    <p>
        <?php echo " this is my  html file" ?>
    </p>
    <h3>
        <!-- <?php phpinfo(); ?> -->
    </h3>
    <?php 
    $name = "divyanshi ";
    ?>
    <h3> <?php echo $name; ?> 
</h3>
<h3>
 <?php   
$student = ["Divyanshi", "Ram", "Aman"];

echo $student[1];
echo "<br><br>";
echo $student[2];
echo "<br><br>";
echo $student[0];
echo "<br><br>";
?>
</h3>
<?php 
echo date('1 js \of F Y h:i:s A');
?>
</body>
</html>