 <!-- ->
// $error="";
// $newpassword="";
// $oldpassword="";
// $confirmpassword=""; -->



// <!-- {
        
        $updateQuery="update user set password= '$newpassword' where id=$_SESSION['user_id']";
        
        $result=mysqli_query($conn,$updateQuery);
        $user=mysqli_fetch_assoc($result);
        if($user&&$user["password"]=="$oldpassword"){
            session_start();
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];


             header("Location: dashboard.php");
             exit();
        }elseif($user){
            echo"old password does not match";
            exit();
        }
        }
        -->

    <?php

include ("db_connect.php");

$error = "";

$oldPassword = "";
$newPassword = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo"form sumbitted";

    $oldPassword = mysqli_real_escape_string($conn, $_POST["oldPassword"]);
    $newPassword = mysqli_real_escape_string($conn, $_POST["newPassword"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    if ($oldPassword == "" || $newPassword == "" || $confirmPassword == "") {

        $error = "All fields are required.";
        echo $error;

    } elseif ($newPassword != $confirmPassword) {

        echo "New Password and Confirm Password do not match.";

    } else {
        if (!isset($_SESSION['user_email'])) {
    die("Please login first.");
}
// session_start();
    $email = $_SESSION['user_email'];



        $selectQuery = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $selectQuery);

        if(!$result) { 
            die("Query Error: ".
             mysqli_error($conn));
        }

        if (mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);

            if ($user['password'] == $oldPassword) {

                $updateQuery = "UPDATE user SET password='$newPassword' WHERE email='$email'";
                echo$updateQuery;

                if (mysqli_query($conn, $updateQuery)) {

                    $_SESSION['user_password'] = $newPassword;
                    echo "password updated successfully";
                    mysqli_affected_rows($conn);

                    header("Location: dashboard.php");
                    exit();

                } else {

                    echo "Error: " . mysqli_error($conn);

                }

            } else {

                echo "Old Password does not match.";

            }

        } else {

            echo "User not found.";

        }

    }
}
?>