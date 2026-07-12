<!-- <?php
echo "Hello World";
phpinfo();
$name = "Rahul<br>";
echo $name;
$student = ["Rahul", "Jitesh", "Ravi"];
print_r($student);

echo $student[1];


print "<br>hello";
 ?> -->

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
        echo "Namaste Universe";
        ?>

        <?php
date_default_timezone_set("Asia/Kolkata");

echo "Today is " . date("l, d F Y");
echo "<br>";
echo "Current Time: " . date("h:i:s A");
?>
    </h1>
</body>
</html>