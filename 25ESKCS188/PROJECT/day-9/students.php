<?php

$page = "students";

include("header.php");

include("db_connect.php");

$sql = "SELECT * FROM students";

$result = mysqli_query($conn,$sql);

?>

<h2 class="text-center mb-4">

Student List

</h2>

<table class="table table-bordered table-hover">

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

while($row = mysqli_fetch_assoc($result))
{

$class="";

if($row['cgpa']>8.0)
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

<div class="alert alert-info">

<?php

echo "Total Students : ".mysqli_num_rows($result);

?>

</div>

<?php

include("footer.php");

?>