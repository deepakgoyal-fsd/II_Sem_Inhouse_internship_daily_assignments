<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>


    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">


    <style>

        body {
            background: linear-gradient(135deg, #eef2ff, #f5f3ff);
            min-height: 100vh;
        }


        .navbar-custom {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
        }


        .registration-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }


        .form-header {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            color: white;
            padding: 30px;
            text-align: center;
        }


        .profile-placeholder {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background-color: #f8f9fa;
            border: 3px dashed #6c757d;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            font-size: 45px;
            color: #6f42c1;
        }


        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 11px;
        }


        .form-control:focus,
        .form-select:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.20);
        }


        .submit-btn {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
        }


        .submit-btn:hover {
            opacity: 0.9;
        }


        .confirmation-header {
            background: linear-gradient(135deg, #198754, #20c997);
            color: white;
            padding: 35px;
            text-align: center;
        }


        .detail-card {
            background-color: #f8f9fa;
            border-left: 4px solid #6f42c1;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 12px;
        }


        .footer {
            background-color: #212529;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
        }

    </style>

</head>


<body>


<!-- Navigation Bar -->

<nav class="navbar navbar-dark navbar-custom shadow">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">

            <i class="fa-solid fa-graduation-cap me-2"></i>

            Student Registration System

        </a>


        <span class="badge bg-light text-primary">

            Student Portal

        </span>

    </div>

</nav> 