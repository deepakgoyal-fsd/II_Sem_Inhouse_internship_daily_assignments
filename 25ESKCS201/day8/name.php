<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h1>
        <?php echo "Hello, World!"; ?>
    </h1>
    <p>
        this is my paragraph
    </p>
    <h2> <?php echo "This is my page subtitle"; ?> </h2>
    
    <?php
        $name = "priyank";
        $age = 30;
        echo "<p>Name: $name</p>";
        echo "<p>Age: $age</p>";
    ?> 
    <?php
    $name = "priya";
    $college = "NIT pune";
    $branch = "Computer Science";
    ?>
    <h1>Hello, <?= $name ?></h1>
    <p><?= $college ?> | <?= $branch ?></p>
</body>
</html>