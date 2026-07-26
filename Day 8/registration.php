<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background: burlywood;
        }
        nav {
            background: black;
            color: white;
            justify-content: space-between;
            align-items: center;
            display: flex;
            width: 100%;
            padding: 15px 50px;
        }
        .logo {
            font-size: 28px;
            font-weight: bold;
        }
        .main a{
            color: white;
            margin-left: 25px;
            font-size: 18px;
        }
        .main a:hover{
            color: yellow;
        }
        #toggleBtn {
            border: none;
            border-radius: 5px;
            padding: 8px 15px;
            cursor: pointer;
        }
        .container {
            width: 400px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px gray;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-top: 15px;
        }
        input[type=text], input[type=email], input[type=password], select, textarea {
            border-radius: 5px;
            border: 1px solid grey;
            width: 100%;
            margin-top: 5px;
            padding: 10px;
        }
        textarea {
            resize: none;
            height: 100px;
        }
        .gender, .skills {
            margin-top: 10px;
        }
        .gender input, .skills input {
            margin-right: 5px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 20px;
            background: blue;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background: darkblue;
        }
        .btns {
            display: flex;
            justify-content: space-between;
        }
        .error {
            color: red;
            font-size: 14px;
        }
        .counter {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
    
</head>

<body>
    <nav>
        <div class="logo">My Website</div>
        <div class="main">
            <a href="#">Home</a>
            <a href="#">Contact</a>
            <a href="#">About</a>

            <button id="toggleBtn">Dark</button>
        </div>
    </nav>
    <div class="container">
        <h2>Registration Form</h2>
<form id="myForm" action="process.php" method="POST" enctype="multipart/form-data">            <label>Name</label>
            <input type="text" id="name" name="name">
            <small class="error" id="nameError"></small>
            <label>Email</label>
            <input type="email" id="email" name="email">
            <small class="error" id="emailError"></small>
            <label>Password</label>
            <input type="password" id="password" name="password">
            <small class="error" id="passwordError"></small>
            <label>Gender</label>
            <div class="gender">
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
            </div>
            <small class="error" id="genderError"></small>
            <label>Select Course</label>
            <select id="course" name="course">
                <option value="">--Select Course</option>
                <option>BTech CSE</option>
                <option>BTech IT</option>
                <option>BTech DS</option>
                <option>BTech AI</option>
            </select>
            <small class="error" id="courseError"></small>
            <label>Skills</label>
            <div class="skills">
                <input type="checkbox" name="skills[]" class="skill" value="HTML">HTML <br>
                <input type="checkbox" name="skills[]" value="CSS" class="skill">CSS <br>
                <input type="checkbox" name="skills[]" value="JavaScript" class="skill">JavaScript <br>
                <input type="checkbox" name="skills[]" value="PHP" class="skill">PHP <br>
            </div>
            <small class="error" id="skillError"></small>
            <label>Upload Resume</label>
            <input type="file" id="resume" name="resume">
            <small class="error" id="resumeError"></small>    
            <label>About Yourself</label>
            <textarea id="about" name="about" placeholder="Write something about yourself"></textarea>  
            <small class="error" id="aboutError"></small>
            <div class="btns">
                <button type="submit">Submit</button>
                <button type="reset">Reset</button>
            </div>
            <div class="counter">
                Submit Count
                <span id="count">0</span>
            </div>
        </form>
    </div>

    <script>
        let submitCount = 0;
        document.getElementById("myForm").addEventListener("submit", function(event){
            event.preventDefault();
            // submitCount++;
            document.getElementById("count").innerHTML = submitCount;

            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let gender = document.querySelector('input[name="gender"]:checked');
            let course = document.getElementById("course").value;
            let skills = document.querySelectorAll(".skill:checked");
            let resume = document.getElementById("resume").value;
            let about = document.getElementById("about").value.trim();
            document.getElementById("nameError").innerHTML = "";
            document.getElementById("emailError").innerHTML = "";
            document.getElementById("passwordError").innerHTML = "";
            document.getElementById("genderError").innerHTML = "";
            document.getElementById("courseError").innerHTML = "";
            document.getElementById("skillError").innerHTML = "";
            document.getElementById("resumeError").innerHTML = "";
            document.getElementById("aboutError").innerHTML = "";

            let valid = true;
            if(name == ""){
                document.getElementById("nameError").innerHTML = "Name is required";
                valid = false;
            }
            if(email == ""){
                document.getElementById("emailError").innerHTML = "Email is required";
                valid = false;
            }
            if(password == ""){
                document.getElementById("passwordError").innerHTML = "Password is required";
                valid = false;
            }
            if(!gender){
                document.getElementById("genderError").innerHTML = "Select your gender";
                valid = false;
            }
            if(course == ""){
                document.getElementById("courseError").innerHTML = "Select a course";
                valid = false;
            }
            if(skills.length == 0){
                document.getElementById("skillError").innerHTML = "Select at least one skill";
                valid = false;
            }
            if(resume == ""){
                document.getElementById("resumeError").innerHTML = "Upload your resume";
                valid = false;
            }
            if(about == ""){
                document.getElementById("aboutError").innerHTML = "About yourself is required"
            }
            if(valid){
                alert("Form submitted Successfully!");
                this.submit();
                submitCount++;
            }

        });

        let dark = false;
        document.getElementById("toggleBtn").addEventListener("click", function(){
            if(!dark){
                document.body.style.background = "darkgrey"; 
                document.querySelector(".container").style.background = "black";
                document.querySelector(".container").style.color = "white";
                this.innerHTML = "light";
                dark = true;
            }else{
                document.body.style.background = "burlywood"; 
                document.querySelector(".container").style.background = "white";
                document.querySelector(".container").style.color = "black";
                this.innerHTML = "Dark";
                dark = false;
            }
        });
    </script>
</body>
</html>