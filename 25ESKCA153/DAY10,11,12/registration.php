<?php
include("header.php");
include("db-connect.php");
include("checkRegistrationError.php");
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow rounded-4 p-4">
                <form action="" method="post">
                    <h3 class="mb-3">Register</h3>
                    <input type="text" name="name" class="form-control mb-3" placeholder="Name" value="<?= $name ?>">
                    <input type="email" name="email" class="form-control mb-3" placeholder="Email" value="<?= $email ?>">
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" value="<?= $password ?>">
                    <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="Confirm Password" value="<?= $confirmpassword ?>">
                    <button type="submit" class="btn btn-primary w-100">SUBMIT</button>
                    <div class="text-center mt-3">
                        <p>
                            Already have an account?
                            <a href="login.php">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


            <?php
            include("footer.php");
            ?>