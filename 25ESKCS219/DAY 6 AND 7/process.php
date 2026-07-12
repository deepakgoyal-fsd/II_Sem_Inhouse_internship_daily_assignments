<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Result</title>
    <style>
        body {
            background-color: #f1f5f9;
            color: #334155;
            transition: 0.3s;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .d_m {
            background-color: #0f172a;
            color: #f8fafc;
        }

        .c_bx {
            width: 420px;
            background-color: #ffffff;
            border-top: 5px solid #10b981;
            border-radius: 12px;
            padding: 30px;
            margin: 40px auto;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .d_m .c_bx {
            background-color: #1e293b;
            box-shadow: 0 8px 25px rgba(0,0,0,0.5);
        }

        h1 {
            text-align: center;
            color: #10b981;
            font-size: 26px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        h2 {
            text-align: center;
            color: #3b82f6;
            font-size: 20px;
            margin-bottom: 15px;
        }

        h3 {
            color: #475569;
            font-size: 15px;
            margin-bottom: 15px;
            line-height: 1.8;
            font-weight: 600;
        }

        .d_m h3 {
            color: #cbd5e1;
        }

        h4 {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 25px;
            text-align: right;
        }

        .d_m h4 {
            color: #94a3b8;
        }

        hr {
            border: 0;
            height: 1px;
            background: #cbd5e1;
            margin: 20px 0;
        }

        .d_m hr {
            background: #334155;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.2s;
            margin-bottom: 12px;
        }

        button:hover {
            background-color: #059669;
            transform: translateY(-2px);
        }

        .btn_g {
            background-color: #3b82f6;
        }

        .btn_g:hover {
            background-color: #2563eb;
        }

        #t_bt {
            width: auto;
            padding: 8px 16px;
            background: transparent;
            color: #334155;
            border: 2px solid #cbd5e1;
            display: block;
            margin: 0 auto 20px;
            font-size: 14px;
        }

        .d_m #t_bt {
            color: #f8fafc;
            border-color: #475569;
        }

        #t_bt:hover {
            background: #e2e8f0;
        }

        .d_m #t_bt:hover {
            background: #334155;
        }

        .f_bx {
            background-color: #334155;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
        }

        .d_m .f_bx {
            background-color: #020617;
        }
    </style>
</head>
<body>

    <div class="c_bx">
        <button id="t_bt">🌙 Dark Mode</button>
        
        <h1>
            <?php
            $n = trim($_POST['name'] ?? '');
            $e = trim($_POST['email'] ?? '');
            $m = trim($_POST['mobile_number'] ?? '');
            $p = trim($_POST['password'] ?? '');
            $cp = trim($_POST['confirm_password'] ?? '');

            if(empty($n)){
                echo "Name is required";
            } elseif(!filter_var($e, FILTER_VALIDATE_EMAIL)){
                echo "Invalid email ID";
            } elseif(!preg_match("/^[6-9][0-9]{9}$/", $m)) {
                echo "Invalid mobile number";
            } elseif(strlen($p) < 8){
                echo "Password must be 8 characters long";
            } elseif($p != $cp){
                echo "Passwords do not match";
            } else {
                echo "🎉 Registration Successful!<br>";
            }
            ?>
        </h1>
        
        <hr>
        <h2>Your details are</h2>
        
        <h3>
            <?php
            echo "Name = " . ($n) . "<br>";
            echo "College = " . ($_POST['college'] ?? '') . "<br>";
            echo "Branch = " . ($_POST['branch'] ?? '') . "<br>";
            echo "Mobile = " . ($m) . "<br>";
            echo "E-mail = " . ($e) . "<br>";
            ?>
        </h3>
        
        <h4>
            <?php
            date_default_timezone_set("Asia/Kolkata");
            echo "Date: " . date("d-m-Y") . "<br>";
            echo "Time: " . date("h:i:s A");
            ?>
        </h4>
        
        <button onclick="window.print()">Print Details</button>
        <a href="thord.php" style="text-decoration: none;">
            <button class="btn_g">Go Home</button>
        </a>
    </div>

    <footer class="f_bx">
        <p>© 2026 register form</p>
    </footer>

    <script>
        const tb = document.getElementById("t_bt");

        if(localStorage.getItem("t_m") === "drk"){
            document.body.classList.add("d_m");
            tb.innerHTML = "☀️ Light Mode";
        }

        tb.addEventListener("click", function(){
            document.body.classList.toggle("d_m");

            if(document.body.classList.contains("d_m")){
                localStorage.setItem("t_m", "drk");
                tb.innerHTML = "☀️ Light Mode";
            } else {
                localStorage.setItem("t_m", "lgt");
                tb.innerHTML = "🌙 Dark Mode";
            }
        });
    </script>
</body>
</html>