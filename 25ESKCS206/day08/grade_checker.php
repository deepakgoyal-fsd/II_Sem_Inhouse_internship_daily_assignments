<?php
$cgpa = "";
$message = "";
$alertClass = "";
$statusTitle = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cgpa = isset($_POST['cgpa']) ? trim($_POST['post_cgpa'] ?? $_POST['cgpa']) : '';

    if ($cgpa !== "") {
        $score = (float)$cgpa;

        if ($score >= 9.0 && $score <= 10.0) {
            $alertClass = "alert-success";
            $statusTitle = "Excellent";
            $message = "Outstanding academic performance! Keep setting the bar high.";
        } elseif ($score >= 8.0 && $score < 9.0) {
            $alertClass = "alert-primary";
            $statusTitle = "Very Good";
            $message = "Great job! You have demonstrated strong understanding and consistency.";
        } elseif ($score >= 6.5 && $score < 8.0) {
            $alertClass = "alert-warning";
            $statusTitle = "Good";
            $message = "Solid work. With a little more focus, you can push into the top tier.";
        } else {
            $alertClass = "alert-danger";
            $statusTitle = "Keep Improving";
            $message = "Don't give up! Review weak core areas and seek guidance to climb back up.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Grade Checker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .grade-card {
            max-width: 480px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }
        .form-control {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
            font-size: 1.1rem;
        }
        .form-control:focus {
            background-color: #0f172a;
            border-color: #38bdf8;
            color: #f8fafc;
            box-shadow: 0 0 0 0.25rem rgba(56, 189, 248, 0.25);
        }
    </style>
</head>
<body>

    <div class="grade-card p-4 m-3">
        <div class="text-center mb-4">
            <h2 class="fw-bold text-info m-0">Grade Checker</h2>
            <p class="text-muted small mt-1 mb-0">Evaluate academic standing instantly</p>
        </div>

        <form action="" method="POST" class="mb-4">
            <div class="mb-3">
                <label for="cgpa" class="form-label text-muted small text-uppercase fw-bold">Enter CGPA</label>
                <input type="number" step="0.01" min="0" max="10" class="form-control text-center" id="cgpa" name="cgpa" value="<?php echo htmlspecialchars($cgpa); ?>" placeholder="e.g. 8.7" required>
            </div>
            <button type="submit" class="btn btn-info w-100 fw-bold text-dark py-2">Check Performance</button>
        </form>

        <?php if ($message !== ""): ?>
            <div class="alert <?php echo $alertClass; ?> border-0 shadow-sm m-0 p-3" role="alert">
                <h5 class="alert-heading fw-bold mb-1"><?php echo $statusTitle; ?>!</h5>
                <p class="mb-0 small opacity-90"><?php echo $message; ?></p>
            </div>
        <?php endif; ?>
    </div>

</body>
</html>