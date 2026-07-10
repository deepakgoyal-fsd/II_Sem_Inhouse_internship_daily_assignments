<?php
include("../dashboardheader.php");
?>

<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 ">
        <a href="updatepassword.php" >Update Password</a>
        <br>
        <a href="updateprofile.php" >Update Profile</a>
        </div>

    <div class="col-md-9">



    <table>
        <tr>
            <th>Name</th>
            <th>email</th>
            <th></th>
        </tr>
    </table>


    <?php
$selectQuery = "select * from user";
$result = mysqli_query($conn, $selectQuery);
$user = mysqli_fetch_assoc($result);

if($user){
    for ($i=0; $i < count($user); $i++) { 
        echo "<try>
        <td> .$user [$i]['name']. "</td>
    }
}else{
    echo "Error";
}
    ?>
<?php
include("../dashboardfooter.php");
include("../footer.php");
?>