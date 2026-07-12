<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKIT Registration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
</head>
<body>

<?php include "header.php" ?>

<main class="page">
    <div class="ledger-card">
        <p class="ledger-card__eyebrow">Form 01 &middot; New Entry</p>
        <h1 class="ledger-card__title">Registration Form</h1>
        <p class="ledger-card__sub">Fill in the fields below in order. All three are required before the record can be filed.</p>

        <form action="process.php" method="POST">

            <div class="field-row">
                <span class="field-row__num">01</span>
                <div class="field-row__body">
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">02</span>
                <div class="field-row__body">
                    <label for="college">College</label>
                    <input type="text" id="college" name="college" placeholder="Enter your college">
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">03</span>
                <div class="field-row__body">
                    <label for="branch">Branch</label>
                    <input type="text" id="branch" name="branch" placeholder="Enter your branch">
                    <input type="hidden" name="id_hidden" value="1">
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="submit">File Registration</button>
        </form>
    </div>
</main>

<?php include "footer.php" ?>
</body>
</html>
