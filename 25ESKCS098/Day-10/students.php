<?php

include("db_connect.php");

$search="";

if(isset($_GET['search'])){

$search=$_GET['search'];

$sql="SELECT * FROM students
WHERE name LIKE '%$search%'
OR branch LIKE '%$search%'
ORDER BY id DESC";

}

else{

$sql="SELECT * FROM students ORDER BY id DESC";

}

$result=mysqli_query($conn,$sql);

$count=mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="container mt-4">

<h2 class="text-center mb-4">

Student Management System

</h2>

<?php

if(isset($_GET['msg'])){

?>

<div class="alert alert-success" id="alert">

<?php echo $_GET['msg']; ?>

</div>

<?php

}

?>

<?php

if(isset($_GET['delete'])){

?>

<div class="alert alert-danger" id="alert">

<?php echo $_GET['delete']; ?>

</div>

<?php

}

?>

<form method="GET" class="mb-3">

<div class="input-group">

<input

type="text"

name="search"

class="form-control"

placeholder="Search by Name or Branch"

value="<?php echo $search; ?>">

<button class="btn btn-primary">

Search

</button>

</div>

</form>

<h5>

<span class="badge bg-success">

Total Students : <?php echo $count; ?>

</span>

</h5>

<table class="table table-bordered table-striped table-hover mt-3">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Last Updated</th>

<th>Edit</th>

<th>Delete</th>

</tr>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo str_replace($search,"<mark>$search</mark>",$row['name']); ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo str_replace($search,"<mark>$search</mark>",$row['branch']); ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $row['updated_at']; ?></td>

<td>

<a

href="edit.php?id=<?php echo $row['id']; ?>"

class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

Edit

</a>

</td>

<td>

<a

href="delete.php?id=<?php echo $row['id']; ?>"

class="btn btn-danger btn-sm"

onclick="return confirm('Are you sure you want to delete this record? This action cannot be undone.')">

<i class="bi bi-trash"></i>

Delete

</a>

</td>

</tr>

<?php

}

}

else{

?>

<tr>

<td colspan="8" class="text-center">

No Students Found

</td>

</tr>

<?php

}

?>

</table>

</div>

<script>

setTimeout(function(){

var a=document.getElementById("alert");

if(a){

a.style.display="none";

}

},3000);

</script>

</body>

</html>