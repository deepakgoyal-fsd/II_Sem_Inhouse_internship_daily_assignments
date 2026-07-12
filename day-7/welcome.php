<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Welcome to My PHP Page</h1>

    <div class="card">
        <h2>My Information</h2>

        <p>
            <strong>Name :</strong>
            Bhavya Mathur
        </p>

        <p>
            <strong>Current Date :</strong>
            <?php echo date("Y-m-d"); ?>
        </p>

        <p>
            <strong>Current Time :</strong>
            <?php echo date("H:i:s"); ?>
        </p>

        <p>
            <strong>Favourite Programming Language :</strong>
            PHP
        </p>

        <p>
            <strong>Your IP Address :</strong>
            <?php echo $_SERVER['REMOTE_ADDR']; ?>
        </p>

    </div>

</div>

</body>
</html>