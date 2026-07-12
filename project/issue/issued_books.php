<?php

include "../config/database.php";


$result=mysqli_query(
$conn,

"SELECT 

issued_books.*,

members.name,

books.title


FROM issued_books


JOIN members

ON issued_books.member_id=members.id


JOIN books

ON issued_books.book_id=books.id"

);


?>


<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Issued Books
</h1>


<br>


<a class="btn" href="issue_book.php">

+ Issue Book

</a>


<br><br>


<table>


<tr>

<th>ID</th>

<th>Member</th>

<th>Book</th>

<th>Issue Date</th>

<th>Due Date</th>

<th>Status</th>

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
<?php echo $row['title']; ?>
</td>


<td>
<?php echo $row['issue_date']; ?>
</td>


<td>
<?php echo $row['due_date']; ?>
</td>


<td>

<?php echo $row['status']; ?>

</td>


<td>


<?php

if($row['status']=="Issued")

{

?>

<a class="btn"

href="return_book.php?id=<?php echo $row['id']; ?>">

Return

</a>


<?php

}

?>


</td>


</tr>


<?php } ?>


</table>


</div>


</div>


<?php include "../includes/footer.php"; ?>