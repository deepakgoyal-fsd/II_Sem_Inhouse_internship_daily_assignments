<?php
include ('dashboardHeader.php');
include ('dashboardVertical.php');
include ('db_connect.php');
?>

<div class ="container-fluid">

<div class = "row">

 <div class = "col-md-9">

 <h2>Admin Dashboard <br><?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?></h2>

 <h3 class="mt-4">Users Data</h3>
 <table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>Profile Picture</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($conn, "SELECT * FROM user");
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>";
        if (!empty($row['myFile'])) {
            echo "<img src='" . $row['myFile'] . "' style='width:60px;height:60px;object-fit:cover;border-radius:50%;'>";
        } else {
            echo "No image";
        }
        echo "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
 </table>

 </div>

 </div>

 </div>

 <?php include ('footer.php'); ?>