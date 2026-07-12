<?php
include("db_connect.php");

// Total Students
$student = mysqli_query($conn,"SELECT * FROM  user");
$total_students = mysqli_num_rows($student);

// Total Queries
$query = mysqli_query($conn,"SELECT * FROM contact_us");
$total_queries = mysqli_num_rows($query);

// Read Queries
$read = mysqli_query($conn,"SELECT * FROM contact_us WHERE status='Read'");
$total_read = mysqli_num_rows($read);

// Unread Queries
$unread = mysqli_query($conn,"SELECT * FROM contact_us WHERE status='Unread'");
$total_unread = mysqli_num_rows($unread);

?>

<!DOCTYPE html>
<html>
<head>

<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">



<style>
    body{
        background-image: url("background.jpg");
    }

.content{
    margin-left:270px;
    padding:20px;
}



.card-box{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.card{

    width:220px;
    padding:20px;
    color:white;
    border-radius:10px;
    text-align:center;
    font-size:20px;
    box-shadow:0 5px 10px rgba(0,0,0,.2);

}

.blue{
    background:#3498db;
}

.green{
    background:#27ae60;
}

.orange{
    background:#f39c12;
}

.red{
    background:#e74c3c;
}

.card h2{

    font-size:40px;
    margin-top:10px;

}
button{
    padding:12px 20px;
    background:#34495e;
    color:#fff;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}
h1{
  color:lightskyblue;
}
a{

background:#ff6347;

padding:12px 20px;

color:white;

text-decoration:none;

border-radius:8px;

}

</style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="admin.php">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user2.php">View Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="admin_queries.php">View Queries</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="register.php">Add User</a>
        </li>
      </ul>
      <!-- <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="logout_admin.php">LOG OUt</a>
      </li> -->
      <a class="navbar-brand" href="logout_admin.php">LOG OUT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </div>
</nav>

<div class="content">

<h1>Admin Dashboard</h1>

<div class="card-box">

<div class="card blue">

Total Students

<h2><?php echo $total_students; ?></h2>

</div>

<div class="card green">

Total Queries

<h2><?php echo $total_queries; ?></h2>

</div>

<div class="card orange">

Read Queries

<h2><?php echo $total_read; ?></h2>

</div>

<div class="card red">

Unread Queries

<h2><?php echo $total_unread; ?></h2>

</div>

</div>
<br>
<button class="button" type="button" onclick="window.location.href='dashboard.php'">Go to Home</button>
</div>

</body>
</html>