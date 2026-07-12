<?php
include("../db_connection.php");
include("../dashboardHeader.php")

?>

<table border = "1px"> 

<tr>
<th>Name</th>
<th>Email</th>
<th></th>
</tr>


</table>

<?php

$selectQuery = "select ** from user";
$result = mysqli_query($conn, $selectQuery);
$user = mysqli_fetchAll($result);


if($result){
    for($i = 0; $i<count($user); $i++){
        echo "<tr>"
        <td>". $user[$i]['name']. "</td>
        <td>". $user[$i]['emil']. "</td>
        </tr>;
    }
}
else{
    echo "Error";
}




?>

<?php
include("../dashboardFooter.php");
include("../footer.php");

?>