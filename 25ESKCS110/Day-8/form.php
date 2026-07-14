<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #333333;
            font-size: 24px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #666666;
            font-size: 14px;
            font-weight: 600;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #4abc96;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #4abc96;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #389e7d;
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="process.php" method="POST">
            
            <!-- Name Section -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="student_name" required placeholder="Enter your Name">
            </div>

            <!-- College Section -->
            <div class="form-group">
                <label for="college">College</label>
                <input type="text" id="college" name="student_college" required placeholder="Enter your College Name">
            </div>

            <!-- Branch Section -->
            <div class="form-group">
                <label for="branch">Branch</label>
                <select id="branch" name="student_branch" required>
                    <option value="" disabled selected>Select your branch</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Civil">Civil</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Submit Information</button>
            
        </form>
    </div>

</body>
</html>