<?php
include "header.php";
include "db.php";

$result=mysqli_query($conn,"SELECT * FROM admin");
?>

<div class="card p-4">

<h2 class="mb-3">Registered Students</h2>

<table class="table table-bordered table-striped">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>College</th>

<th>Branch</th>

<th>CGPA</th>

<th>Grade</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

echo "<tr>";

echo "<td>".$row['id']."</td>";

echo "<td>".$row['name']."</td>";

echo "<td>".$row['email']."</td>";

echo "<td>".$row['college']."</td>";

echo "<td>".$row['branch']."</td>";

echo "<td>".$row['cgpa']."</td>";

echo "<td>".$row['grade']."</td>";

echo "</tr>";

}

?>

</table>

</div>

<?php include "footer.php"; ?>