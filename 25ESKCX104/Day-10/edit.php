<?php
include "db.php";
$id=$_GET['id'];
$sql="SELECT * FROM students WHERE id='$id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Student</h2>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="text" name="fullname" value="<?php echo $row['fullname']; ?>" required>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            <input type="number" name="age" value="<?php echo $row['age']; ?>" required>
            <select name="course">
                <option><?php echo $row['course']; ?></option>
                <option>B.Tech</option>
                <option>BCA</option>
                <option>BBA</option>
                <option>MCA</option>
            </select>
            <button>Update Student</button>
        </form>
    </div>
</body>
</html>