<?php
include("db_connect.php");
if(!isset($_GET['username']))
{
    echo "Portfolio not found";
    exit();
}
$username = $_GET['username'];
$sql = "SELECT users.full_name, users.username,
        portfolio.*
        FROM users
        JOIN portfolio
        ON users.id = portfolio.user_id
        WHERE users.username = '$username'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0)
{
    $data = mysqli_fetch_assoc($result);
    $user = [
        "full_name" => $data['full_name'],
        "username" => $data['username']
    ];
    $portfolio = $data;
}
else
{
    echo "Portfolio not found";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
<?php echo $user['full_name']; ?> | Portfolio
</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>
<section class="portfolio-hero">
<div class="container">
<h1>
<?php echo htmlspecialchars($user['full_name']); ?>
</h1>
<p class="hero-subtitle">
Computer Science Student
</p>
<p class="hero-description">
<?php echo htmlspecialchars($portfolio['about']); ?>
</p>
<div class="hero-buttons">
<a href="<?php echo $portfolio['github']; ?>"
target="_blank"
class="btn btn-light">
GitHub
</a>
<a href="<?php echo $portfolio['linkedin']; ?>"
target="_blank"
class="btn btn-outline-light">
LinkedIn
</a>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Education
</h2>
<p>
<?php echo htmlspecialchars($portfolio['education']); ?>
</p>
<div class="row mt-4">
<div class="col-md-6">
<strong>
Current Semester
</strong>
<p>
<?php echo $portfolio['current_sem']; ?>
</p>
</div>
<div class="col-md-6">
<strong>
CGPA
</strong>
<p>
<?php echo $portfolio['cgpa']; ?>
</p>
</div>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Skills
</h2>
<div class="skills-box">
<?php
$skills = explode(",", $portfolio['skills']);
foreach($skills as $skill)
{
if(trim($skill)!="")
{
?>
<span>
<?php echo htmlspecialchars(trim($skill)); ?>
</span>
<?php
}
}
?>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Projects
</h2>
<div class="portfolio-items">
<?php
$projects = explode("\n", $portfolio['projects']);
foreach($projects as $project)
{
if(trim($project)!="")
{
?>
<div class="item-card">
<?php echo htmlspecialchars(trim($project)); ?>
</div>
<?php
}
}
?>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Certifications
</h2>
<div class="portfolio-items">
<?php
$certifications = explode("\n", $portfolio['certifications']);
foreach($certifications as $certificate)
{
if(trim($certificate)!="")
{
?>
<div class="item-card">
<?php echo htmlspecialchars(trim($certificate)); ?>
</div>
<?php
}
}
?>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Internships
</h2>
<div class="portfolio-items">
<?php
$internships = explode("\n", $portfolio['internships']);
foreach($internships as $internship)
{
if(trim($internship)!="")
{
?>
<div class="item-card">
<?php echo htmlspecialchars(trim($internship)); ?>
</div>
<?php
}
}
?>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Achievements
</h2>
<div class="portfolio-items">
<?php
$achievements = explode("\n", $portfolio['achievements']);
foreach($achievements as $achievement)
{
if(trim($achievement)!="")
{
?>
<div class="item-card">
<?php echo htmlspecialchars(trim($achievement)); ?>
</div>
<?php
}
}
?>
</div>
</div>
</section>
<section class="container section-space">
<div class="section-card">
<h2>
Languages
</h2>
<p>
<?php echo htmlspecialchars($portfolio['languages']); ?>
</p>
</div>
</section>
<section class="container section-space mb-5">
<div class="section-card">
<h2>
Contact
</h2>
<p>
<strong>
Email:
</strong>
<?php echo htmlspecialchars($portfolio['contact_email']); ?>
</p>
<p>
<strong>
GitHub:
</strong>
<a href="<?php echo $portfolio['github']; ?>" target="_blank">
<?php echo $portfolio['github']; ?>
</a>
</p>
<p>
<strong>
LinkedIn:
</strong>
<a href="<?php echo $portfolio['linkedin']; ?>" target="_blank">
<?php echo $portfolio['linkedin']; ?>
</a>
</p>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>