
<?php
include("db_connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LIST OF STUDENTS</title>
</head>
<body>
    <h2 align = "center">REGISTERED STUDENTS</h2>
    <table border ="1">
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>BRANCH</th>
            <th>CGPA</th>
          
        </tr>
        <?php
        $sql="SELECT * FROM data";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            if($row['cgpa']>8){
                echo "<tr bgcolor='lightgreen'>";
            } else{
                echo "<tr>";
            }
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['email']."</td>";
            echo "<td>".$row['branch']."</td>";
            echo "<td>".$row['cgpa']."</td>";
          
          
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <?php
    $total=mysqli_num_rows($result);
    echo "<h3>Total Students : $total</h3>";
    ?>
    <br>
    <a href="registerform.php">Register New Student</a>
</body>
</html>