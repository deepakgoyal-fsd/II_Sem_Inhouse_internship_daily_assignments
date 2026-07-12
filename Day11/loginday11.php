<?php
include("headerday10.php");
include("checkregistrationerrorday10.php");
?>

<div class="container mt-5" style="max-width:500px;">

<h2 class="mb-3">Login</h2>

<form action="checkloginerror.php" method="POST">

<input type="email"
class="form-control mb-3"
name="email"
placeholder="Enter your Email"
required>

<input type="password"
class="form-control mb-3"
name="password"
placeholder="Enter your Password"
required>

<button class="btn btn-primary w-100">
Login
</button>

</form>

</div>
<?php
include("footerday10.php");
?>
