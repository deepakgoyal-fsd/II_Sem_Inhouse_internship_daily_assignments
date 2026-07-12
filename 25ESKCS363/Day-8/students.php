<?php

include "db.php";

$result=mysqli_query($conn,"SELECT * FROM students");

$total=mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registered Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<style>

body{
background:linear-gradient(135deg,#4facfe,#00f2fe);
min-height:100vh;
padding:40px;
}

.card{
border-radius:20px;
}

img{
width:70px;
height:70px;
object-fit:cover;
border-radius:50%;
border:3px solid #0d6efd;
}

table{
vertical-align:middle;
}

</style>

</head>

<body>

<div class="container">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

<h2>

<i class="fa-solid fa-users"></i>

Registered Students

</h2>

<span class="badge bg-warning text-dark fs-6">

Total : <?php echo $total; ?>

</span>

</div>

<div class="card-body">

<div class="mb-3">

<a href="index.php" class="btn btn-success">

<i class="fa-solid fa-user-plus"></i>

Register New Student

</a>

</div>

<div class="table-responsive">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Gender</th>

<th>Course</th>

<th>Address</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td>

<?php

if($row["photo"]!=""){

?>

<img src="uploads/<?php echo $row["photo"]; ?>">

<?php

}

else{

echo "No Photo";

}

?>

</td>

<td><?php echo $row["name"]; ?></td>

<td><?php echo $row["email"]; ?></td>

<td><?php echo $row["phone"]; ?></td>

<td><?php echo $row["gender"]; ?></td>

<td><?php echo $row["course"]; ?></td>

<td><?php echo $row["address"]; ?></td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</div>

</div>

</div>

</body>

</html>