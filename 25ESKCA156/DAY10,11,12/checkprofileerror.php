<?php
$error = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = mysqli_real_escape_string($conn,$_POST["name"]);

    if($name == ""){
        echo "Name is required.";
    }
    else{

        $image = addslashes(file_get_contents($_FILES["profile_pic"]["tmp_name"]));

        $updateQuery = "UPDATE user
                        SET name='$name',
                            profile_pic='$image'
                        WHERE id='".$_SESSION['user_id']."'";

        if(mysqli_query($conn,$updateQuery)){
            header("Location: profilesuccess.php");
            exit();
        }
        else{
            echo mysqli_error($conn);
        }

    }
}
?>