<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data View</title>
    <style>
        body {
            font-family: 'Verdana', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            padding: 30px;
        }
        .b_wrp {
            background: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            max-width: 600px;
            margin: 0 auto;
        }
        h1 { color: #0366d6; font-size: 28px; }
        h2 { color: #d73a49; font-size: 22px; }
        h3 { color: #6f42c1; font-size: 18px; }
        p { font-size: 15px; color: #586069; }
    </style>
</head>
<body>
    <div class="b_wrp">
        <h1>
            <?php echo "this is mayank"; ?>
        </h1>
        
        <p>this is a pragraph</p>
        
        <h2><?php echo "kuanl dhar"; ?></h2>
        
        <?php
        $v_x = "rahul";
        ?>
        
        <h3><?php echo $v_x; ?></h3> 
        
        <?php
        $a_s = ["rahul", "anan", "jatin"];
        echo $a_s[0] . "<br>";
        echo $a_s[1] . "<br>";
        echo $a_s[2] . "<br>";
        
        $u_n = "mayank sharma";
        $u_c = "skit jaipur";
        $u_b = "cse";
        ?>
        
        <h1>hello, <?= $u_n ?></h1>
        <p><?= $u_c ?> | <?= $u_b ?></p>
        
        <?php
        date_default_timezone_set("Asia/Kolkata");
        echo date("d-m-Y H:i:s");
        ?>
    </div>
</body>
</html>