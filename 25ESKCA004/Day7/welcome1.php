<!DOCTYPE html>
<html>
<head>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            width: 400px;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
            text-align: center;
        }

        h1 {
            color: darkblue;
        }

        p {
            font-size: 20px;
            color: #333;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>Welcome Page</h1>

    <p>
        <strong>Your Name:</strong>
        <?php
        echo "Bhavya Kothari";
        ?>
    </p>

    <p>
        <strong>Current Date:</strong>
        <?php
        echo date("Y-m-d H:i:s");
        ?>
    </p>
    <p>you are visiting from: <?=$_SERVER["REMOTE_ADDR"]

    <p>
        <strong>Favourite Programming Language:</strong>
        <?php
        echo "Java";
        ?>
    </p>

</div>

</body>
</html>