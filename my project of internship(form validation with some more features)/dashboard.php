<?php

session_start();
include "db_connect.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$email = $_SESSION['user'];

$sql = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>

<!-- <link rel="stylesheet" href="dashboard.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">


</head>
<style>
  body{
    background-image: url("background.jpg");
    font-family:Poppins,sans-serif;
}

.dashboard{

    width:600px;

    margin:50px auto;

    background:rgb(189, 194, 86);

    padding:30px;

    border-radius:15px;

    text-align:center;

    box-shadow:0px 0px 20px rgba(0,0,0,.2);

}

img{

width:150px;

height:150px;

border-radius:50%;

object-fit:cover;

margin:20px;

}

p{

font-size:18px;

margin:10px;

}

a{

background:#ff6347;

padding:12px 20px;

color:white;

text-decoration:none;

border-radius:8px;

}

</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user.php">View Users</a>
        </li>
        <!-- <a class="navbar-brand" href="user.php">View Users</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->
        <li class="nav-item">
          <a class="nav-link" href="admin_login.php">admin panel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="contact.php">Contact us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="admin_queries2.php">view your query</a>
        </li>
      </ul>
      <a class="navbar-brand" href="logout.php">LOG OUT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </div>
</nav>

<div class="dashboard">

<h1>
Welcome,
<?php echo $row['full_name']; ?>
</h1>

<img src="uploads/<?php echo $row['photo']; ?>" width="150">

<p>Email :
<?php echo $row['email']; ?>
</p>

<p>Mobile :
<?php echo $row['mobile']; ?>
</p>

<p>Gender :
<?php echo $row['gender']; ?>
</p>

<p>Branch :
<?php echo $row['branch']; ?>
</p>

<p>Date of Birth :
<?php echo $row['dob']; ?>
</p>

<a href="logout.php">Logout</a>

</div>

</body>
</html>