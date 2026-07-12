<?php

include 'functions.php';
include 'header.php';

if(
empty($_POST['name']) ||
empty($_POST['email']) ||
empty($_POST['cgpa']) ||
empty($_POST['branch']) ||
empty($_POST['college'])
)
{

echo "<div class='alert alert-danger'>
Please fill all required fields.
</div>";

include 'footer.php';

exit();

}

$name=$_POST['name'];
$email=$_POST['email'];
$cgpa=$_POST['cgpa'];
$branch=$_POST['branch'];
$college=$_POST['college'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

list($grade,$color)=calculateGrade($cgpa);

?>

<div class="card gradient-card p-5">

<div class="profile mb-3">

<i class="fa-solid fa-user"></i>

</div>

<h2 class="text-center">

<?php echo greeting(); ?>

<?php echo $name; ?>

</h2>

<p class="text-center">

Registration Successful

</p>

<hr>

<div class="row">

<div class="col-md-6">

<h5>Name</h5>
<p><?php echo $name; ?></p>

<h5>Email</h5>
<p><?php echo $email; ?></p>

<h5>Branch</h5>
<p><?php echo $branch; ?></p>

<h5>College</h5>
<p><?php echo $college; ?></p>

</div>

<div class="col-md-6">

<h5>Course</h5>
<p><?php echo $course; ?></p>

<h5>Gender</h5>
<p><?php echo $gender; ?></p>

<h5>Address</h5>
<p><?php echo $address; ?></p>

<h5>Date</h5>

<p>

<?php

echo date("l, d F Y");

?>

</p>

</div>

</div>

<div class="alert alert-<?php echo $color; ?> mt-4">

<strong>CGPA :</strong>

<?php echo $cgpa; ?>

<br>

<strong>Performance :</strong>

<?php echo $grade; ?>

</div>

<div class="text-center mt-4">

<a href="index.php" class="btn btn-light">

Register Another Student

</a>

</div>

</div>

<?php include 'footer.php'; ?>