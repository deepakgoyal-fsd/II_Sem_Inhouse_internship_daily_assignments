<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results - Typing Speed Test</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
    <style>
        .badge {
            display: inline-block;
            background: rgba(255,255,255,0.15);
            padding: 8px 18px;
            border-radius: 30px;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .btn-primary {
            display: inline-block;
            background: #10b981;
            color: #fff;
            border: none;
            outline: none;
            padding: 14px 35px;
            font-size: 17px;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            text-decoration: none;
            transition: .3s;
            margin-top: 25px;
        }
        .btn-primary:hover {
            background: #059669;
            transform: translateY(-3px);
        }
        .btn-secondary {
            background: rgba(255,255,255,0.15);
        }
        .btn-secondary:hover {
            background: rgba(255,255,255,0.25);
        }
        .result-box-5 {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 700px;
            margin: 0 auto;
        }
        .history-section {
            margin-top: 40px;
            border-top: 1px solid rgba(255,255,255,0.15);
            padding-top: 30px;
            text-align: left;
        }
        .history-section h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        .history-table {
            width: 100%;
            border-collapse: collapse;
            color: #fff;
            min-width: 550px;
        }
        .history-table th {
            background: rgba(255,255,255,0.1);
            font-weight: 600;
            padding: 12px 15px;
            text-align: left;
            border-bottom: 2px solid rgba(255,255,255,0.2);
        }
        .history-table td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .history-table tr:hover {
            background: rgba(255,255,255,0.08);
        }
        .no-records {
            text-align: center;
            color: #e5e7eb;
            padding: 40px 0;
            font-size: 16px;
        }
        .btn-group-row {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }
        @media(max-width:768px){
            .result-box-5 { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="container" style="text-align:center;">

    <h1>✅ Test Completed!</h1>
    <span class="badge">Here are your results</span>

    <div class="result-box-5">

        <div class="card">
            <h2>
                <?php
                    $time = isset($_POST['time']) ? htmlspecialchars($_POST['time']) : '0';
                    echo $time;
                ?>
            </h2>
            <p>Duration (sec)</p>
        </div>

        <div class="card">
            <h2>
                <?php
                    $speed = isset($_POST['speed']) ? htmlspecialchars($_POST['speed']) : '0';
                    echo $speed;
                ?>
            </h2>
            <p>Typing Speed (WPM)</p>
        </div>

        <div class="card">
            <h2>
                <?php
                    $accuracy = isset($_POST['accuracy']) ? htmlspecialchars($_POST['accuracy']) : '0';
                    echo $accuracy . '%';
                ?>
            </h2>
            <p>Accuracy</p>
        </div>

        <div class="card">
            <h2>
                <?php
                    $correctWords = isset($_POST['correctWords']) ? htmlspecialchars($_POST['correctWords']) : '0';
                    echo $correctWords;
                ?>
            </h2>
            <p>Correct Words</p>
        </div>

        <div class="card">
            <h2>
                <?php
                    $totalChars = isset($_POST['totalChars']) ? htmlspecialchars($_POST['totalChars']) : '0';
                    echo $totalChars;
                ?>
            </h2>
            <p>Characters Typed</p>
        </div>

    </div>

    <?php
    // Show user's previous results from the database
    $historyUsername = isset($_SESSION['username']) ? $_SESSION['username'] : '';

    if ($historyUsername !== '') {
        require_once "db.php";

        if ($conn) {
            $stmt = mysqli_prepare($conn,
                "SELECT created_at, duration, wpm, accuracy, correct_words, characters_typed
                 FROM results
                 WHERE username = ?
                 ORDER BY created_at DESC"
            );

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "s", $historyUsername);
                mysqli_stmt_execute($stmt);
                $historyResult = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($historyResult) > 0) {
                    echo '<div class="history-section">';
                    echo '<h2>📊 Your Previous Results</h2>';
                    echo '<div class="table-wrapper">';
                    echo '<table class="history-table">';
                    echo '<thead><tr>';
                    echo '<th>Date</th><th>Duration</th><th>WPM</th><th>Accuracy</th><th>Correct Words</th><th>Chars Typed</th>';
                    echo '</tr></thead><tbody>';

                    while ($row = mysqli_fetch_assoc($historyResult)) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['created_at']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['duration']) . 's</td>';
                        echo '<td>' . htmlspecialchars($row['wpm']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['accuracy']) . '%</td>';
                        echo '<td>' . htmlspecialchars($row['correct_words']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['characters_typed']) . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody></table>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="history-section">';
                    echo '<p class="no-records">No previous records found for <strong>' . htmlspecialchars($historyUsername) . '</strong>.</p>';
                    echo '</div>';
                }

                mysqli_stmt_close($stmt);
            }

            mysqli_close($conn);
        }
    }
    ?>

    <div class="btn-group-row">
        <a href="index.php" class="btn-primary">🔄 Try Again</a>
        <a href="clear_session.php" class="btn-primary btn-secondary">🆕 New Session</a>
    </div>

    <div style="margin-top:20px;">
        <a href="history.php" style="color:rgba(255,255,255,0.6);text-decoration:none;font-size:14px;transition:.3s;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='rgba(255,255,255,0.6)'">📊 View All History</a>
    </div>

</div>

</body>
</html>
