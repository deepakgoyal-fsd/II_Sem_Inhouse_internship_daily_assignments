<?php
include("header.php");
include("db_connect.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USER  REGISTRATION</title>
    <style>
    h2{
        text-align : center;
    }        
form {
  max-width: 500px;
  margin: 40px auto;
  background-color: #f9f9f9;
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  font-family: 'Segoe UI', sans-serif;
}

/* Input Fields */
input, select {
  width: 100%;
  padding: 10px;
  margin: 10px 0;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 1rem;
  transition: 0.3s;
}

input:focus, select:focus {
  border-color: #007bff;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
  outline: none;
}

/* Buttons */
button {
  width: 48%;
  padding: 10px;
  margin: 10px 1%;
  border: none;
  border-radius: 6px;
  font-size: 1rem;
  cursor: pointer;
  transition: 0.3s;
}

button[type="submit"] {
  background-color: #007bff;
  color: white;
}

button[type="reset"] {
  background-color: #ccc;
  color: #333;
}

button:hover {
  transform: scale(1.05);
}

/* Responsive */
@media (max-width: 600px) {
  form {
    width: 90%;
    padding: 20px;
  }
  button {
    width: 100%;
    margin: 10px 0;
  }
}

    </style>
</head>
<body>
    <div class="container">
        <h2>USER REGISTRATION</h2>
        <form action="checkregistrationerror.php" method="POST">
        <input type="text" name="fullname" placeholder="Enter your Name" required>
        <input type="text" name="username" placeholder="Enter your userName" required>
        <input type="text" name="email" placeholder="Enter your Email" required>
        <input type="number" name="phone" placeholder="Enter your Number" required>
        <input type="date" name="dob" required>
        <select name="gender">
            <option>Select Gensder</option>
            <option>Male</option>
            <option>female</option>
            <option>Transgender</option>
            <option>Rather not to say</option>
        </select>
        <input type="text" name="address" placeholder="Enter your Address" required>
        <input type="text" name="city" placeholder="City" required>
        <input type="text" name="state" placeholder="State" required>
        <input type="password" name="password" placeholder="Enter your Password" required>
        <button type="submit">Register</button>
        <button type="reset">Reset</button>
        <div class="login-link">
          Already have an account?
          <a href="login.php">Login</a>
        </div>
        </form>
    </div>
</body>
</html>
<?php
include("footer.php");
?>