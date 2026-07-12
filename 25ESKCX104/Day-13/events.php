<?php
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
include("header.php");
include("db_connect.php");
if(isset($_GET["search"])){

$search=mysqli_real_escape_string($conn,$_GET["search"]);

$query="SELECT * FROM events

WHERE

event_name LIKE '%$search%'

OR

category LIKE '%$search%'

OR

venue LIKE '%$search%'

ORDER BY event_date ASC";

}

else{

$query="SELECT * FROM events ORDER BY event_date ASC";

}
if(isset($_GET["category"]) && $_GET["category"]!=""){

$category=$_GET["category"];

$query="SELECT * FROM events

WHERE category='$category'

ORDER BY event_date";

}

$result=mysqli_query($conn,$query);
$result = mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Events</title>
<style>
body{
    background:#f2f2f2;
    font-family:Arial, Helvetica, sans-serif;
}
.heading{
   text-align:center;
    margin:30px;
}
.container{
    width:90%;
    margin:auto;
    display:flex;
    justify-content:center;
    gap:25px;
    flex-wrap:wrap;
}
.card{
    width:320px;
    background:white;
    border-radius:10px;
    box-shadow:0px 0px 10px gray;
    padding:20px;
}
.card h2{
    color:#007bff;
    margin-bottom:15px;
}
.card p{
    margin:10px 0;
}
.btn{
    display:block;
    text-align:center;
    background:#007bff;
    color:white;
    padding:10px;
    text-decoration:none;
    border-radius:5px;
    margin-top:15px;
}
.btn:hover{
    background:#0056b3;
}
.search-form{

width:90%;
margin:20px auto;
display:flex;
justify-content:center;
gap:10px;

}

.search-form input{

width:400px;
padding:12px;
border:1px solid #ccc;
border-radius:5px;

}

.search-form button{

padding:12px 20px;
background:#007bff;
color:white;
border:none;
border-radius:5px;
cursor:pointer;

}

.search-form button:hover{

background:#0056b3;

}
</style>
</head>
<body>
    <h1 class="heading">Available Events</h1>
    <form method="GET" action="events.php" class="search-form">

<input
type="text"
name="search"
placeholder="Search Event..."
value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">

<button type="submit">

Search

</button>
<form method="GET">

<select name="category">

<option value="">All Categories</option>

<option>Movie</option>

<option>Concert</option>

<option>Sports</option>

<option>Festival</option>

<option>Seminar</option>

</select>

<button>

Filter

</button>

</form>
</form>
    <div class="container">
    <?php
        if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
    ?>
        <div class="card">
            <h2><?php echo $row["event_name"]; ?>   </h2>
            <p><b>Category :</b> <?php echo $row["category"]; ?></p>
            <p><b>Venue :</b> <?php echo $row["venue"]; ?></p>
            <p><b>Date :</b> <?php echo $row["event_date"]; ?></p>
            <p><b>Time :</b> <?php echo $row["event_time"]; ?></p>
            <p><b>Price :</b> ₹<?php echo $row["ticket_price"]; ?></p>
            <p><b>Available Seats :</b> <?php echo $row["available_seats"]; ?></p>
            <p>
                <?php echo $row["description"]; ?>  </p>
            <a class="btn" href="bookticket.php?id=<?php echo $row["id"]; ?>">Book Ticket</a>
        </div>
    <?php
}
}
else{
echo "<h2>No Events Available.</h2>";
}
?>
</div>
</body>
</html>
<?php
include("footer.php");
?>