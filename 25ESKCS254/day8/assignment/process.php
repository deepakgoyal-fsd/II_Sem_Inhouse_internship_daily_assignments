<?php

$page = "";
include 'header.php';

$name = trim($_POST['name'] ?? "");
$email = trim($_POST['email'] ?? "");
$cgpa = trim($_POST['cgpa'] ?? "");
$branch = trim($_POST['branch'] ?? "");
$college = trim($_POST['college'] ?? "");
$gender = $_POST['gender'] ?? "";
$course = trim($_POST['course'] ?? "");
$address = trim($_POST['address'] ?? "");

$errors = [];

if ($name == "") {
    $errors[] = "Student Name is required.";
}

if ($email == "") {
    $errors[] = "Email Address is required.";
}

if ($cgpa == "") {
    $errors[] = "CGPA is required.";
}

if ($branch == "") {
    $errors[] = "Branch is required.";
}

if ($college == "") {
    $errors[] = "College Name is required.";
}

if ($gender == "") {
    $errors[] = "Please select Gender.";
}

if ($course == "") {
    $errors[] = "Please select Course.";
}

if ($address == "") {
    $errors[] = "Address is required.";
}

function calculateGrade($cgpa)
{
    if ($cgpa >= 9) {
        return ["Excellent", "success"];
    } elseif ($cgpa >= 8) {
        return ["Very Good", "primary"];
    } elseif ($cgpa >= 7) {
        return ["Good", "warning"];
    } else {
        return ["Keep Improving", "danger"];
    }
}

if (!empty($errors)) {
?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="alert alert-danger">

<h4>Please Correct the Following Errors</h4>

<ul>

<?php

foreach ($errors as $error) {

echo "<li>$error</li>";

}

?>

</ul>

<a href="index.php" class="btn btn-danger">

Go Back

</a>

</div>

</div>

</div>

<?php

}

else {

$result = calculateGrade($cgpa);

$grade = $result[0];

$color = $result[1];

$date = date("l, F j, Y");

?>

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="card shadow border-0">

<div class="card-header text-white"
style="background:linear-gradient(to right,#0d6efd,#6610f2);">

<h3>

<i class="fa-solid fa-circle-check"></i>

Registration Confirmation

</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>

Welcome,
<?php echo htmlspecialchars($name); ?>!

</h4>

<p class="mb-0">

Your registration has been submitted successfully.

</p>

</div>

<div class="alert alert-<?php echo $color; ?>">

<strong>Performance :</strong>

<?php echo $grade; ?>

</div>

<p>

<strong>Date :</strong>

<?php echo $date; ?>

</p>

<table class="table table-bordered table-striped">

<tr>

<th width="35%">

Student Name

</th>

<td>

<?php echo htmlspecialchars($name); ?>

</td>

</tr>

<tr>

<th>

Email

</th>

<td>

<?php echo htmlspecialchars($email); ?>

</td>

</tr>

<tr>

<th>

CGPA

</th>

<td>

<?php echo htmlspecialchars($cgpa); ?>

</td>

</tr>

<tr>

<th>

Branch

</th>

<td>

<?php echo htmlspecialchars($branch); ?>

</td>

</tr>

<tr>

<th>

College

</th>

<td>

<?php echo htmlspecialchars($college); ?>

</td>

</tr>

<tr>

<th>

Gender

</th>

<td>

<?php echo htmlspecialchars($gender); ?>

</td>

</tr>

<tr>

<th>

Course

</th>

<td>

<?php echo htmlspecialchars($course); ?>

</td>

</tr>

<tr>

<th>

Address

</th>

<td>

<?php echo nl2br(htmlspecialchars($address)); ?>

</td>

</tr>

<tr>

<th>

Profile Photo

</th>

<td>

<span class="badge bg-secondary">

Upload feature will be implemented later.

</span>

</td>

</tr>

</table>

<a href="index.php" class="btn btn-primary">

<i class="fa-solid fa-arrow-left"></i>

Register Another Student

</a>

</div>

</div>

</div>

</div>

<?php

}

include 'footer.php';

?>