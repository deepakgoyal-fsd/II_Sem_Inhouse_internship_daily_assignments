<?php
include("header.php");
?>
<?php
if(isset($_GET['error']))
{
    echo '<div class="alert alert-danger text-center">
    Invalid Email or Password!
    </div>';
}
?>
<div class="row justify-content-center">

    <div class="col-md-5">

        <div class="card shadow-lg">

            <div class="card-header bg-success text-white text-center">
                <h3>Student Login</h3>
            </div>

            <div class="card-body">

                <form action="checkloginerror.php" method="POST">

                    <div class="mb-3">
                        <label class="form-label">Email Address</label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="Enter Email"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               placeholder="Enter Password"
                               required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        Login
                    </button>

                </form>

                <hr>

                <p class="text-center">
                    Don't have an account?
                    <a href="register.php">Register Here</a>
                </p>

            </div>

        </div>

    </div>

</div>

<?php
include("footer.php");
?>