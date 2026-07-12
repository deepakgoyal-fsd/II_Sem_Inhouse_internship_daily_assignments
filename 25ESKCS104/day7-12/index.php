<?php
session_start();
include("header.php");
?>

<div class="container mt-5">

    <h1>Welcome</h1>

    <p>
        Welcome to my website.
    </p>

    <p>
        This website is made using HTML, CSS, Bootstrap, PHP and MySQL.
    </p>

    <a href="updateprofile.php" class="btn btn-primary">
        Update Profile
    </a>

</div>

<?php
include("footer.php");
?>