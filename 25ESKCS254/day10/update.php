<?php

include 'db_connect.php';

$id = $_POST['id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$branch = trim($_POST['branch']);
$cgpa = trim($_POST['cgpa']);
$phone = trim($_POST['phone']);
$city = trim($_POST['city']);
$course = trim($_POST['course']);
$address = trim($_POST['address']);

$errors = [];

if ($name == "") {
    $errors[] = "Student Name is required.";
}

if ($email == "") {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid Email Address.";
}

if ($branch == "") {
    $errors[] = "Branch is required.";
}

if ($cgpa == "") {
    $errors[] = "CGPA is required.";
}

if ($phone == "") {
    $errors[] = "Phone Number is required.";
} elseif (!is_numeric($phone) || strlen($phone) != 10) {
    $errors[] = "Phone Number must be exactly 10 digits.";
}

if ($city == "") {
    $errors[] = "City is required.";
}

if (!empty($errors)) {

    include 'header.php';

    ?>

    <div class="container mt-4">

        <div class="alert alert-danger">

            <h4>Please Correct the Following Errors</h4>

            <ul>

                <?php

                foreach ($errors as $error) {
                    echo "<li>$error</li>";
                }

                ?>

            </ul>

            <a href="edit.php?id=<?php echo $id; ?>" class="btn btn-danger">
                Go Back
            </a>

        </div>

    </div>

    <?php

    include 'footer.php';

    exit();

}

$sql = "UPDATE students SET

name='$name',
email='$email',
branch='$branch',
cgpa='$cgpa',
phone='$phone',
city='$city',
course='$course',
address='$address'

WHERE id='$id'";

if (mysqli_query($conn, $sql)) {

    header("Location: students.php?updated=1");
    exit();

} else {

    include 'header.php';

    ?>

    <div class="container mt-4">

        <div class="alert alert-danger">

            Failed to update student record.

        </div>

        <a href="students.php" class="btn btn-primary">

            Back

        </a>

    </div>

    <?php

    include 'footer.php';

}

mysqli_close($conn);

?>