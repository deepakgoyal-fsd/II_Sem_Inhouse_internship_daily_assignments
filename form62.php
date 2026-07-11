<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e8892;
        }

        .container {
            width: 500px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }

        h1 {
            color: blue;
            text-align: center;
        }

        img {
            display:block;
            margin: 0 auto 15px;
            width: 120px;
            border-radius: 50%;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        .radio-group input,
        .checkbox-group input {
            width: auto;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .buttons input {
            width: 120px;
            margin: 5px;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- Single Image -->
    <img src="https://static.vecteezy.com/system/resources/previews/028/597/534/original/young-cartoon-female-avatar-student-character-wearing-eyeglasses-file-no-background-ai-generated-png.png" alt="Profile">

    <h1>Registration Form</h1>
    <p align="center">Submit this form for online registration</p>

    <form>

        <label>Name:</label>
        <input type="text" name="fullName" placeholder="Enter your name" required>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required>

        <label>Phone Number:</label>
        <input type="tel" name="phone" placeholder="Enter your phone number" required>

        <label>Branch:</label>
        <select name="branch" required>
            <option value="">Select Branch</option>
            <option>CSE</option>
            <option>CSE IOT</option>
            <option>CSE AI </option>
            <option>CSE DS</option>
            <option>Electrical</option>
            <option>Mechanical</option>
            <option>Civil</option>
        </select>

        <label>Gender:</label>
        <div class="radio-group">
            <input type="radio" name="gender" value="Male"> Male
            <input type="radio" name="gender" value="Female"> Female
            <input type="radio" name="gender" value="Other"> Other
        </div>

        <label>Date of Birth:</label>
        <input type="date" name="dob">

        <label>Password:</label>
        <input type="password" name="password">

        <label>City:</label>
        <select name="city">
            <option>Select City</option>
            <option>Jaipur</option>
            <option>Delhi</option>
            <option>Mumbai</option>
            <option>Bangalore</option>
        </select>

        <label>Hobbies:</label>
        <div class="checkbox-group">
            <input type="checkbox"> Reading
            <input type="checkbox"> Music
            <input type="checkbox"> Sports
        </div>

        
        <br>

        <input type="checkbox" required> I accept the Terms & Conditions

        <div class="buttons">
            <input type="submit" value="Register">
            <input type="reset" value="Reset">
        </div>

    </form>

</div>

</body>
</html>
