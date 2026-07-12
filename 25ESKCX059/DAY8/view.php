<?php

$conn = mysqli_connect("localhost","root","","college_portal");

if(!$conn){
    die("Connection Failed");
}

$sql = "SELECT * FROM students";

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>
<title>Student List</title>

<style>

table{

width:90%;
margin:30px auto;
border-collapse:collapse;

}

th,td{

border:1px solid black;
padding:10px;
text-align:center;

}

th{

background:#6a11cb;
color:white;

}

h1{

text-align:center;

}

</style>

</head>

<body>

<h1>Registered Students</h1>

<table>

<tr>

<th>ID</th>
<th>Full Name</th>
<th>Roll No</th>
<th>Branch</th>
<th>Email</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['rollno']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['email']; ?></td>

</tr>

<?php

}

?>

</table>

</body>
</html>