<?php

include "../config/database.php";


if(isset($_POST['save']))
{

$title=$_POST['title'];
$author=$_POST['author'];
$category=$_POST['category'];
$isbn=$_POST['isbn'];
$quantity=$_POST['quantity'];


$query="
INSERT INTO books
(title,author,category,isbn,quantity,available_quantity)

VALUES

('$title','$author','$category','$isbn','$quantity','$quantity')
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
Add New Book
</h1>


<br>


<form method="POST">


<input 
type="text"
name="title"
placeholder="Book Title"
required>


<br><br>


<input 
type="text"
name="author"
placeholder="Author Name"
required>


<br><br>


<input 
type="text"
name="category"
placeholder="Category">


<br><br>


<input 
type="text"
name="isbn"
placeholder="ISBN">


<br><br>


<input 
type="number"
name="quantity"
placeholder="Quantity"
required>


<br><br>


<button name="save">

Save Book

</button>


</form>


</div>


</div>


<?php include "../includes/footer.php"; ?>