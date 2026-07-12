<?php

include("db_connect.php");
$sql = "SELECT * FROM contact_us ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Queries</title>

<style>
     body{
        background-image: url("background.jpg");
    } 
    h2{
        color: #7eb8d3;
    }

.container{
    width:95%;
    max-width:1400px;
    margin:40px auto;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
    box-shadow:0 5px 15px rgba(0,0,0,.15);
    border-radius:10px;
    overflow:hidden;
}

th{
    background:#2c3e50;
    color:white;
    padding:15px;
    text-align:center;
    white-space:nowrap;
}

td{
    padding:14px;
    text-align:center;
    border-bottom:1px solid #ddd;
    white-space:nowrap;
}

tr:hover{
    background:#f5f5f5;
}

.action{
    display:flex;
    justify-content:center;
    gap:8px;
    flex-wrap:nowrap;
}

.read-btn,
.delete-btn{
    padding:8px 16px;
    border:none;
    border-radius:6px;
    color:white;
    font-weight:bold;
    cursor:pointer;
    text-decoration:none;
    display:inline-block;
    white-space:nowrap;
}

.read-btn{
    background:#28a745;
}

.read-btn:hover{
    background:#218838;
}

.delete-btn{
    background:#dc3545;
}

.delete-btn:hover{
    background:#c82333;
}

.date{
    white-space:nowrap;
}

.message{
    max-width:180px;
    white-space:nowrap;
    overflow:hidden;
    text-overflow:ellipsis;
}
button{
    padding:12px 20px;
    background:#34495f;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}
</style>

</head>

<body>

<div class="content">

<h2>All Queries of all users</h2>
<?php

// Read Message
if(isset($_GET['msg']) && $_GET['msg']=="read")
{
    echo "<div style='
    background:#d4edda;
    color:#155724;
    padding:15px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
    '>
    ✅ Query Marked as Read Successfully.
    </div>";
}

// Delete Message
if(isset($_GET['msg']) && $_GET['msg']=="deleted")
{
    echo "<div style='
    background:#f8d7da;
    color:#721c24;
    padding:15px;
    margin-bottom:15px;
    border-radius:5px;
    text-align:center;
    '>
    🗑 Query of <b>".$_GET['name']."</b> Deleted Successfully.
    </div>";
}

?>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Class</th>
<th>Email</th>
<th>City</th>
<th>Mobile</th>
<th>College</th>
<th>Subject</th>
<th>Message</th>
<th>Status</th>

</tr>

<?php

while($row = mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['class']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['city']; ?></td>

<td><?php echo $row['mobile']; ?></td>

<td><?php echo $row['college']; ?></td>

<td><?php echo $row['subject']; ?></td>

<td><?php echo $row['message']; ?></td>

<td>

<?php

if($row['status']=="read")
{
    echo "read";
}
else
{
    echo "unread";
}

?>




<?php

}

?>

</table>
<br>
<button class="button" type="button" onclick="window.location.href='dashboard.php'">Go to Home</button>

</div>

</body>
</html>