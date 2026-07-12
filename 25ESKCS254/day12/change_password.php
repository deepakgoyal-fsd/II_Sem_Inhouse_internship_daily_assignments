<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white text-center">

                    <h3>Change Password</h3>

                </div>

                <div class="card-body">

                    <?php

                    if(isset($_POST['submit'])){

                    ?>

                    <div class="alert alert-success">

                        Password updated successfully.

                    </div>

                    <?php

                    }

                    ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">

                                Current Password

                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                New Password

                            </label>

                            <input
                                type="password"
                                name="new_password"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Confirm Password

                            </label>

                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                required>

                        </div>

                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-success w-100">

                            Change Password

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="dashboard.php">

                            Back to Dashboard

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>