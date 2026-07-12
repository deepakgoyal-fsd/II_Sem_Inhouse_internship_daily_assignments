<?php
include("db.php");
include("session_check.php");
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="style.css">
    <style>
        table{
            width:95%;
            margin:30px auto;
            border-collapse:collapse;
            background:white;
        }

        th,td{
            border:1px solid black;
            padding:10px;
            text-align:center;
        }

        img{
            width:80px;
            height:80px;
            object-fit:cover;
        }

        a{
            text-decoration:none;
            padding:6px 12px;
            color:white;
            border-radius:5px;
        }

        .edit{
            background:green;
        }

        .delete{
            background:red;
        }

        .add{
            background:blue;
            display:inline-block;
            margin:20px;
        }
    </style>
</head>
<body>
    <h2 style="text-align:center;">Student Management System</h2>
    <a class="add" href="index.php">Add Student</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>Course</th>
            <th>Gender</th>
            <th>Action</th>
        </tr>
        <?php
        while($row=mysqli_fetch_assoc($result)){
            ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td>
                <img src="<?php echo $row['image']; ?>">
            </td>
            <td><?php echo $row['fullname']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td>
            <a class="edit" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
            <a class="delete" onclick="return confirm('Delete Student?')" href="delete.php?id=<?php echo $row['id']; ?>">
            Delete
            </a>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>