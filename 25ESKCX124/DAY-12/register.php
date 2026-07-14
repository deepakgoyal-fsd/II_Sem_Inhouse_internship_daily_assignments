<?php

include("includes/db.php");

$message = "";

if (isset($_POST['register'])) {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $gender = isset($_POST['gender']) ? $_POST['gender'] : "";
    $dob = $_POST['dob'];
    $address = trim($_POST['address']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (
        empty($name) ||
        empty($email) ||
        empty($phone) ||
        empty($gender) ||
        empty($dob) ||
        empty($address) ||
        empty($password) ||
        empty($confirm_password)
    ) {

        $message = "<div class='alert alert-danger'>All fields are required.</div>";

    }

   
    elseif ($password != $confirm_password) {

        $message = "<div class='alert alert-danger'>Passwords do not match.</div>";

    }

    else {

        
        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {

            $message = "<div class='alert alert-warning'>Email already registered.</div>";

        } else {

           
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

           
            $query = "INSERT INTO users
            (name,email,phone,gender,dob,address,password)
            VALUES
            ('$name','$email','$phone','$gender','$dob','$address','$hashed_password')";

            if (mysqli_query($conn, $query)) {

                echo "<script>
                        alert('Registration Successful');
                        window.location='login.php';
                      </script>";
                exit();

            } else {

                $message = "<div class='alert alert-danger'>Registration Failed.</div>";

            }

        }

    }

}

include("includes/header.php");

?>

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3>Create Your Account</h3>

                </div>

                <div class="card-body">

                    <?php echo $message; ?>

                    <form action="" method="POST">

                        <div class="mb-3">

                            <label class="form-label">Full Name</label>

                            <input
                                type="text"
                                class="form-control"
                                name="name"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Email Address</label>

                            <input
                                type="email"
                                class="form-control"
                                name="email"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Phone Number</label>

                            <input
                                type="text"
                                class="form-control"
                                name="phone"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label d-block">
                                Gender
                            </label>

                            <input
                                type="radio"
                                name="gender"
                                value="Male"
                                required>

                            Male

                            &nbsp;&nbsp;&nbsp;

                            <input
                                type="radio"
                                name="gender"
                                value="Female"
                                required>

                            Female

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Date of Birth</label>

                            <input
                                type="date"
                                class="form-control"
                                name="dob"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Address</label>

                            <textarea
                                class="form-control"
                                rows="3"
                                name="address"
                                required></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Password</label>

                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">Confirm Password</label>

                            <input
                                type="password"
                                class="form-control"
                                name="confirm_password"
                                required>

                        </div>

                        <div class="d-grid">

                            <button
                                type="submit"
                                name="register"
                                class="btn btn-primary">

                                Register

                            </button>

                        </div>

                    </form>

                    <div class="text-center mt-4">

                        Already have an account?

                        <a href="login.php">
                            Login
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include("includes/footer.php");
?>