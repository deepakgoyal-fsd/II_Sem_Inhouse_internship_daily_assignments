<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Info Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php
    // User info
    $name = "Manasvi Maheshwari";

    // Date & time (clean format)
    date_default_timezone_set("Asia/Kolkata");
    $date = date("Y-m-d H:i:s");

    // IP address (safe fallback)
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';

    // Academic year logic
    $year = date("Y");
    $month = date("m");

    $prev_year = $year - 1;
    $next_year = $year + 1;

    if ($month < 7) {
        $academic_year = "$year-$next_year";
    } else {
        $academic_year = "$prev_year-$year";
    }
?>

<div class="container" style="text-align:center; margin-top:50px;">
    <h1>Hello World</h1>

```
<p><strong>Name:</strong> <?= htmlspecialchars($name) ?></p>
<p><strong>Date:</strong> <?= $date ?></p>
<p><strong>IP Address:</strong> <?= htmlspecialchars($ip) ?></p>
<p><strong>Academic Year:</strong> <?= $academic_year ?></p>
```

</div>

</body>
</html>