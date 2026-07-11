<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php
echo "This is first page";
?>
 </h1>
<h3>
     <?php
phpinfo();
?>


</h3>
<h2>
        <?php
$name= "Saksham";
echo $name;
?>
<br>
<?php
echo "Today is " . date("Y/m/d") . "<br>";
echo date('l, F j, Y');
?>
</h2>
<h2>
    <?php
    $name="Saksham";
    $college="skit";
    $branch="cse";
    ?>
    Hello <?= $name ?>
    <p><?= $college ?> | <?= $branch ?></p>
</h2>

</body>
</html>