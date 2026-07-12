<?php

include "../config/database.php";


if(isset($_POST['issue']))
{

$member=$_POST['member'];

$book=$_POST['book'];

$issue_date=$_POST['issue_date'];

$due_date=$_POST['due_date'];



// Insert issue record

mysqli_query(
$conn,

"INSERT INTO issued_books

(member_id,book_id,issue_date,due_date)

VALUES

('$member','$book','$issue_date','$due_date')"

);



// Reduce available book quantity

mysqli_query(
$conn,

"UPDATE books

SET available_quantity = available_quantity - 1

WHERE id='$book'"

);



header("location:issued_books.php");


}

?>



<?php include "../includes/header.php"; ?>

<?php include "../includes/sidebar.php"; ?>


<div class="main">


<?php include "../includes/navbar.php"; ?>


<div class="container">


<h1>
Issue Book
</h1>


<br>


<form method="POST">


<label>
Select Member
</label>


<select name="member"
style="width:100%;padding:12px">


<?php


$members=mysqli_query(
$conn,
"SELECT * FROM members"
);


while($m=mysqli_fetch_assoc($members))

{


?>


<option value="<?php echo $m['id']; ?>">


<?php echo $m['name']; ?>


</option>


<?php } ?>


</select>



<br><br>



<label>
Select Book
</label>



<select name="book"
style="width:100%;padding:12px">



<?php


$books=mysqli_query(
$conn,

"SELECT * FROM books 
WHERE available_quantity>0"

);


while($b=mysqli_fetch_assoc($books))

{


?>


<option value="<?php echo $b['id']; ?>">


<?php echo $b['title']; ?>


</option>


<?php } ?>


</select>



<br><br>



<label>
Issue Date
</label>


<input 
type="date"
name="issue_date"
required>



<br><br>



<label>
Due Date
</label>


<input
type="date"
name="due_date"
required>



<br><br>



<button name="issue">

Issue Book

</button>


</form>



</div>


</div>


<?php include "../includes/footer.php"; ?>