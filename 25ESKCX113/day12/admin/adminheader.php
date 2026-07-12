<?php

session_start();

if(!isset($_SESSION['user_id']) || $_SESSION['user_role'] != "admin"){

    header("Location: ../login.php");
    exit();

}

?>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Panel</title>

<link href="../bootstrap.min.css" rel="stylesheet">

</head>


<body>


<header class="bg-light border-bottom">

<div class="container">

<div class="d-flex justify-content-between align-items-center py-3">


<img src="../images/logo.png" width="80">


<nav>

<ul class="nav">

<li class="nav-item">

<a href="/day12/admin/admindashboard.php" class="nav-link text-dark">
Dashboard
</a>

</li>


<li class="nav-item">

<a href="/day12/index.php" class="nav-link text-dark">
Website
</a>

</li>

</ul>

</nav>


<?php

include("../db_connect.php");

$id = $_SESSION['user_id'];

$query = "SELECT name, profile_pic FROM user WHERE id='$id'";

$result = mysqli_query($conn,$query);

$currentUser = mysqli_fetch_assoc($result);



if(!empty($currentUser['profile_pic'])){

    $profileImage = "/day12/" . $currentUser['profile_pic'];

}
else{

    $profileImage = "/day12/images/default.jpg";

}

?>


<div class="d-flex align-items-center">


<img 
src="<?= $profileImage; ?>"
width="45"
height="45"
class="rounded-circle border me-2"
style="object-fit:cover;"
>


<span class="fw-bold me-3">

<?= htmlspecialchars($currentUser['name']); ?>

</span>



<a href="/day12/logout.php" class="btn btn-primary">

Logout

</a>


</div>


</div>

</div>

</header>