<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Locaton: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Events</title>
    <style>
        body{
            background:#f2f2f2;

            font-family:Arial, Helvetica, sans-serif;
        }
        .container{
            width:550px;
            margin:40px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0px 0px 10px gray;
        }
h2{

    text-align:center;
    margin-bottom:20px;
    color:#007bff;

}

input,
select,
textarea{

    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:5px;
    font-size:16px;

}

textarea{

    resize:none;
    height:120px;

}

button{

    width:100%;
    padding:12px;
    border:none;
    background:#007bff;
    color:white;
    font-size:17px;
    border-radius:5px;
    cursor:pointer;

}

button:hover{

    background:#0056b3;

}

    </style>
</head>
<body>
    <div class="container">
        <h2>Add New Evnet</h2>
        <form action="check_event.php" method="POST">
            <input type="text" name="event_name" placeholder="Enter Your Event Name">
            <select name="category">
                <option>Movie</option>
                <option>Concert</option>
                <option>Sports</option>
                <option>Seminar</option>
                <option>Festival</option>
            </select>
            <input type="text" name="venue" placeholder="Enter Your Event Venue">
            <input type="date" name="event_date">
            <input type="time" name="event_time">
            <input type="number" name="Ticket_price" placeholder="Ticket Price">
            <input type="number" name="Total_seats" placeholder="Total Seats">
            <textarea type="description" name="Event_description" placeholder="Event Description"></textarea>
            <button type="submit">Add Events<button>
        </form>
    </div>
</body>
</html>