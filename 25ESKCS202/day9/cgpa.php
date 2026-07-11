<?php

include("db_connect.php");

$sql="SELECT * FROM cgpa";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:linear-gradient(135deg,#667eea,#764ba2);
font-family:Arial;
}

.card{
margin-top:40px;
border:none;
border-radius:20px;
box-shadow:0 15px 35px rgba(0,0,0,.3);
animation:zoom .8s;
}

@keyframes zoom{

0%{
opacity:0;
transform:scale(.8);
}

100%{
opacity:1;
transform:scale(1);
}

}

table tr:hover{
transform:scale(1.01);
transition:.3s;
}

</style>

</head>

<body>

<div class="container">

<div class="card p-4">

<h2 class="text-center text-primary mb-4">
📚 Student List
</h2>

<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>CGPA</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

$class="";

if($row['cgpa']>8)
{
$class="table-success";
}

?>

<tr class="<?php echo $class; ?>">

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

</tr>

<?php
}

?>

</tbody>

</table>

<h4 class="text-success text-center">

<?php

echo "👨‍🎓 Total Students : ".mysqli_num_rows($result);

?>

</h4>

<div class="text-center mt-3">

<a href="index.php" class="btn btn-primary">
➕ Add Student
</a>

</div>

</div>

</div>

</body>

</html>