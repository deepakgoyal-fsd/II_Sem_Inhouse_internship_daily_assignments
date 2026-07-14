?php
session_start();<
include("db_connect.php");

$error="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=mysqli_real_escape_string($conn,$_POST["name"]);

    if($name=="")
    {
        $error="Name is required.";
    }
    else
    {
        $userId=$_SESSION["user_id"];

        $updateQuery="UPDATE user SET name='$name' WHERE id='$userId'";

        if(mysqli_query($conn,$updateQuery))
        {
            $_SESSION["user_name"]=$name;

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $error="Error updating profile.";
        }
    }
}
?>