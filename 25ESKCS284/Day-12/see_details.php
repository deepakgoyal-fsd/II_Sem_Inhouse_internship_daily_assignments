<?php
session_start();

include "database.php";
include "header.php";

if (!isset($_SESSION["student_id"])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION["student_id"];

// Fetch user data
$sql1 = "SELECT * FROM user WHERE id='$student_id'";
$result1 = mysqli_query($conn, $sql1);
$user = mysqli_fetch_assoc($result1);

// Fetch student details
$sql2 = "SELECT * FROM student_details WHERE student_id='$student_id'";
$result2 = mysqli_query($conn, $sql2);
$details = mysqli_fetch_assoc($result2);

if (!$details) {
    $details = [];
}
?>

<div style="
max-width:850px;
margin:50px auto;
background:#fff;
padding:35px;
border-radius:15px;
box-shadow:0 8px 25px rgba(0,0,0,.15);
font-family:Arial,sans-serif;">

    <h2 style="
    text-align:center;
    color:#2563eb;
    margin-bottom:30px;
    font-size:36px;">
        👤 My Profile
    </h2>

    <table style="
    width:100%;
    border-collapse:collapse;
    font-size:17px;">

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;width:35%;">Name</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $user["username"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Email</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $user["email"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Mobile</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $user["mobileno"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Gender</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["gender"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Age</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["age"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">10th Marks</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["tenth"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">12th Marks</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["twelfth"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">College</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["college"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Course</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["course"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Branch</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["branch"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Year</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["year"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">CGPA</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["cgpa"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Hobbies</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["hobbies"] ?? "Not Added"; ?></td>
        </tr>

        <tr>
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Address</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["address"] ?? "Not Added"; ?></td>
        </tr>

        <tr style="background:#f5f7ff;">
            <th style="padding:14px;text-align:left;border:1px solid #ddd;">Marital Status</th>
            <td style="padding:14px;border:1px solid #ddd;"><?= $details["married"] ?? "Not Added"; ?></td>
        </tr>

    </table>

    <div style="text-align:center;margin-top:30px;">

        <a href="dashboard.php"
        style="
        background:#2563eb;
        color:white;
        text-decoration:none;
        padding:14px 35px;
        border-radius:8px;
        font-size:17px;
        font-weight:bold;
        display:inline-block;">
            ⬅ Back to Dashboard
        </a>

    </div>

</div>
<?php
include "footer.php";
?>