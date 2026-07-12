<?php

include "../config/database.php";


if(isset($_GET['search']))
{

$search=$_GET['search'];


$result=mysqli_query(
$conn,

"SELECT * FROM members

WHERE name LIKE '%$search%'"

);


}
else
{

$result=mysqli_query(
$conn,

"SELECT * FROM members"

);

}

?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Members List
</h1>


<br>


<a class="btn" href="add.php">

+ Add Member

</a>


<br><br>



<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Address</th>

<th>Action</th>

</tr>



<?php while($row=mysqli_fetch_assoc($result)){ ?>


<tr>


<td>
<?php echo $row['id']; ?>
</td>


<td>
<?php echo $row['name']; ?>
</td>


<td>
<?php echo $row['email']; ?>
</td>


<td>
<?php echo $row['phone']; ?>
</td>


<td>
<?php echo $row['address']; ?>
</td>


<td>


<a class="btn"
href="edit.php?id=<?php echo $row['id']; ?>">

Edit

</a>


<a class="btn"
style="background:#ef4444"

href="delete.php?id=<?php echo $row['id']; ?>"

onclick="return confirm('Delete this member?')">

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
placeholder="Search Member">

</form>

<br>