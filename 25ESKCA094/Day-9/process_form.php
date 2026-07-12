<?php
include("db_connect.php");
if(isset($_POST['name']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $branch = $_POST['branch'];
    $cgpa = $_POST['cgpa'];
   

    $check = "SELECT * FROM data  WHERE email = '$email' ";
    $result = mysqli_query($conn,$check);
    if(mysqli_num_rows($result)>0)
    {
    echo "<h2>Email Already Exists!</h2>";
    echo "<a href='registerform.php'>Go Back</a>";
    }
    else
    {
        $sql="INSERT INTO data (name,email,branch,cgpa)
            VALUES('$name','$email','$branch','$cgpa')";
        if(mysqli_query($conn,$sql))
        {
            echo "<h2>Student Registered Successfully!</h2>";
            echo "<br>";
            echo "<a href='registerform.php'>Register Another Student</a>";
            echo "<br><br>";
            echo "<a href='show.php'>View Students</a>";
        }
        else
        {
            echo "Error : ".mysqli_error($conn);
        }
    }
}
?>