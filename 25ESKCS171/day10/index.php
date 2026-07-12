<?php

include("db_connect.php");

$selectquery = "SELECT * FROM STUDENT";
$result = mysqli_query($conn , $selectquery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DATABASE</title>
</head>
<body>
    <h2>STUDENT DATABASE !</h2>

   <a href="registrations.html"><button>ADD STUDENT</button></a>

    <table border=1>
        <tr>
            <th>ID</td>
            <th>NAME</td>
            <th>EMAIL</td>
            <th>BRANCH</td>
            <th>CGPA</td>
            <th>PHONE</td>
            <th>CITY</td>

</tr>
<?php
while($row = mysqli_fetch_assoc($result))
    {
?>

<tr>
    <td><?php echo $row["ID"]?></td>
    <td><?php echo $row["NAME"]?></td>
    <td><?php echo $row["EMAIL"]?></td>
    <td><?php echo $row["BRANCH"]?></td>
    <td><?php echo $row["CGPA"]?></td>
    <td><?php echo $row["PHONE"]?></td>
    <td><?php echo $row["CITY"]?></td>

    <td>
<a href="edit.php?ID=<?php echo $row['ID'];?>"><button>EDIT</button></a>
<!-- <a href="delete.html" id=<?php echo $row[ID]?>><button>DELETE</button></a> -->
</td>
</tr>

<?php
}
?>

</table>
</body>
</html>
