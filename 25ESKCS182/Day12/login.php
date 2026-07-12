<?php
include ("header.php");
include ("checkLogin.php");
?>

<div class = "container mt-5" style ="max-width:400px;">
<form action = "" method = "post">
<h3 class = "mb-3">Log in</h3>
<input type = "email" name = "email" class = "form-control mb-3" placeholder = "Email" required>
<input type = "password" name = "password" class = "form-control mb-3" placeholder = "Password" required>
<button type = "submit" class = "btn btn-primary" href="dashboard.php">Log in</button>
</form>
</div>
<br>

<?php
include ("footer.php")
?>
