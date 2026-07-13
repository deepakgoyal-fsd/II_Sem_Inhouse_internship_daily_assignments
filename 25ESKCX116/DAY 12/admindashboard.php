<?php
include("../dashboardheader.php");
?>
<div class="container-fluid">
    <div class="row">
<div class="col-md-3">
<a href = "updatepassword.php"> Manage users</a>
</div>
<div class="col-md-9">
    <h2>Manage users</h2>
</div>
</div>
</div>

<table border="10px">
    <tr>
        <th>name</th>
        <th>email</th>
        <th></th>
    </tr>
</table>
<?php
$selectquery= "select * from user";
$result= mysqli_query($conn, $selectquery);
$user= mysqli_fetch_all($result);
if($user){

    for($i=0;$i==count($user);$i++){
        echo "<tr>
        <td>". $user[$i]['name'] . "</td>
        <td>". $user[$i]['email'] . "</td>
        </tr>";
    }

}else{
    echo "error";
}

?>
<?php
include("../dashboardfooter.php");
?>
