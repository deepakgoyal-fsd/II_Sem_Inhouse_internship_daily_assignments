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

if(!isset($_GET['id'])){
    header("Location: viewUsers.php");
    exit();
}

$userId = $_GET['id'];
if($userId === $_SESSION['user_id']){
    echo "You cannot delete your own account";
    exit();
}

$sql = "DELETE FROM user WHERE id = $userId";
$result = mysqli_query($conn,$sql);
if($result){
    header("Location: viewUsers.php");
    exit();
}

else{
    echo mysqli_error($conn);
}
