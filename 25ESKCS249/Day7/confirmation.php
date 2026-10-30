<?php

$errors = [];

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$gender = $_POST['gender'] ?? '';
$course = $_POST['course'] ?? '';
$address = trim($_POST['address'] ?? '');


// NAME VALIDATION

if ($name == '') {

    $errors[] = "Student name is required.";

}
elseif (preg_match('/[0-9]/', $name)) {

    $errors[] = "Student name cannot contain numbers.";

}


// EMAIL VALIDATION

if ($email == '') {

    $errors[] = "Email is required.";

}
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    $errors[] = "Please enter a valid email address.";

}


// PHONE VALIDATION

if ($phone == '') {

    $errors[] = "Phone number is required.";

}
elseif (!preg_match('/^[0-9]{10}$/', $phone)) {

    $errors[] = "Phone number must contain exactly 10 digits.";

}


// GENDER VALIDATION

if ($gender == '') {

    $errors[] = "Please select your gender.";

}


// COURSE VALIDATION

if ($course == '') {

    $errors[] = "Please select a course.";

}


// ADDRESS VALIDATION

if ($address == '') {

    $errors[] = "Address is required.";

}
elseif (strlen($address) < 10) {

    $errors[] = "Address must be at least 10 characters long.";

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Confirmation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

</head>


<body class="bg-light">


<div class="container py-5">


<div class="row justify-content-center">


<div class="col-md-7">


<?php if (!empty($errors)) { ?>


    <!-- ERROR BOX -->

    <div class="alert alert-danger shadow">

        <h4 class="alert-heading">
            ❌ Registration Failed
        </h4>

        <p>
            Please fix the following errors:
        </p>

        <ul class="mb-0">

            <?php foreach ($errors as $error) { ?>

                <li>
                    <?php echo htmlspecialchars($error); ?>
                </li>

            <?php } ?>

        </ul>

    </div>


    <a href="index.php"
       class="btn btn-danger">

        ← Back to Registration

    </a>


<?php } else { ?>


    <!-- SUCCESS CARD -->


    <div class="card shadow border-0">


        <div class="card-header bg-success text-white text-center">

            <h2>
                ✅ Registration Successful
            </h2>

        </div>


        <div class="card-body p-4">


            <!-- PHOTO PLACEHOLDER -->


            <div class="text-center mb-4">

                <img
                    src="https://via.placeholder.com/130"
                    class="rounded-circle border shadow"
                    width="130"
                    height="130"
                    alt="Student Photo">

                <h3 class="mt-3">

                    <?php echo htmlspecialchars($name); ?>

                </h3>

            </div>


            <!-- STUDENT DETAILS -->


            <table class="table table-bordered table-striped">


                <tr>

                    <th>Name</th>

                    <td>
                        <?php echo htmlspecialchars($name); ?>
                    </td>

                </tr>


                <tr>

                    <th>Email</th>

                    <td>
                        <?php echo htmlspecialchars($email); ?>
                    </td>

                </tr>


                <tr>

                    <th>Phone</th>

                    <td>
                        <?php echo htmlspecialchars($phone); ?>
                    </td>

                </tr>


                <tr>

                    <th>Gender</th>

                    <td>
                        <?php echo htmlspecialchars($gender); ?>
                    </td>

                </tr>


                <tr>

                    <th>Course</th>

                    <td>
                        <?php echo htmlspecialchars($course); ?>
                    </td>

                </tr>


                <tr>

                    <th>Address</th>

                    <td>
                        <?php echo htmlspecialchars($address); ?>
                    </td>

                </tr>


            </table>


            <div class="text-center">

                <a href="index.php"
                   class="btn btn-primary">

                    Register Another Student

                </a>

            </div>


        </div>


    </div>


<?php } ?>


</div>


</div>


</div>


</body>

</html>