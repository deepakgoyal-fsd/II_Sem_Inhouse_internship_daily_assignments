<?php
include("db_connect.php");

// Search
if(isset($_GET['search']))
{
    $search = $_GET['search'];

    $sql = "SELECT * FROM user
            WHERE full_name LIKE '%$search%'
            OR email LIKE '%$search%'
            OR mobile LIKE '%$search%'
            OR branch LIKE '%$search%'";
}
else
{
    $sql = "SELECT * FROM user ORDER BY id DESC";
}

$result = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>Users</title>

<style>

body{
    margin:0;
    padding:30px;
    font-family:'Poppins',sans-serif;
    background-image: url("background.jpg");
    background-size:300% 300%;
    animation:bgMove 10s ease infinite;
    min-height:100vh;
}

.container{
    max-width:1200px;
    margin:auto;
    background:rgba(94, 161, 182, 0.95);
    border-radius:20px;
    padding:30px;
    box-shadow:0 20px 50px rgba(0,0,0,.15);
}

@keyframes bgMove{
    0%{
        background-position:0% 50%;
    }
    50%{
        background-position:100% 50%;
    }
    100%{
        background-position:0% 50%;
    }
}

table{
    width:100%;
    border-collapse:collapse;
    background:#226975;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 25px rgba(0, 0, 0, 0.1);
}

thead{
    background:#2563eb;
    color:#fff;
}

th,td{
    padding:15px;
    text-align:center;
}

tbody tr:nth-child(even){
    background:#f8fafc;
}

tbody tr:hover{
    background:lightblue;
    transition:.3s;
}

input[type="text"]{
    width:350px;
    padding:12px 15px;
    border-radius:10px;
    border:1px solid #ddd;
    outline:none;
}

button{
    padding:12px 20px;
    background:#18b1b9;
    color:white;
    border:none;
    border-radius:10px;
    cursor:pointer;
}

button:hover{
    background:#1d4ed8;
}

.edit-btn{
    background:#16a34a;
    color:white;
    padding:8px 16px;
    border-radius:8px;
    text-decoration:none;
}

.delete-btn{
    background:#dc2626;
    color:white;
    padding:8px 16px;
    border-radius:8px;
    text-decoration:none;
}

.edit-btn:hover{
    background:#15803d;
}

.delete-btn:hover{
    background:#b91c1c;
}

</style>

</head>

<body>
    <div class="container">

    
<div class="content">

<h2>All Users</h2>
<?php

if(isset($_GET['msg']) && $_GET['msg']=="deleted")
{
    echo "<div style='
    background:#f8d7da;
    color:#721c24;
    padding:15px;
    margin-bottom:20px;
    border-radius:5px;
    text-align:center;
    '>

    ✅ Student <b>".$_GET['name']."</b> Deleted Successfully.

    </div>";
}

?>

<form method="GET" class="search-box">

<input
type="text"
name="search"
placeholder="Search Users">

<button type="submit">

Search

</button>

</form>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Mobile</th>
<th>Gender</th>
<th>DOB</th>
<th>Age</th>
<th>Branch</th>
<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>
    
<td><?php echo $row['id']; ?></td>

<td><?php echo $row['full_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['mobile']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['dob']; ?></td>

<td><?php echo $row['age']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td>
<button
class="edit"
onclick="if(confirm('edit this student?')){ window.location='edit.php?id=<?php echo $row['id']; ?>'; }">
Edit
</button>
<br><br>

<button
class="delete"
onclick="window.location.href='delete.php?id=<?php echo $row['id']; ?>'">
delete
</button>

</td>

</tr>

<?php

}

?>

</table>
<br>

</div>
<button class="button" type="button" onclick="window.location.href='admin.php'">Go to Home</button>
    </div>

</body>

</html>