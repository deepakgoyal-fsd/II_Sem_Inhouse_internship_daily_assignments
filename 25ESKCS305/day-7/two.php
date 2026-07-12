<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
</head>
<body>
    <?php
    $name = "Sameer";
    $collage = "Skit";
    $branch = "cs";
    ?>

    <h1>Student Details</h1>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Collage:</strong> <?php echo $collage; ?></p>
    <p><strong>Branch:</strong> <?php echo $branch; ?></p>
    
    <hr><br>
    <h2>Hello, <?=  $name ?></h2>
    <p><?=  $collage ?> | <?= $branch ?></p>
</body>
</html>
