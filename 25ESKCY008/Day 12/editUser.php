<?php
session_start();
include ("db_connect.php");
include ("dashboardHeader.php");
include("dashboardVerticalContent.php");

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if($_SESSION['user_role'] !== "teacher"){
    header("Location: dashboard.php");
    exit();
}

$userId = $_GET['id'];
$sql = "SELECT * from user WHERE id = $userId ";

$result = mysqli_query($conn,$sql);
$user = mysqli_fetch_assoc($result);

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $fileName = $_FILES['profile_pic']['name'];
    $tmpName = $_FILES['profile_pic']['tmp_name'];
    if (!empty($fileName)){
        move_uploaded_file($tmpName, "images/" . $fileName);
    } 
    else{
        $fileName = $user['profile_pic'];
    }
    $updateQuery = "UPDATE user SET name='$name', profile_pic='$fileName' WHERE id=$userId";
    $result = mysqli_query($conn, $updateQuery);
    if($result){
        header("Location: viewUsers.php");
        exit();
    } 
    else{
        echo "Error : " . mysqli_error($conn);
    }
}
?>

<div class = "container mt-5" style = "max-width:500px;">
    <form method = "POST" enctype = "multipart/form-data">
        <h3 class = "mb-3">Update Profile</h3>
        <?php
        if(empty($user['profile_pic'])){
            $image = 'default.jpg';
        }
        else{
            $image = $user['profile_pic'];
        }
        ?>
        <img src = "images/<?php echo $image; ?>"
                width = "150"
                height = "150"
                class = "rounded-circle"
        >
        <input type="text" name="name" value = "<?php echo $user['name'];?>" >
        <input type = "file" name="profile_pic" class = "form-control mb-3">
        <button class = "btn btn-primary w-100">Update Profile</button>
    </form>
</div>