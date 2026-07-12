<?php

include "../config/database.php";


$id=$_GET['id'];


$data=mysqli_query(
$conn,
"SELECT * FROM books WHERE id=$id"
);


$row=mysqli_fetch_assoc($data);



if(isset($_POST['update']))
{


$title=$_POST['title'];

$author=$_POST['author'];

$category=$_POST['category'];

$isbn=$_POST['isbn'];

$quantity=$_POST['quantity'];



mysqli_query(
$conn,

"UPDATE books SET

title='$title',

author='$author',

category='$category',

isbn='$isbn',

quantity='$quantity'

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
Edit Book
</h1>


<form method="POST">


<input 
name="title"
value="<?php echo $row['title']; ?>">


<br><br>


<input 
name="author"
value="<?php echo $row['author']; ?>">


<br><br>


<input 
name="category"
value="<?php echo $row['category']; ?>">


<br><br>


<input 
name="isbn"
value="<?php echo $row['isbn']; ?>">


<br><br>


<input 
name="quantity"
value="<?php echo $row['quantity']; ?>">


<br><br>


<button name="update">

Update

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>