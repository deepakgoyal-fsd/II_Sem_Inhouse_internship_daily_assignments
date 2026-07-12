<?php
include "db_connect.php";

// Validation and the database write happen before any HTML is echoed,
// so header("Location: ...") below is still able to send a redirect
// (the original version tried to redirect after already printing markup,
// which PHP can't do once output has started).

$errors = [];

$name    = trim($_POST['name'] ?? '');
$college = trim($_POST['college'] ?? '');
$branch  = trim($_POST['branch'] ?? '');

if ($name === '')    $errors['name']    = "Name is required";
if ($college === '') $errors['college'] = "College is required";
if ($branch === '')  $errors['branch']  = "Branch is required";

if (count($errors) > 0) {
    header("Location: register1.php");
    exit;
}

// Prepared statement with bound parameters — the previous version built
// this query by concatenating $_POST values directly into the SQL string,
// which is a SQL-injection hole. This version never lets user input touch
// the query text.
$stmt = mysqli_prepare($conn, "INSERT INTO students (name, college, branch) VALUES (?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sss", $name, $college, $branch);
$insertOk = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Successful — SKIT Registration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
</head>
<body>

<?php include "header.php" ?>

<main class="page">
    <div class="ledger-card">
        <p class="ledger-card__eyebrow">Confirmation Slip</p>
        <h1 class="ledger-card__title">Registration Successful</h1>
        <p class="ledger-card__sub">
            <?= $insertOk ? "The record below has been filed." : "The details were received but the record could not be saved." ?>
        </p>

        <?php if (!$insertOk): ?>
            <div class="notice notice-error">
                Error: <?= htmlspecialchars(mysqli_error($conn)) ?>
            </div>
        <?php else: ?>
            <div class="notice notice-success">You have filled in the details below.</div>
        <?php endif; ?>

        <div class="receipt">
            <div class="receipt__row">
                <span class="receipt__label">Name</span>
                <span class="receipt__value"><?= htmlspecialchars($name) ?></span>
            </div>
            <div class="receipt__row">
                <span class="receipt__label">College</span>
                <span class="receipt__value"><?= htmlspecialchars($college) ?></span>
            </div>
            <div class="receipt__row">
                <span class="receipt__label">Branch</span>
                <span class="receipt__value"><?= htmlspecialchars($branch) ?></span>
            </div>
        </div>
    </div>
</main>

<?php include "footer.php" ?>
</body>
</html>
