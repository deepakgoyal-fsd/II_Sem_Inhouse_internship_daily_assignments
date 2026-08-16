<?php
include("header.php");
include ("checkregistrationerror.php");

?>

<div class="container mt-5" style="max-width:400px;">
<form action="" method="post">
    <h3 class="mb-3">Register</h3>

    <input type="text"
    name="name"
    class="form-control mb-3"
    placeholder="name">


    <input type="email"
    name="email"
    class="form-control mb-3"
    placeholder="email"
    >


    <input type="password"
    name="password"
    class="form-control mb-3"
    placeholder="password"
    >


    <input type="password"
    name="confirmpassword"
    class="form-control mb-3"
    placeholder="confirmpassword"
    >

<button class="btn btn-primary w-100">Register</button>
</form>
</div>
<?php
include("footer.php");
?>
<input type="text" name="name" class="form-control mb-3">