<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        <?php echo "Drishti's php with php Intelephense." ?>
    </h1>
    <p>Paragraph</p>
    <h2> <?php echo "Date:7th July 2026 & Time:8:57am" ?> </h2>
    <h3> <? "Let's Echo This." ?> </h3>
    <h3> <?php echo "Let's Echo This." ."<br>";
    //Both the above lines perform sam work. But the first one is allowed when short open tag is on in php info.
    ?>
    <?php
    echo $_SERVER['REMOTE_ADDR'];
    //$_SESSION
    //$_COOKIE
    //$_POST
    //$_GET
    $student=["A","B","C"];
    $student= array ("A","B","C");
    echo $student[0];
    echo "<br>";
    echo "<pre>";
    print_r($student);
    echo "<br>";
    var_dump($student);
    echo "</pre>";
    date_default_timezone_set('Asia/Kolkata');
    echo date('l jS \of F Y h:i:s A');
    ?>
</body>
</html>