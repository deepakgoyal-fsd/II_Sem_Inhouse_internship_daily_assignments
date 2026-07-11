<?php
include ("header.php");
include("db_connect.php");
include ("checkregistrationerror.php");

?>

<div class="container mt-5" style="max-width:400px;">

    <form action="checkregistrationerror.php" method="post">
        <h3 class="mb-3">Register</h3>

        <input type="text" class="form-control mb-3"name="name"placeholder="Name">

        <input type="email" class="form-control mb-3"name="email"placeholder="Email">
        

        <input type="password" class="form-control mb-3"name="password" placeholder="Password">

        <input type="password" class="form-control mb-3"name="confirm passwordz" placeholder="Confirm Password">

        <button  type="submit" class="btn btn-primary w-100">Register</button>


    </form>

</div>
<?php 
include("footer.php");
?>