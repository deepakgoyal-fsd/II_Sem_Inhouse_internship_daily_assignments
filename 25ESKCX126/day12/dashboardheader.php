<?php session_start();

if(!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Websitet</title>
    <link href ="/day12/bootstrap.min.css" rel ="stylesheet">
</head>
<body>
  <header class ="bg-light border-bottom">
    <div class ="container">
        <div class ="d-flex justify-content-between align-items-center py-3">
            <!--LOGO-->   
            <img src ="/day12/images/logo.png" alt ="Logo" width="80">
            <!--Navigation-->
            <nav>
                <ul class ="nav">
                    <li class ="nav-item">
                        <a href ="/day12/index.php" class = "nav-link text-dark">home</a>
</li>
<li class="nav-item">
    <a href ="/day12/about.php" class=" nav-link text-dark">About Us</a>
</li>

<li class ="nav-item">
    <a href ="/day12/contact.php" class ="nav-link text-dark">Contact us</a>
</li>
</ul>
</nav>

<?php

include("db_connect.php");

$id = $_SESSION['user_id'];

$query = "SELECT name, profile_pic FROM user WHERE id='$id'";

$result = mysqli_query($conn, $query);

$currentUser = mysqli_fetch_assoc($result);


// Profile image path
if(!empty($currentUser['profile_pic'])){

    $profileImage = "/day12/" . $currentUser['profile_pic'];

}
else{

    $profileImage = "/day12/images/default.jpg";

}

?>

<div class="d-flex align-items-center">

    <!-- Profile Image -->
    <img 
    src="<?= $profileImage; ?>"
    width="45"
    height="45"
    class="rounded-circle me-2 border"
    style="object-fit:cover;"
    >


    <!-- User Name -->
    <span class="fw-bold me-3">
        <?= htmlspecialchars($currentUser['name']); ?>
    </span>


    <!-- Logout Button -->
    <a href="/day12/logout.php" class="btn btn-primary">
        Logout
    </a>

</div>
</div>
</div>
</header>