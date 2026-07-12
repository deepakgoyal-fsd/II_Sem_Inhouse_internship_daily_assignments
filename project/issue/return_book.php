<?php

include "../config/database.php";


$id=$_GET['id'];



// Get book id

$data=mysqli_query(
$conn,

"SELECT * FROM issued_books WHERE id=$id"

);


$row=mysqli_fetch_assoc($data);


$book_id=$row['book_id'];



// Update issue status


mysqli_query(
$conn,

"UPDATE issued_books SET

status='Returned',

return_date=CURDATE()

WHERE id=$id"

);



// Increase available quantity


mysqli_query(
$conn,

"UPDATE books

SET available_quantity = available_quantity + 1

WHERE id=$book_id"

);



header("location:issued_books.php");


?>