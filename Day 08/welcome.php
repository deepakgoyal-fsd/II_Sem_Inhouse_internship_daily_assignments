<?php
$name = "Chirag";
$date = date("Y-m-d");
$time = date("H:i:s");
$lang = "PHP";
$ip = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: sans-serif;
            background: #f0f0f0;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Welcome to PHP</h1>
        <p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
        <p><strong>Date:</strong> <?= htmlspecialchars($date) ?></p>
        <p><strong>Time:</strong> <?= htmlspecialchars($time) ?></p>
        <p><strong>Favourite Language:</strong> <?= htmlspecialchars($lang) ?></p>
        <p>You are visiting from: <?= htmlspecialchars($ip) ?></p>
    </div>
</body>

</html>