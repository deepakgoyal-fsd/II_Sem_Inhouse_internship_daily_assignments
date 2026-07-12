
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Data Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #1e4b8e;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background-color: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
      width: 350px;
      text-align: center;
    }
    h2 {
      margin-bottom: 20px;
      color: #1e4b8e;
    }
    input, select {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #1e4b8e;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    input[type="submit"]:hover {
      background-color: #163a6b;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Student Registration</h2>
    <form action="process_form.php" method="POST">
      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" placeholder="Enter your full name" required>

      <label for="email">Email ID</label>
      <input type="email" id="email" name="email" placeholder="Enter your email" required>

      <label for="branch">Branch</label>
      <select id="branch" name="branch" required>
        <option value="">Select your branch</option>
        <option value="AI">AI</option>
        <option value="Data Science">Data Science</option>
        <option value="CSE">CSE</option>
        <option value="IoT">IoT</option>
      </select>

      <label for="cgpa">CGPA</label>
      <input type="number" id="cgpa" name="cgpa" step="0.01" placeholder="Enter your CGPA" required>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
</html>
