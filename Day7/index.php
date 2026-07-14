<?php
$conn = mysqli_connect("localhost","root","","students_management");

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql);
$totalStudents = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student List Page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
background:linear-gradient(135deg,#6a11cb,#2575fc);
padding:40px;
}
.card{
border-radius:15px;
box-shadow:0 0 20px rgba(0,0,0,.3);
}
</style>

</head>

<body>

<div class="container">

<div class="card p-4">

<h2 class="text-center text-primary mb-4">
🎓 Student List Page
</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>College</th>
<th>Branch</th>
<th>CGPA</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

$class="";

if($row['cgpa']>8.0)
{
$class="table-success";
}

?>

<tr class="<?php echo $class;?>">

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['college']; ?></td>
<td><?php echo $row['branch']; ?></td>
<td><?php echo $row['cgpa']; ?></td>

</tr>

<?php
}
?>

</tbody>

</table>

<h4 class="text-center text-success">
Total Students :
<?php echo $totalStudents; ?>
</h4>

</div>

</div>

</body>
</html>