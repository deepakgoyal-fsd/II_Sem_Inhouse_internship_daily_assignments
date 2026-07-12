<?php
include("adminheader.php");
$admin_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$admin_id'";
$result = mysqli_query($conn, $query);

$admin = mysqli_fetch_assoc($result);
?>


<table class="table table-bordered table-striped table-hover">

    <tr>
        <th>Name</th>
        <th>Email</th>
    </tr>

    <?php

    $selectquery = "SELECT * FROM user";
    $result = mysqli_query($conn, $selectquery);

    while ($user = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $user['name'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "</tr>";
    }

    ?>

</table>

<?php
include("../dashboardfooter.php");
include("../footer.php");
?>