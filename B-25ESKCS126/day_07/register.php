<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">

            <div class="card-header bg-primary text-white">
                <h2 class="text-center">Student Registration Form</h2>
            </div>

            <div class="card-body">

                <?php
                if (isset($_SESSION['errors'])) {
                ?>

                    <div class="alert alert-danger">

                        <h5>Please fix the following errors:</h5>

                        <ul class="mb-0">

                            <?php
                            foreach ($_SESSION['errors'] as $error) {
                                echo "<li>$error</li>";
                            }
                            ?>

                        </ul>

                    </div>

                <?php
                    unset($_SESSION['errors']);
                }
                ?>

                <form action="process.php" method="POST" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label>Name</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="<?php echo $_SESSION['old']['name'] ?? ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="<?php echo $_SESSION['old']['email'] ?? ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>College</label>
                        <input
                            type="text"
                            name="college"
                            class="form-control"
                            value="<?php echo $_SESSION['old']['college'] ?? ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Branch</label>
                        <input
                            type="text"
                            name="branch"
                            class="form-control"
                            value="<?php echo $_SESSION['old']['branch'] ?? ''; ?>">
                    </div>

                    <div class="mb-3">
                        <label>Profile Photo</label>
                        <input
                            type="file"
                            class="form-control"
                            name="photo"
                            accept="image/*">
                    </div>

                    <div class="text-center mb-3">
                        <img src="https://placehold.co/150x150?text=Photo"
                            class="img-thumbnail">
                    </div>

                    <div class="mb-3">

                        <label class="d-block">Gender</label>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Male">

                            <label class="form-check-label">Male</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Female">

                            <label class="form-check-label">Female</label>

                        </div>

                        <div class="form-check form-check-inline">

                            <input
                                class="form-check-input"
                                type="radio"
                                name="gender"
                                value="Other">

                            <label class="form-check-label">Other</label>

                        </div>

                    </div>

                    <div class="mb-3">

                        <label>Course</label>

                        <select name="course" class="form-select">

                            <option value="">Select Course</option>

                            <option>B.Tech</option>

                            <option>BCA</option>

                            <option>BBA</option>

                            <option>MCA</option>

                            <option>MBA</option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label>Address</label>

                        <textarea
                            name="address"
                            rows="4"
                            class="form-control"><?php echo $_SESSION['old']['address'] ?? ''; ?></textarea>

                    </div>

                    <button class="btn btn-primary w-100">
                        Register Student
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>

<?php
unset($_SESSION['old']);
?>