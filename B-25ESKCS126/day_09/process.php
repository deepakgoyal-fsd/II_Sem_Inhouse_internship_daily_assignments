<?php

include "functions.php";
include "db_connect.php";

// Validation
if (
    empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['cgpa']) ||
    empty($_POST['branch']) ||
    empty($_POST['college'])
) {
    die("<h2 style='color:red;text-align:center;'>All fields are required!</h2>");
}

$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$cgpa = (float) $_POST['cgpa'];
$branch = htmlspecialchars(trim($_POST['branch']));
$college = htmlspecialchars(trim($_POST['college']));

$grade = calculateGrade($cgpa);

// Check duplicate email
$check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");

if (mysqli_num_rows($check) > 0) {

    die("<div class='container mt-5'>
            <div class='alert alert-danger'>
                <h4>Email already exists!</h4>
                <a href='index.php' class='btn btn-primary mt-3'>Go Back</a>
            </div>
         </div>");

}

// Insert Record
$sql = "INSERT INTO students
(name,email,cgpa,branch,college,grade)
VALUES
('$name','$email','$cgpa','$branch','$college','$grade')";

if(mysqli_query($conn,$sql)){

    $success = true;

}else{

    die("Database Error : ".mysqli_error($conn));

}

// Bootstrap Alert Color
switch ($grade) {
    case "A+":
        $alert = "success";
        break;

    case "A":
        $alert = "primary";
        break;

    case "B":
        $alert = "info";
        break;

    case "C":
        $alert = "warning";
        break;

    default:
        $alert = "danger";
}

include "header.php";

?>

<div class="row justify-content-center">

    <div class="col-lg-8">

        <div class="card shadow-lg border-0">

            <div class="card-header bg-success text-white text-center">

                <h2>
                    <i class="fa-solid fa-circle-check"></i>
                    Registration Successful
                </h2>

            </div>

            <div class="card-body">

                <div class="text-center mb-4">

                    <img src="https://placehold.co/150x150?text=Student"
                        class="rounded-circle shadow border"
                        width="150">

                </div>

                <div class="alert alert-<?php echo $alert; ?>">

                    <h4 class="mb-0">

                        Grade Awarded :
                        <strong><?php echo $grade; ?></strong>

                    </h4>

                </div>

                <table class="table table-bordered table-striped">

                    <tr>
                        <th width="35%">Name</th>
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
                        <th>Date</th>
                        <td><?php echo date("d F Y"); ?></td>
                    </tr>

                </table>

                <div class="text-center mt-4">

                    <a href="index.php" class="btn btn-primary btn-lg">

                        <i class="fa-solid fa-arrow-left"></i>

                        Register Another Student

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<?php

include "footer.php";

?>