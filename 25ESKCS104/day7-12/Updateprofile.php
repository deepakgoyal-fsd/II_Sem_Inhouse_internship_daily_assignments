<?php
session_start();
include("db_connect.php");

// Fetch current user details
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$user_id'";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("SQL Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update']))
{ 
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);

    // Keep existing image if no new image is uploaded
    $imageName = $row['profile_pic'];

    if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0)
    {
        $allowed = ['jpg','jpeg','png','gif'];

        $extension = strtolower(pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION));

        if(in_array($extension, $allowed))
        {
            $imageName = time() . "_" . $_FILES['profile_pic']['name'];

            move_uploaded_file(
                $_FILES['profile_pic']['tmp_name'],
                "uploads/" . $imageName
            );
        }
    }

    $update = "UPDATE user
               SET name='$name',
                   skills='$skills',
                   profile_pic='$imageName'
               WHERE id='$user_id'";

    if(mysqli_query($conn, $update))
    {
        echo "<script>
                alert('Profile Updated Successfully');
                window.location='dashboard.php';
              </script>";
    }
    else
    {
        echo mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Profile</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        .container{
            width:450px;
            background:white;
            margin:60px auto;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 15px rgba(0,0,0,.15);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        label{
            font-weight:bold;
        }

        input,textarea{
            width:100%;
            padding:10px;
            margin:8px 0 20px;
            border:1px solid #ccc;
            border-radius:6px;
        }

        textarea{
            resize:none;
            height:120px;
        }

        button{
            width:100%;
            padding:12px;
            background:#007BFF;
            color:white;
            border:none;
            border-radius:6px;
            cursor:pointer;
            font-size:16px;
        }

        button:hover{
            background:#0056b3;
        }

    </style>

</head>
<body>

<div class="container">

<h2>Update Profile</h2>
<form method="POST" enctype="multipart/form-data">

<label>Current Profile Picture</label><br><br>

<?php
$image = "default.jpg";

if (!empty($row['profile_pic'])) {
    $image = $row['profile_pic'];
}
?>

<img src="uploads/<?php echo $image; ?>"
     width="120"
     height="120"
     style="border-radius:50%;
            object-fit:cover;
            border:2px solid #007BFF;"><br><br>

<label>Upload New Picture</label>
<input type="file" name="profile_pic" accept="image/*">


<label>Name</label>
<input type="text" name="name" value="<?php echo $row['name']; ?>" required>

<label>Skills</label>
<textarea name="skills" placeholder="Example: PHP, HTML, CSS, JavaScript"><?php echo $row['skills']; ?></textarea>

<button type="submit" name="update">Update Profile</button>

</form>

</div>

</body>
</html>