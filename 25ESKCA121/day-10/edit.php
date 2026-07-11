<?php
include("db_connect.php");

$id = $_GET['id'];

$sql = "SELECT * FROM students WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h2 align="center">Edit Student</h2>

<form action="update.php" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <input type="hidden" name="old_photo" value="<?php echo $row['photo']; ?>">

    <label>Name</label><br>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <label>Branch</label><br>
    <select name="branch" required>
        <option <?php if($row['branch']=="CSE") echo "selected"; ?>>CSE</option>
        <option <?php if($row['branch']=="IT") echo "selected"; ?>>IT</option>
        <option <?php if($row['branch']=="ECE") echo "selected"; ?>>ECE</option>
        <option <?php if($row['branch']=="ME") echo "selected"; ?>>ME</option>
        <option <?php if($row['branch']=="Civil") echo "selected"; ?>>Civil</option>
    </select>
    <br><br>

    <label>CGPA</label><br>
    <input type="number" step="0.01" name="cgpa" value="<?php echo $row['cgpa']; ?>" required><br><br>

    <label>Current Photo</label><br>
    <img src="upload/<?php echo $row['photo']; ?>" width="100"><br><br>

    <label>Change Photo</label><br>
    <input type="file" name="photo"><br><br>

    <label>Status</label><br>
    <select name="status">
        <option value="Active" <?php if($row['status']=="Active") echo "selected"; ?>>Active</option>
        <option value="Inactive" <?php if($row['status']=="Inactive") echo "selected"; ?>>Inactive</option>
    </select>
    <br><br>

    <button type="submit">Update Student</button>

</form>

<br>

<a href="index.php">⬅ Back to Home</a>

</body>
</html>
