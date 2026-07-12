<?php

include "../config/database.php";


if(isset($_POST['save']))
{

$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$address=$_POST['address'];



$query="
INSERT INTO members
(name,email,phone,address)

VALUES

('$name','$email','$phone','$address')
";


mysqli_query($conn,$query);


header("location:view.php");


}

?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Add Member
</h1>


<br>


<form method="POST">


<input
type="text"
name="name"
placeholder="Member Name"
required>


<br><br>


<input
type="email"
name="email"
placeholder="Email Address"
required>


<br><br>


<input
type="text"
name="phone"
placeholder="Phone Number"
required>


<br><br>


<textarea
name="address"
placeholder="Address"
style="width:100%;padding:12px;border-radius:8px">
</textarea>


<br><br>


<button name="save">

Save Member

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>