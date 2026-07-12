<?php

include "config/database.php";


$total_books=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM books")
);


$total_members=mysqli_num_rows(
mysqli_query($conn,"SELECT * FROM members")
);


$total_issued=mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM issued_books WHERE status='Issued'")
);


$total_returned=mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM issued_books WHERE status='Returned'")
);


?>


<?php include "includes/header.php"; ?>

<?php include "includes/sidebar.php"; ?>


<div class="main">


<?php include "includes/navbar.php"; ?>


<div class="container">


<h1>
Library Reports
</h1>


<br>


<div class="cards">


<div class="card report-card">

<h3>
📚 Total Books
</h3>

<h1 class="counter">
<?php echo $total_books; ?>
</h1>

</div>



<div class="card report-card">

<h3>
👥 Total Members
</h3>

<h1>
<?php echo $total_members; ?>
</h1>

</div>



<div class="card report-card">

<h3>
📖 Issued Books
</h3>

<h1>
<?php echo $total_issued; ?>
</h1>

</div>



<div class="card report-card">

<h3>
✅ Returned
</h3>

<h1>
<?php echo $total_returned; ?>
</h1>

</div>


</div>


</div>


</div>


<?php include "includes/footer.php"; ?>