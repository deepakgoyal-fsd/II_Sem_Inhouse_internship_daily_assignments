<?php

include 'header.php';

function calculateGrade($cgpa){

if($cgpa>=9)

return "A+";

elseif($cgpa>=8)

return "A";

elseif($cgpa>=7)

return "B";

elseif($cgpa>=6)

return "C";

else

return "Fail";

}

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=$_POST['name'];

$email=$_POST['email'];

$college=$_POST['college'];

$branch=$_POST['branch'];

$cgpa=$_POST['cgpa'];

$phone=$_POST['phone'];

$address=$_POST['address'];

if(empty($name) || empty($email) || empty($college)){

echo "<div class='alert alert-danger'>
Please Fill All Required Fields
</div>";

include 'footer.php';

exit();

}

$grade=calculateGrade($cgpa);

$date=date("d-m-Y");

?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card p-4 text-center">

<img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png"

width="150"

class="mx-auto">

<h2 class="text-success mt-3">

Welcome <?php echo $name; ?>

</h2>

<hr>

<table class="table table-bordered">

<tr>

<th>Name</th>

<td><?php echo $name; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $email; ?></td>

</tr>

<tr>

<th>College</th>

<td><?php echo $college; ?></td>

</tr>

<tr>

<th>Branch</th>

<td><?php echo $branch; ?></td>

</tr>

<tr>

<th>CGPA</th>

<td><?php echo $cgpa; ?></td>

</tr>

<tr>

<th>Grade</th>

<td>

<?php

if($grade=="A+")

echo "<span class='alert alert-success p-2'>$grade</span>";

elseif($grade=="A")

echo "<span class='alert alert-primary p-2'>$grade</span>";

elseif($grade=="B")

echo "<span class='alert alert-warning p-2'>$grade</span>";

else

echo "<span class='alert alert-danger p-2'>$grade</span>";

?>

</td>

</tr>

<tr>

<th>Phone</th>

<td><?php echo $phone; ?></td>

</tr>

<tr>

<th>Address</th>

<td><?php echo $address; ?></td>

</tr>

<tr>

<th>Date</th>

<td><?php echo $date; ?></td>

</tr>

</table>

<a href="index.php"

class="btn btn-success">

Register Another Student

</a>

</div>

</div>

</div>

<?php

}

include 'footer.php';

?>