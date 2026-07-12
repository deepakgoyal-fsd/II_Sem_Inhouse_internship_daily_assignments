<?php

include "../config/database.php";


if(isset($_GET['search']))
{

$search=$_GET['search'];


$result=mysqli_query(
$conn,

"SELECT * FROM books 
WHERE title LIKE '%$search%'"

);


}
else
{

$result=mysqli_query(
$conn,
"SELECT * FROM books"
);

}


?>


<?php include "../includes/header.php"; ?>


<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Books List
</h1>


<br>


<a class="btn" href="add.php">

+ Add Book

</a>


<br><br>



<table>


<tr>

<th>ID</th>

<th>Title</th>

<th>Author</th>

<th>Category</th>

<th>ISBN</th>

<th>Quantity</th>

<th>Available</th>

<th>Action</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['title']; ?>
</td>


<td>
<?php echo $row['author']; ?>
</td>


<td>
<?php echo $row['category']; ?>
</td>


<td>
<?php echo $row['isbn']; ?>
</td>


<td>
<?php echo $row['quantity']; ?>
</td>


<td>
<?php echo $row['available_quantity']; ?>
</td>


<td>


<a class="btn" 
href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>


<a class="btn"
style="background:#ef4444"
href="delete.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete this book?')">

Delete

</a>


</td>


</tr>


<?php } ?>


</table>



</div>


</div>


<?php include "../includes/footer.php"; ?>
<form method="GET">

<input 
type="text"
name="search"
placeholder="Search Book Name">

</form>

<br>