
<?php
include("db.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Edit Student</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">


<label>Name</label><br>
<input type="text" name="name" value="<?php echo $row['name']; ?>" required>
<br><br>


<label>Email</label><br>
<input type="email" name="email" value="<?php echo $row['email']; ?>" required>
<br><br>


<label>Branch</label><br>
<input type="text" name="branch" value="<?php echo $row['branch']; ?>" required>
<br><br>


<label>CGPA</label><br>
<input type="text" name="cgpa" value="<?php echo $row['cgpa']; ?>" required>
<br><br>


<label>Status</label><br>

<select name="status">

<option value="Active" 
<?php if($row['status']=="Active") echo "selected"; ?>>
Active
</option>


<option value="Inactive"
<?php if($row['status']=="Inactive") echo "selected"; ?>>
Inactive
</option>


</select>

<br><br>


<button type="submit">
Update Student
</button>


</form>

</body>
</html>