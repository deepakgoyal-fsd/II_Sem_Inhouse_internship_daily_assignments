<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Portal</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }

        .header-banner {
            background-color: #1e40af;
            color: #ffffff;
            text-align: center;
            padding: 25px 15px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .header-banner h1 {
            font-size: 24px;
            font-weight: 600;
        }

        .main-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .form-card {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05), 0 1px 3px rgba(0,0,0,0.1);
        }

        .form-layout {
            width: 100%;
        }

        .form-layout td {
            padding: 10px 5px;
            vertical-align: middle;
        }

        .form-layout td:first-child {
            width: 30%;
            font-weight: 600;
            color: #4b5563;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #cbd5e1;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus, select:focus {
            border-color: #2563eb;
        }

        .submit-btn {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.2s;
        }

        .submit-btn:hover {
            background-color: #1d4ed8;
        }

        .error-msg {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 12px;
            border-radius: 6px;
            text-align: center;
            margin-top: 20px;
            font-weight: 500;
            border: 1px solid #fca5a5;
        }

        .profile-card {
            background-color: #ffffff;
            margin-top: 30px;
            margin-bottom: 40px;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #2563eb;
        }

        .profile-card h2 {
            color: #1e40af;
            font-size: 20px;
            margin-bottom: 15px;
            text-align: center;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 10px;
            border-bottom: 1px solid #f1f5f9;
            font-size: 14px;
        }

        .data-table tr:last-child td {
            border-bottom: none;
        }

        .data-table td.label {
            font-weight: 600;
            color: #64748b;
            width: 40%;
        }

        footer {
            background-color: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 20px;
            font-size: 13px;
            margin-top: 60px;
        }
    </style>
</head>
<body>

<div class="header-banner">
    <h1>Student Registration & Verification</h1>
</div>

<div class="main-container">

    <?php
    // Initialize clean input variables
    $studentName = "";
    $studentEmail = "";
    $selectedBranch = "";
    $collegeName = "";
    $cgpaValue = "";
    $finalGrade = "";
    $errorMessage = "";

    if (isset($_POST["btn_register"])) {
        $studentName = trim($_POST["txt_name"]);
        $studentEmail = trim($_POST["txt_email"]);
        $selectedBranch = $_POST["sel_branch"];
        $collegeName = trim($_POST["txt_college"]);
        $cgpaValue = $_POST["txt_cgpa"];

        // Basic presence verification
        if ($studentName == "" || $studentEmail == "" || $selectedBranch == "" || $collegeName == "" || $cgpaValue == "") {
            $errorMessage = "Validation Error: Please fill up all required fields.";
        } else {
            // Calculate grade classification based on score
            if ($cgpaValue >= 9.0) {
                $finalGrade = "A+";
            } elseif ($cgpaValue >= 8.0) {
                $finalGrade = "A";
            } elseif ($cgpaValue >= 7.0) {
                $finalGrade = "B";
            } elseif ($cgpaValue >= 6.0) {
                $finalGrade = "C";
            } else {
                $finalGrade = "D";
            }
        }
    }
    ?>

    <div class="form-card">
        <form method="POST" action="">
            <table class="form-layout">
                <tr>
                    <td><label>Name</label></td>
                    <td><input type="text" name="txt_name" value="<?php echo htmlspecialchars($studentName); ?>"></td>
                </tr>
                <tr>
                    <td><label>Email</label></td>
                    <td><input type="email" name="txt_email" value="<?php echo htmlspecialchars($studentEmail); ?>"></td>
                </tr>
                <tr>
                    <td><label>Branch</label></td>
                    <td>
                        <select name="sel_branch">
                            <option value="">-- Select --</option>
                            <option value="CSE" <?php if($selectedBranch == "CSE") echo "selected"; ?>>CSE</option>
                            <option value="IT" <?php if($selectedBranch == "IT") echo "selected"; ?>>IT</option>
                            <option value="ECE" <?php if($selectedBranch == "ECE") echo "selected"; ?>>ECE</option>
                            <option value="ME" <?php if($selectedBranch == "ME") echo "selected"; ?>>ME</option>
                            <option value="CE" <?php if($selectedBranch == "CE") echo "selected"; ?>>CE</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label>College</label></td>
                    <td><input type="text" name="txt_college" value="<?php echo htmlspecialchars($collegeName); ?>"></td>
                </tr>
                <tr>
                    <td><label>CGPA</label></td>
                    <td><input type="number" step="0.01" min="0" max="10" name="txt_cgpa" value="<?php echo htmlspecialchars($cgpaValue); ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" style="padding-top: 15px;">
                        <input type="submit" name="btn_register" value="Submit Information" class="submit-btn">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <?php
    // Output error message box if triggered
    if ($errorMessage != "") {
        echo "<div class='error-msg'>$errorMessage</div>";
    }

    // Output dynamic confirmation card if validation passes
    if ($finalGrade != "") {
        echo "<div class='profile-card'>";
        echo "<h2>Registration Confirmation</h2>";
        echo "<table class='data-table'>";
        echo "<tr><td class='label'>Student Name</td><td>" . htmlspecialchars($studentName) . "</td></tr>";
        echo "<tr><td class='label'>Email Address</td><td>" . htmlspecialchars($studentEmail) . "</td></tr>";
        echo "<tr><td class='label'>Academic Branch</td><td>" . htmlspecialchars($selectedBranch) . "</td></tr>";
        echo "<tr><td class='label'>College Name</td><td>" . htmlspecialchars($collegeName) . "</td></tr>";
        echo "<tr><td class='label'>Current CGPA</td><td>" . htmlspecialchars($cgpaValue) . "</td></tr>";
        echo "<tr><td class='label'>Assigned Grade</td><td><strong>$finalGrade</strong></td></tr>";
        echo "<tr><td class='label'>Generation Date</td><td>" . date("d-m-Y") . "</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    ?>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student Portal Management System. All Rights Reserved.
</footer>

</body>
</html>
