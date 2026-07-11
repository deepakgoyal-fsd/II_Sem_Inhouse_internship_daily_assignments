<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Form</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#4facfe;
}

.container{
    width:400px;
    margin:50px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

input,select,textarea{
    width:100%;
    padding:10px;
    margin:8px 0;
}

button{
    width:100%;
    padding:10px;
    background:#007bff;
    color:white;
    border:none;
    cursor:pointer;
}
</style>

</head>
<body>

<div class="container">

<h2 align="center">Registration Form</h2>

<form action="process.php" method="POST">

<label>Name</label>
<input type="text" name="name" required>

<label>Email</label>
<input type="email" name="email" required>

<label>Mobile</label>
<input type="text" name="mobile" required>

<label>Gender</label>
<select name="gender" required>
<option value="">Select</option>
<option>Male</option>
<option>Female</option>
<option>Other</option>
</select>

<label>Course</label>
<select name="course" required>
<option value="">Select</option>
<option>BCA</option>
<option>B.Tech</option>
<option>BBA</option>
<option>B.Com</option>
</select>

<label>Address</label>
<textarea name="address"></textarea>

<label>Password</label>
<input type="password" name="password" required>

<button type="submit" name="register">Register</button>

</form>

</div>

</body>
</html>