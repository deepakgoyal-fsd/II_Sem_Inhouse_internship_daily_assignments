
<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>
<?php

$page = "";
include 'header.php';
include 'db_connect.php';

$name = trim($_POST['name'] ?? "");
$email = trim($_POST['email'] ?? "");
$cgpa = trim($_POST['cgpa'] ?? "");
$branch = trim($_POST['branch'] ?? "");
$phone = trim($_POST['phone'] ?? "");
$city = trim($_POST['city'] ?? "");
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
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid Email Address.";
}

if ($cgpa == "") {
    $errors[] = "CGPA is required.";
}

if ($branch == "") {
    $errors[] = "Branch is required.";
}

if ($phone == "") {
    $errors[] = "Phone Number is required.";
} elseif (!is_numeric($phone) || strlen($phone) != 10) {
    $errors[] = "Phone Number must be exactly 10 digits.";
}

if ($city == "") {
    $errors[] = "City is required.";
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

if (empty($errors)) {

    $check = mysqli_query($conn,
        "SELECT id FROM students WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        $errors[] = "Email already exists.";
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

} else {

$photo = "Not Uploaded";

$sql = "INSERT INTO students
(name,email,branch,cgpa,phone,city,course,address,photo)
VALUES
('$name','$email','$branch','$cgpa','$phone','$city','$course','$address','$photo')";

mysqli_query($conn, $sql);

$result = calculateGrade($cgpa);

$grade = $result[0];
$color = $result[1];

?>

<div class="row justify-content-center">

<div class="col-lg-9">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>

Registration Successful

</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>

Welcome,
<?php echo htmlspecialchars($name); ?>!

</h4>

<p>

Student data has been saved successfully.

</p>

</div>

<div class="alert alert-<?php echo $color; ?>">

<strong>

Performance :

</strong>

<?php echo $grade; ?>

</div>

<table class="table table-bordered">

<tr>

<th>Name</th>

<td><?php echo htmlspecialchars($name); ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo htmlspecialchars($email); ?></td>

</tr>

<tr>

<th>CGPA</th>

<td><?php echo htmlspecialchars($cgpa); ?></td>

</tr>

<tr>

<th>Branch</th>

<td><?php echo htmlspecialchars($branch); ?></td>

</tr>

<tr>

<th>Phone</th>

<td><?php echo htmlspecialchars($phone); ?></td>

</tr>

<tr>

<th>City</th>

<td><?php echo htmlspecialchars($city); ?></td>

</tr>

<tr>

<th>College</th>

<td><?php echo htmlspecialchars($college); ?></td>

</tr>

<tr>

<th>Gender</th>

<td><?php echo htmlspecialchars($gender); ?></td>

</tr>

<tr>

<th>Course</th>

<td><?php echo htmlspecialchars($course); ?></td>

</tr>

<tr>

<th>Address</th>

<td><?php echo nl2br(htmlspecialchars($address)); ?></td>

</tr>

</table>

<a href="index.php" class="btn btn-primary">

Register Another Student

</a>

<a href="students.php" class="btn btn-success">

View Students

</a>

</div>

</div>

</div>

</div>

<?php

}

mysqli_close($conn);

include 'footer.php';

?>