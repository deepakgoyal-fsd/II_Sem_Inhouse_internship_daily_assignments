<?php

$page="register";

include("header.php");

/* Validation */

if(
empty($_POST['name']) ||
empty($_POST['email']) ||
empty($_POST['cgpa']) ||
empty($_POST['branch']) ||
empty($_POST['college']) ||
empty($_POST['gender']) ||
empty($_POST['course']) ||
empty($_POST['address'])
){

echo "<div class='alert alert-danger'>";
echo "All fields are required!";
echo "</div>";

include("footer.php");
exit();

}

/* Get Data */

$name=$_POST['name'];
$email=$_POST['email'];
$cgpa=$_POST['cgpa'];
$branch=$_POST['branch'];
$college=$_POST['college'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

/* Function : Grade */

function calculateGrade($cgpa){

if($cgpa>=9){

return array("Excellent","success");

}

elseif($cgpa>=8){

return array("Very Good","primary");

}

elseif($cgpa>=7){

return array("Good","warning");

}

else{

return array("Keep Improving","danger");

}

}

/* Function : Welcome */

function greetStudent($name){

return "Welcome, ".$name."!";

}

/* Date */

function getFormattedDate(){

return date("l, F j, Y");

}

/* Greeting */

$hour=date("H");

if($hour<12){

$greeting="Good Morning";

}

elseif($hour<17){

$greeting="Good Afternoon";

}

else{

$greeting="Good Evening";

}

$grade=calculateGrade($cgpa);

?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="confirmation-card text-center">

<img
src="images/profile.png"
class="profile">

<h2 class="mt-3">

<?php echo greetStudent($name); ?>

</h2>

<p>

<?php echo $greeting; ?>

</p>

<p>

<?php echo getFormattedDate(); ?>

</p>

<hr>

<div class="alert alert-<?php echo $grade[1]; ?>">

<b><?php echo $grade[0]; ?></b>

</div>

<table class="table table-bordered bg-white">

<tr>

<th>Name</th>

<td><?php echo $name; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $email; ?></td>

</tr>

<tr>

<th>CGPA</th>

<td><?php echo $cgpa; ?></td>

</tr>

<tr>

<th>Branch</th>

<td><?php echo $branch; ?></td>

</tr>

<tr>

<th>College</th>

<td><?php echo $college; ?></td>

</tr>

<tr>

<th>Gender</th>

<td><?php echo $gender; ?></td>

</tr>

<tr>

<th>Course</th>

<td><?php echo $course; ?></td>

</tr>

<tr>

<th>Address</th>

<td><?php echo $address; ?></td>

</tr>

</table>

<a href="index.php" class="btn btn-light">

Register Another Student

</a>

</div>

</div>

</div>

<?php

include("footer.php");

?>