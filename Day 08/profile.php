<?php
$name = "Priya Sharma";
$college = "MIT Pune";
$branch = "Computer Engineering";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5 bg-light">
    <div class="card shadow" style="width: 18rem; margin: auto;">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= htmlspecialchars($college) ?></h6>
            <p class="card-text"><?= htmlspecialchars($branch) ?></p>
        </div>
    </div>
</body>

</html>