<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeSphere Enrollment</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins',sans-serif;
        }

        body{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#0f172a,#2563eb);
        }

        .container{
            width:450px;
            background:#fff;
            padding:35px;
            border-radius:18px;
            box-shadow:0 18px 35px rgba(0,0,0,.25);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#1e3a8a;
            font-size:30px;
        }

        .input-box{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:7px;
            color:#333;
            font-weight:600;
        }

        input,
        select,
        textarea{
            width:100%;
            padding:12px;
            border:1px solid #cfd8e3;
            border-radius:10px;
            outline:none;
            font-size:15px;
            transition:.3s;
        }

        input:focus,
        select:focus,
        textarea:focus{
            border-color:#2563eb;
            box-shadow:0 0 8px rgba(37,99,235,.25);
        }

        .hobbies{
            display:flex;
            gap:15px;
            flex-wrap:wrap;
        }

        .hobbies label{
            font-weight:normal;
        }

        button{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:linear-gradient(135deg,#1d4ed8,#2563eb);
            color:white;
            font-size:18px;
            cursor:pointer;
            margin-top:15px;
            transition:.3s;
        }

        button:hover{
            transform:translateY(-3px);
            box-shadow:0 10px 20px rgba(37,99,235,.35);
        }

    </style>

</head>

<body>

<div class="container">

<h2>Student Registration</h2>

<form action="process.php" method="POST">

<div class="input-box">
<label>Student Name</label>
<input type="text" name="name" placeholder="Enter your full name" required>
</div>

<div class="input-box">
<label>Email ID</label>
<input type="email" name="email" placeholder="Enter your email" required>
</div>

<div class="input-box">
<label>Create Password</label>
<input type="password" name="password" placeholder="Enter password" required>
</div>

<div class="input-box">
<label>Mobile Number</label>
<input type="number" name="phone" placeholder="Enter mobile number" required>
</div>

<div class="input-box">

<label>Gender</label>

<select name="gender">

<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>

</select>

</div>

<div class="input-box">

<label>Interests</label>

<div class="hobbies">

<label>
<input type="checkbox" name="hobbies[]" value="Programming">
Programming
</label>

<label>
<input type="checkbox" name="hobbies[]" value="Music">
Music
</label>

<label>
<input type="checkbox" name="hobbies[]" value="Reading">
Reading
</label>

<label>
<input type="checkbox" name="hobbies[]" value="Sports">
Sports
</label>

</div>

</div>

<div class="input-box">

<label>Residential Address</label>

<textarea
name="address"
rows="3"
placeholder="Enter your address"></textarea>

</div>

<button type="submit">

Enroll Now

</button>

</form>

</div>

</body>
</html>