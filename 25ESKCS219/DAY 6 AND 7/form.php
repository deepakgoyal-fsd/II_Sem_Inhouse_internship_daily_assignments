<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f8fafc;
            color: #334155;
            transition: background-color 0.3s, color 0.3s;
            margin: 0;
            padding: 0;
        }

        .f_wrap {
            width: 100%;
            max-width: 420px;
            background-color: #ffffff;
            border-top: 5px solid #3b82f6;
            border-radius: 12px;
            padding: 35px 30px;
            margin: 40px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        h1 {
            text-align: center;
            color: #0f172a;
            font-size: 26px;
            margin-bottom: 25px;
            font-weight: 700;
        }

        .l_txt {
            color: #475569;
            margin-top: 10px;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 600;
            display: block;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background-color: #f1f5f9;
            color: #0f172a;
            outline: none;
            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #3b82f6;
        }

        .s_btn {
            width: 100%;
            padding: 14px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: 0.2s;
            margin-top: 15px;
        }

        .s_btn:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
        }

        #dm_tg {
            padding: 8px 16px;
            border: 2px solid #cbd5e1;
            border-radius: 6px;
            cursor: pointer;
            background: transparent;
            color: #334155;
            font-weight: bold;
            margin-bottom: 20px;
            display: block;
            width: 100%;
            transition: 0.3s;
        }

        #dm_tg:hover {
            background: #e2e8f0;
        }

        /* Dark Mode Theme */
        .d_thm {
            background-color: #0f172a;
            color: #f8fafc;
        }

        .d_thm .f_wrap {
            background-color: #1e293b;
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }

        .d_thm h1 {
            color: #f8fafc;
        }

        .d_thm .l_txt {
            color: #94a3b8;
        }

        .d_thm input {
            background-color: #0f172a;
            border-color: #334155;
            color: #f8fafc;
        }

        .d_thm #dm_tg {
            color: #f8fafc;
            border-color: #475569;
        }

        .d_thm #dm_tg:hover {
            background: #334155;
        }
    </style>
</head>
<body>
    <div class="f_wrap">
        <button id="dm_tg">🌙 Dark Mode</button>
        
        <h1>Registration Form</h1>
        
        <!-- Note: I kept the "name" attributes the same so your process.php still works -->
        <form action="process.php" method="post">
            <label class="l_txt">Enter your name</label>
            <input type="text" id="i_nm" name="name" placeholder="Enter your name">
            
            <label class="l_txt">Enter your email</label>
            <input type="email" id="i_em" name="email" placeholder="Enter your email ID">
            
            <label class="l_txt">Enter your college name</label>
            <input type="text" id="i_cl" name="college" placeholder="Enter your college name">
            
            <label class="l_txt">Enter your branch name</label>
            <input type="text" id="i_br" name="branch" placeholder="Enter you branch">
            
            <label class="l_txt">Enter your phone number</label>
            <input type="number" id="i_ph" name="mobile_number" placeholder="Enter your mobile number">
            
            <label class="l_txt">Enter your password</label>
            <input type="password" id="i_pw" name="password" placeholder="Enter your password">
            
            <label class="l_txt">Re-enter your password</label>
            <input type="password" id="i_cp" name="confirm_password" placeholder="Enter password again">
            
            <button type="submit" class="s_btn">SUBMIT FORM</button> 
        </form>
    </div>

    <script>
        const tb = document.getElementById("dm_tg");

        if (localStorage.getItem("tm_val") === "drk") {
            document.body.classList.add("d_thm");
            tb.innerHTML = "☀️ Light Mode";
        }

        tb.addEventListener("click", function() {
            document.body.classList.toggle("d_thm");

            if (document.body.classList.contains("d_thm")) {
                localStorage.setItem("tm_val", "drk");
                tb.innerHTML = "☀️ Light Mode";
            } else {
                localStorage.setItem("tm_val", "lgt");
                tb.innerHTML = "🌙 Dark Mode";
            }
        });
    </script>
</body>
</html>