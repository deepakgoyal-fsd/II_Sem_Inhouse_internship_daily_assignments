<?php
session_start();
include "../db.php";

if (!isset($_SESSION["admin_id"])) {
    header("Location: login.php");
    exit;
}

$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM conversion_logs");
$total_row = mysqli_fetch_assoc($total_result);
$total_conversions = $total_row["total"];
$today_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM conversion_logs WHERE DATE(created_at) = CURDATE()");
$today_row = mysqli_fetch_assoc($today_result);
$today_conversions = $today_row["total"];
$logs_result = mysqli_query($conn, "SELECT * FROM conversion_logs ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="admin-wrapper">
        <div class="top-bar">
            <h1>Admin Dashboard</h1>
            <a class="logout-link" href="logout.php">Logout</a>
        </div>

        <p>Logged in as: <strong><?php echo htmlspecialchars($_SESSION["admin_username"]); ?></strong></p>

        <p>
            Total conversions: <strong><?php echo $total_conversions; ?></strong> &nbsp; | &nbsp;
            Today: <strong><?php echo $today_conversions; ?></strong>
        </p>

        <h2>User Activity Log</h2>

        <table>
            <tr>
                <th>#</th>
                <th>From</th>
                <th>To</th>
                <th>Amount</th>
                <th>Converted Amount</th>
                <th>Rate</th>
                <th>IP Address</th>
                <th>Date/Time</th>
            </tr>

            <?php if (mysqli_num_rows($logs_result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($logs_result)) { ?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo htmlspecialchars($row["from_currency"]); ?></td>
                        <td><?php echo htmlspecialchars($row["to_currency"]); ?></td>
                        <td><?php echo $row["amount"]; ?></td>
                        <td><?php echo $row["converted_amount"]; ?></td>
                        <td><?php echo $row["rate"]; ?></td>
                        <td><?php echo htmlspecialchars($row["ip_address"]); ?></td>
                        <td><?php echo $row["created_at"]; ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="8">No activity yet.</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>