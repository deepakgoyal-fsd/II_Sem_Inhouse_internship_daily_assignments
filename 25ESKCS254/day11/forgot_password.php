<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3>Forgot Password</h3>

                </div>

                <div class="card-body">

                    <?php

                    if(isset($_POST['submit'])){

                    ?>

                    <div class="alert alert-success">

                        If this email exists, a password reset link will be sent.

                    </div>

                    <?php

                    }

                    ?>

                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter your email"
                                required>

                        </div>

                        <button
                            type="submit"
                            name="submit"
                            class="btn btn-primary w-100">

                            Send Reset Link

                        </button>

                    </form>

                    <div class="text-center mt-3">

                        <a href="login.php">

                            Back to Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>