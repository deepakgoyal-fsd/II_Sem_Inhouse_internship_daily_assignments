<?php
session_start();
include("db-connect.php");
include("checkLoginError.php");
include("header.php");
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow rounded-4 p-4">
                <form action="" method="post">
                    <h3 class="mb-3">Login</h3>

                    <input type="email" class="form-control mb-3" name="email" placeholder="Email" value="<?= $email ?>">

                    <input type="password" class="form-control mb-3" placeholder="Password" name="password" value="<?= $password ?>">


                    <button class="btn btn-primary w-100">Login</button>
                    <div class="text-center mt-3">
                        <p>
                            Don't have an account?
                            <a href="registration.php">Register</a>
                        </p>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>


<?php
include("footer.php"); ?>
