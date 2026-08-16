<?php

include "config.php";

// Fetch history records

if(isset($_GET["search"]) && $_GET["search"] != ""){

    $search = $_GET["search"];

    $sql = "SELECT * FROM history
            WHERE email LIKE '%$search%'
            ORDER BY id DESC";

}
else{

    $sql = "SELECT * FROM history
            ORDER BY id DESC";

}

$result = $conn->query($sql);
/* ===========================
      DASHBOARD COUNTS
=========================== */

// Total Emails
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM history");
$totalEmails = $totalResult->fetch_assoc()['total'];

// Valid Emails
$validResult = $conn->query("SELECT COUNT(*) AS total FROM history WHERE status='Valid'");
$validEmails = $validResult->fetch_assoc()['total'];

// Invalid Emails
$invalidResult = $conn->query("SELECT COUNT(*) AS total FROM history WHERE status='Invalid'");
$invalidEmails = $invalidResult->fetch_assoc()['total'];

// Gmail Users
$gmailResult = $conn->query("SELECT COUNT(*) AS total FROM history WHERE email LIKE '%@gmail.com'");
$gmailUsers = $gmailResult->fetch_assoc()['total'];

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Email Validation History</title>

<link rel="stylesheet" href="style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

<div class="card">

<div class="hero">

<h1>Email Validation History</h1>

<p class="subtitle">
Previously checked email records
</p>
<div class="dashboard">

<div class="dashboard-card">

<i>📧</i>

<h2><?php echo $totalEmails; ?></h2>

<p>Total Emails</p>

</div>

<div class="dashboard-card">

<i>✅</i>

<h2><?php echo $validEmails; ?></h2>

<p>Valid Emails</p>

</div>

<div class="dashboard-card">

<i>❌</i>

<h2><?php echo $invalidEmails; ?></h2>

<p>Invalid Emails</p>

</div>

<div class="dashboard-card">

<i>🌐</i>

<h2><?php echo $gmailUsers; ?></h2>

<p>Gmail Users</p>

</div>

</div>

</div>

<!-- ===========================
        SEARCH HISTORY
=========================== -->

<form method="GET" class="search-box">

<input
type="text"
name="search"
placeholder="Search Email..."
value="<?php echo $_GET['search'] ?? ''; ?>">

<button type="submit">
Search
</button>

</form>

<table>

<tr>

<th>ID</th>
<th>Email</th>
<th>Provider</th>
<th>Quality</th>
<th>Security</th>
<th>Status</th>
<th>Date</th>
<th>Action</th>

</tr>

<?php

if($result->num_rows > 0){

while($row = $result->fetch_assoc()){

?>

<tr>

<td>

<?php echo $row["id"]; ?>

</td>

<td>

<?php echo htmlspecialchars($row["email"]); ?>

</td>

<td>

<?php echo htmlspecialchars($row["provider"]); ?>

</td>

<td>

<?php echo $row["quality"]; ?>%

</td>

<td>

<?php echo $row["security"]; ?>%

</td>

<td>

<?php

if($row["status"] == "Valid"){

    echo "<span class='badge-success'>Valid</span>";

}
else{

    echo "<span class='badge-danger'>Invalid</span>";

}

?>

</td>

<td>

<?php echo $row["created_at"]; ?>

</td>

<td>

<a href="delete_history.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this record?');">

<button class="delete-btn">

Delete

</button>

</a>

</td>

</tr>

<?php

}

}
else{

?>

<tr>

<td colspan="8">

No History Found

</td>

</tr>

<?php

}

?>

</table>

<br><br>

<a href="index.php">

<button class="back-btn">

← Back To Validator

</button>

</a>

</div>

</div>

</body>

</html>