<?php
include "db.php";
$id=$_GET['id'];
$result=mysqli_query($conn,"SELECT * FROM students WHERE id=$id");
$row=mysqli_fetch_assoc($result);
?>

<form action="update.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
<input type="text" name="name" value="<?php echo $row['name']; ?>">
<input type="email" name="email" value="<?php echo $row['email']; ?>">
<input type="text" name="branch" value="<?php echo $row['branch']; ?>">
<input type="submit" value="Update">
</form>