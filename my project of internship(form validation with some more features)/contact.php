<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact Us</title>

<style>
    /* body{
        background-color: #1e4864;
    }

.content{
    margin-left:260px;
    padding:20px;
}

.form-box{
    width:500px;
    margin:auto;
    background:blueviolet;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 5px 15px rgba(0,0,0,.2);
}

h2{
    text-align:center;
    margin-bottom:20px;
}

label{
    font-weight:bold;
}

input,
textarea{

    width:100%;
    padding:10px;
    margin-top:5px;
    margin-bottom:15px;
    border:1px solid #ccc;
    border-radius:5px;
}

textarea{
    resize:none;
}

button{

    width:100%;
    padding:12px;
    background:#3498db;
    color:white;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:17px;
}

button:hover{

    background:#2980b9;
} */
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background-image: url("background.jpg");
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:30px;
}

.container{
    width:100%;
    max-width:650px;
    background:rgba(255,255,255,0.12);
    backdrop-filter:blur(15px);
    border:1px solid rgba(255,255,255,0.2);
    border-radius:20px;
    padding:35px;
    box-shadow:0 15px 35px rgba(0,0,0,0.4);
}

.container h2{
    color:#fff;
    text-align:center;
    margin-bottom:25px;
    font-size:32px;
}

label{
    display:block;
    color:#fff;
    margin:12px 0 6px;
    font-weight:600;
}

input,
select,
textarea{
    width:100%;
    padding:13px;
    border:none;
    outline:none;
    border-radius:10px;
    font-size:16px;
    background:rgba(255,255,255,0.9);
    transition:.3s;
}

input:focus,
select:focus,
textarea:focus{
    border:2px solid #00e5ff;
    transform:scale(1.02);
    box-shadow:0 0 12px rgba(0,229,255,.5);
}

textarea{
    resize:none;
    height:120px;
}

button{
    width:100%;
    margin-top:25px;
    padding:14px;
    background:linear-gradient(45deg,#00c6ff,#0072ff);
    color:#fff;
    border:none;
    border-radius:10px;
    font-size:18px;
    font-weight:bold;
    cursor:pointer;
    transition:.3s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 20px rgba(0,114,255,.4);
}

::placeholder{
    color:#666;
}

@media(max-width:768px){
    .container{
        padding:20px;
    }

    .container h2{
        font-size:26px;
    }
}

</style>

</head>

<body>
    <div class="container">

<div class="content">

<div class="form-box">

<h2>Contact Us</h2>

<form action="contact_process.php" method="POST">

<label>Name</label>
<input type="text" name="name" required>

<label>Class</label>
<input type="text" name="class" required>

<label>Email</label>
<input type="email" name="email" required>

<label>City</label>
<input type="text" name="city" required>

<label>Mobile Number</label>
<input type="text" name="mobile" required>

<label>College</label>
<input type="text" name="college" required>

<label>Subject</label>
<input type="text" name="subject" required>

<label>Message</label>
<textarea name="message" rows="5" required></textarea>

<button type="submit">
Submit Query
</button>

</form>
<br>
<button class="button" type="button" onclick="window.location.href='dashboard.php'">Go to Home</button>
</div>


</div>
<div>

</body>
</html>