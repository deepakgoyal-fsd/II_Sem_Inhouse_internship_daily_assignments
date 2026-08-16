<?php

include "config.php";

/*======================================================
        EMAIL ANALYTICS DASHBOARD
======================================================*/

// Total Emails
$totalQuery = $conn->query(
"SELECT COUNT(*) AS total FROM history"
);

$total = $totalQuery->fetch_assoc()["total"];


// Valid Emails
$validQuery = $conn->query(
"SELECT COUNT(*) AS valid FROM history
WHERE status='Valid'"
);

$valid = $validQuery->fetch_assoc()["valid"];


// Invalid Emails
$invalidQuery = $conn->query(
"SELECT COUNT(*) AS invalid FROM history
WHERE status='Invalid'"
);

$invalid = $invalidQuery->fetch_assoc()["invalid"];


// Average Quality
$qualityQuery = $conn->query(
"SELECT AVG(quality) AS avg_quality
FROM history"
);

$averageQuality = round(
$qualityQuery->fetch_assoc()["avg_quality"] ?? 0
);


// Most Used Provider
$providerQuery = $conn->query(
"SELECT provider,
COUNT(*) AS total
FROM history
GROUP BY provider
ORDER BY total DESC
LIMIT 1"
);

if($providerQuery->num_rows>0){

    $providerData = $providerQuery->fetch_assoc();

    $topProvider = $providerData["provider"];

}
else{

    $topProvider="No Data";

}


/*======================================================
                CHART DATA
======================================================*/

// Gmail
$gmailQuery = $conn->query(
"SELECT COUNT(*) AS total
FROM history
WHERE email LIKE '%@gmail.com'"
);

$gmail = $gmailQuery->fetch_assoc()["total"];


// Yahoo
$yahooQuery = $conn->query(
"SELECT COUNT(*) AS total
FROM history
WHERE email LIKE '%@yahoo.%'"
);

$yahoo = $yahooQuery->fetch_assoc()["total"];


// Outlook
$outlookQuery = $conn->query(
"SELECT COUNT(*) AS total
FROM history
WHERE email LIKE '%@outlook.%'"
);

$outlook = $outlookQuery->fetch_assoc()["total"];


// Others
$others = $total - ($gmail+$yahoo+$outlook);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Email Analytics Dashboard</title>

<link rel="stylesheet" href="style.css">

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</head>

<body>

<div class="container">

<div class="card">

<h1>

📊 Email Analytics Dashboard

</h1>

<p class="subtitle">

Complete Email Validation Statistics

</p>

<div class="dashboard">

<div class="dashboard-card">

<h2>

<?php echo $total; ?>

</h2>

<p>

Total Emails

</p>

</div>

<div class="dashboard-card">

<h2>

<?php echo $valid; ?>

</h2>

<p>

Valid Emails

</p>

</div>

<div class="dashboard-card">

<h2>

<?php echo $invalid; ?>

</h2>

<p>

Invalid Emails

</p>

</div>

<div class="dashboard-card">

<h2>

<?php echo $averageQuality; ?>%

</h2>

<p>

Average Quality

</p>

</div>

</div>


<div class="info-box">

<h2>

🌐 Most Used Provider

</h2>

<p>

<?php echo htmlspecialchars($topProvider); ?>

</p>

</div>


<div class="charts">

<div class="chart-box">

<h2>

Email Providers

</h2>

<canvas id="providerChart"></canvas>

</div>

<div class="chart-box">

<h2>

Validation Result

</h2>

<canvas id="statusChart"></canvas>

</div>

</div>
<script>

// ==============================
// Provider Chart
// ==============================

const providerChart = new Chart(

document.getElementById("providerChart"),

{

type:"pie",

data:{

labels:[

"Gmail",
"Yahoo",
"Outlook",
"Others"

],

datasets:[{

data:[

<?php echo $gmail; ?>,
<?php echo $yahoo; ?>,
<?php echo $outlook; ?>,
<?php echo $others; ?>

],

backgroundColor:[

"#00F5FF",
"#FFD54F",
"#4CAF50",
"#FF6B6B"

],

borderWidth:2

}]

},

options:{

responsive:true,

plugins:{

legend:{

position:"bottom"

}

}

}

}

);


// ==============================
// Status Chart
// ==============================

const statusChart = new Chart(

document.getElementById("statusChart"),

{

type:"doughnut",

data:{

labels:[

"Valid",
"Invalid"

],

datasets:[{

data:[

<?php echo $valid; ?>,
<?php echo $invalid; ?>

],

backgroundColor:[

"#22C55E",
"#EF4444"

],

borderWidth:2

}]

},

options:{

responsive:true,

plugins:{

legend:{

position:"bottom"

}

}

}

}

);

</script>


<br><br>

<a href="history.php">

<button class="back-btn">

📜 View History

</button>

</a>

&nbsp;&nbsp;

<a href="index.php">

<button class="back-btn">

🏠 Back To Validator

</button>

</a>


</div>

</div>

</body>

</html>