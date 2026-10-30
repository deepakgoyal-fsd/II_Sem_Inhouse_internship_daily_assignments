<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #0f172a;
            color: #f8fafc;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #1e293b;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            border: 1px solid #334155;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            color: #38bdf8;
            margin-top: 0;
            margin-bottom: 1.5rem;
            font-size: 1.75rem;
            border-bottom: 2px solid #334155;
            padding-bottom: 0.5rem;
        }
        .info-group {
            margin-bottom: 1rem;
        }
        .label {
            font-size: 0.85rem;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .value {
            font-size: 1.1rem;
            font-weight: 600;
            color: #e2e8f0;
        }
        .ip-badge {
            margin-top: 1.5rem;
            background-color: #0f172a;
            padding: 0.75rem;
            border-radius: 6px;
            text-align: center;
            font-size: 0.9rem;
            color: #38bdf8;
            border: 1px dashed #334155;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Dashboard</h1>
        
        <div class="info-group">
            <div class="label">User Name</div>
            <div class="value">John Doe</div>
        </div>

        <div class="info-group">
            <div class="label">Current Date</div>
            <div class="value"><?php echo date("Y-m-d"); ?></div>
        </div>

        <div class="info-group">
            <div class="label">Current Time</div>
            <div class="value"><?php echo date("H:i:s"); ?></div>
        </div>

        <div class="info-group">
            <div class="label">Favourite Programming Language</div>
            <div class="value">PHP</div>
        </div>

        <div class="ip-badge">
            You are visiting from: <?php echo $_SERVER['REMOTE_ADDR']; ?>
        </div>
    </div>

</body>
</html>