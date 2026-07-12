<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Performance Appraisal System</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            background: #198754;
            color: white;
            padding: 20px;
            text-align: center;
            margin: 0;
        }

        form {
            width: 450px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type=submit] {
            background: #198754;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background: #146c43;
        }

        .card {
            width: 500px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        }

        .card h2 {
            text-align: center;
            color: #198754;
        }

        .card table {
            border-collapse: collapse;
        }

        .card td {
            border: 1px solid #dee2e6;
        }

        .error {
            text-align: center;
            color: #dc3545;
            font-weight: bold;
        }

        footer {
            background: #198754;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 30px;
        }
    </style>
</head>

<body>

<h1>Employee Performance Appraisal System</h1>

<?php
// Initialize state trackers matching your core logic pattern
$worker = "";
$contact = "";
$division = "";
$facility = "";
$score = "";
$rating = "";
$message = "";

if (isset($_POST["evaluate"])) {
    $worker = $_POST["worker"];
    $contact = $_POST["contact"];
    $division = $_POST["division"];
    $facility = $_POST["facility"];
    $score = $_POST["score"];

    // Field presence validation check mapped directly to your architecture
    if ($worker == "" || $contact == "" || $division == "" || $facility == "" || $score == "") {
        $message = "Please fill all fields.";
    } else {
        // Sequential condition evaluations mapping your threshold matching engine
        if ($score >= 95) {
            $rating = "Outstanding (Exceeds Expectations)";
        } elseif ($score >= 80) {
            $rating = "Highly Effective";
        } elseif ($score >= 65) {
            $rating = "Proficient";
        } elseif ($score >= 50) {
            $rating = "Needs Development";
        } else {
            $rating = "Unsatisfactory";
        }
    }
}
?>

<form method="POST">
    <table>
        <tr>
            <td>Employee Name</td>
            <td><input type="text" name="worker" value="<?php echo htmlspecialchars($worker); ?>"></td>
        </tr>

        <tr>
            <td>Email Address</td>
            <td><input type="email" name="contact" value="<?php echo htmlspecialchars($contact); ?>"></td>
        </tr>

        <tr>
            <td>Division / Unit</td>
            <td>
                <select name="division">
                    <option value="">Select Division</option>
                    <option value="Engineering" <?php if ($division == "Engineering") echo "selected"; ?>>Engineering</option>
                    <option value="Operations" <?php if ($division == "Operations") echo "selected"; ?>>Operations</option>
                    <option value="Marketing" <?php if ($division == "Marketing") echo "selected"; ?>>Marketing</option>
                    <option value="Finance" <?php if ($division == "Finance") echo "selected"; ?>>Finance</option>
                    <option value="HR" <?php if ($division == "HR") echo "selected"; ?>>HR</option>
                </select>
            </td>
        </tr>

        <tr>
            <td>Office Facility Location</td>
            <td><input type="text" name="facility" value="<?php echo htmlspecialchars($facility); ?>"></td>
        </tr>

        <tr>
            <td>Evaluation Score (0-100)</td>
            <td><input type="number" step="0.1" name="score" value="<?php echo htmlspecialchars($score); ?>"></td>
        </tr>

        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="evaluate" value="Process Appraisal">
            </td>
        </tr>
    </table>
</form>

<?php
// Conditional message display logic blocks
if ($message != "") {
    echo "<p class='error'>" . htmlspecialchars($message) . "</p>";
}

// Result summary card generation block via standard output statements
if ($rating != "") {
    echo "<div class='card'>";
    echo "<h2>Review Summary: " . htmlspecialchars($worker) . "</h2>";
    echo "<table>";
    echo "<tr><td><b>Staff Name</b></td><td>" . htmlspecialchars($worker) . "</td></tr>";
    echo "<tr><td><b>Staff Email</b></td><td>" . htmlspecialchars($contact) . "</td></tr>";
    echo "<tr><td><b>Assigned Division</b></td><td>" . htmlspecialchars($division) . "</td></tr>";
    echo "<tr><td><b>Primary Facility</b></td><td>" . htmlspecialchars($facility) . "</td></tr>";
    echo "<tr><td><b>Metrics Score</b></td><td>" . htmlspecialchars($score) . "</td></tr>";
    echo "<tr><td><b>Performance Class</b></td><td>" . htmlspecialchars($rating) . "</td></tr>";
    echo "<tr><td><b>Processing Date</b></td><td>" . date("d-m-Y") . "</td></tr>";
    echo "</table>";
    echo "</div>";
}
?>

<footer>
    Employee Performance Appraisal System &copy; <?php echo date("Y"); ?>
</footer>

</body>
</html>
