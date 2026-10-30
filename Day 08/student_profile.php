<?php
$name = "Arjun Patel";
$college = "Engineering Institute";
$branch = "Information Technology";
$year = 3;
$bio = "Passionate about building scalable backend systems.";
$currentMonth = date("n");
$currentYear = date("Y");
if ($currentMonth < 6) {
    $academicYear = ($currentYear - 1) . "–" . $currentYear;
} else {
    $academicYear = $currentYear . "–" . ($currentYear + 1);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Student Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-5 bg-dark">
    <div class="card text-center mx-auto shadow-lg" style="width: 22rem; border-radius: 15px;">
        <div class="card-header bg-primary text-white" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
            <h4>Student ID</h4>
        </div>
        <div class="card-body">
            <h5 class="card-title text-primary fw-bold"><?= htmlspecialchars($name) ?></h5>
            <p class="mb-1"><strong><?= htmlspecialchars($college) ?></strong></p>
            <p class="text-muted mb-3"><?= htmlspecialchars($branch) ?> | Year <?= htmlspecialchars($year) ?></p>
            <span class="badge bg-secondary mb-3">Academic Year: <?= htmlspecialchars($academicYear) ?></span>
            <p class="card-text fst-italic">"<?= htmlspecialchars($bio) ?>"</p>
        </div>
    </div>
</body>

</html>