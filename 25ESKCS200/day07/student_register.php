<?php
$name = "Aarav Mehta";
$college = "Tech Institute of Technology";
$branch = "Computer Science & Engineering";
$yearOfStudy = "3rd Year";
$bio = "Passionate full-stack developer obsessed with performance tuning and building clean web interfaces.";

$currentYear = (int)date("Y");
$currentMonth = (int)date("n"); 

if ($currentMonth < 6) {$academicYear = ($currentYear - 1) . "-" . $currentYear;
} else {
    $academicYear = $currentYear . "-" . ($currentYear + 1);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .id-card {
            max-width: 450px;
            width: 100%;
            background-color: #1e293b;
            border: 2px solid #38bdf8;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(56, 189, 248, 0.15);
        }
        .card-header-accent {
            background: linear-gradient(135deg, #0284c7, #38bdf8);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }
        .profile-img {
            width: 110px;
            height: 110px;
            object-fit: cover;
            border: 4px solid #1e293b;
            margin-top: -55px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        .label-title {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
            margin-bottom: 0.1rem;
        }
        .info-value {
            font-weight: 600;
            color: #f1f5f9;
            margin-bottom: 0.8rem;
        }
        .bio-box {
            background-color: #0f172a;
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #334155;
            font-size: 0.9rem;
            color: #cbd5e1;
        }
    </style>
</head>
<body>

    <div class="id-card">
        <div class="card-header-accent">
            <h4 class="m-0 fw-bold"><?php echo $college; ?></h4>
            <span class="badge bg-dark mt-2">STUDENT ID</span>
        </div>
        
        <div class="text-center">