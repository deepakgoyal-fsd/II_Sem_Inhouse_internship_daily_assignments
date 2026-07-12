<?php

$page = "home";

include("header.php");

include("db_connect.php");

?>

<div class="text-center mt-5">

<h1 class="display-4">

Student Registration Portal

</h1>

<p class="lead">

Register students and manage records using PHP & MySQL.

</p>

<a href="register.php" class="btn btn-success btn-lg">

Register Student

</a>

<a href="students.php" class="btn btn-primary btn-lg">

View Students

</a>

</div>

<?php

include("footer.php");

?>