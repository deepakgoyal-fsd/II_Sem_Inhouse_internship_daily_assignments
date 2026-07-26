<?php require_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test History - Typing Speed Test</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <style>
        .table-wrapper {
            overflow-x: auto;
            margin-top: 25px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
            min-width: 600px;
        }

        th {
            background: rgba(255,255,255,0.1);
            font-weight: 600;
            padding: 14px 15px;
            text-align: left;
            border-bottom: 2px solid rgba(255,255,255,0.2);
        }

        td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        tr:hover {
            background: rgba(255,255,255,0.08);
        }

        .no-records {
            text-align: center;
            color: #e5e7eb;
            padding: 60px 0;
            font-size: 18px;
        }

        .btn-nav {
            display: inline-block;
            background: #10b981;
            color: #fff;
            padding: 12px 30px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: .3s;
            margin-top: 25px;
        }

        .btn-nav:hover {
            background: #059669;
            transform: translateY(-3px);
        }

        .btn-nav-secondary {
            background: rgba(255,255,255,0.15);
            margin-left: 10px;
        }

        .btn-nav-secondary:hover {
            background: rgba(255,255,255,0.25);
        }

        @media(max-width:768px){
            th, td {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <h1>📊 Test History</h1>
    <p class="subtitle">All your previous typing test results</p>

    <div class="table-wrapper">

        <?php
        // Fetch all records ordered by newest first
        $result = mysqli_query($conn, "SELECT * FROM results ORDER BY created_at DESC");

        if (mysqli_num_rows($result) > 0) {
            echo '<table>';
            echo '<thead><tr>';
            echo '<th>Name</th><th>WPM</th><th>Accuracy</th>';
            echo '<th>Correct Words</th><th>Characters Typed</th>';
            echo '<th>Duration (sec)</th><th>Date</th>';
            echo '</tr></thead><tbody>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row['username']) . '</td>';
                echo '<td>' . htmlspecialchars($row['wpm']) . '</td>';
                echo '<td>' . htmlspecialchars($row['accuracy']) . '%</td>';
                echo '<td>' . htmlspecialchars($row['correct_words']) . '</td>';
                echo '<td>' . htmlspecialchars($row['characters_typed']) . '</td>';
                echo '<td>' . htmlspecialchars($row['duration']) . '</td>';
                echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
        } else {
            echo '<p class="no-records">No records found yet. Take a typing test to see your results here!</p>';
        }

        mysqli_close($conn);
        ?>

    </div>

    <div style="text-align:center;">
        <a href="index.php" class="btn-nav">⬅ Back to Test</a>
        <a href="result.php" class="btn-nav btn-nav-secondary">📄 Latest Result</a>
    </div>

</div>

</body>
</html>