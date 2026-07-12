<?php

$page = "register";

include("header.php");

include("db_connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];

/* Duplicate Email Check */

$check = "SELECT * FROM students WHERE email='$email'";

$result = mysqli_query($conn, $check);

if(mysqli_num_rows($result) > 0)
{

?>

<div class="alert alert-warning">

<h3>Email Already Exists!</h3>

<p>

A student with this email is already registered.

</p>

<a
href="register.php"
class="btn btn-primary">

Go Back

</a>

</div>

<?php

}

else
{

$sql = "INSERT INTO students(name,email,branch,cgpa)

VALUES('$name','$email','$branch','$cgpa')";

if(mysqli_query($conn,$sql))
{

$countQuery = "SELECT COUNT(*) AS total FROM students";

$countResult = mysqli_query($conn,$countQuery);

$row = mysqli_fetch_assoc($countResult);

$total = $row['total'];

?>

<div class="alert alert-success">

<h2>

Student Registered Successfully!

</h2>

<hr>

<p>

<b>Name :</b>

<?php echo $name; ?>

</p>

<p>

<b>Email :</b>

<?php echo $email; ?>

</p>

<p>

<b>Branch :</b>

<?php echo $branch; ?>

</p>

<p>

<b>CGPA :</b>

<?php echo $cgpa; ?>

</p>

<hr>

<h4>

You are student #

<?php echo $total; ?>

in our system!

</h4>

<a
href="students.php"
class="btn btn-success mt-3">

View Student List

</a>

</div>

<?php

}

else
{

?>

<div class="alert alert-danger">

Database Error!

</div>

<?php

}

}

include("footer.php");

?>