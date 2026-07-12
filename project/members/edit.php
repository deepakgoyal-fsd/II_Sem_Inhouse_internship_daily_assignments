<?php

include "../config/database.php";


$id=$_GET['id'];



$data=mysqli_query(
$conn,
"SELECT * FROM members WHERE id=$id"
);


$row=mysqli_fetch_assoc($data);



if(isset($_POST['update']))
{


$name=$_POST['name'];

$email=$_POST['email'];

$phone=$_POST['phone'];

$address=$_POST['address'];



mysqli_query(
$conn,

"UPDATE members SET

name='$name',

email='$email',

phone='$phone',

address='$address'

WHERE id=$id"

);



header("location:view.php");


}


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Edit Member
</h1>


<br>


<form method="POST">


<input
name="name"
value="<?php echo $row['name']; ?>">


<br><br>


<input
name="email"
value="<?php echo $row['email']; ?>">


<br><br>


<input
name="phone"
value="<?php echo $row['phone']; ?>">


<br><br>


<textarea
name="address"
style="width:100%;padding:12px">

<?php echo $row['address']; ?>

</textarea>


<br><br>


<button name="update">

Update Member

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>