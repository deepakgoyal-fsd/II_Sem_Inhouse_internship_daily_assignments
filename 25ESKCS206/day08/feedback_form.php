<?php
$isPost = ($_SERVER["REQUEST_METHOD"] == "POST");
$name = isset($_POST['name']) ? trim($_POST['name']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Hub</title>
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
        .feedback-card {
            max-width: 550px;
            width: 100%;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        .form-control {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
        }
        .form-control:focus {
            background-color: #0f172a;
            border-color: #38bdf8;
            color: #f8fafc;
            box-shadow: 0 0 0 0.25rem rgba(56, 189, 248, 0.25);
        }
        .data-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #94a3b8;
        }
        .data-value {
            font-weight: 500;
            color: #e2e8f0;
        }
        .message-box {
            background-color: #0f172a;
            border-radius: 6px;
            padding: 0.75rem;
            border: 1px solid #334155;
            color: #cbd5e1;
            font-style: italic;
        }
    </style>
</head>
<body>

    <div class="feedback-card p-4 m-3">
        <?php if ($isPost): ?>
            <div class="alert alert-success border-0 shadow-sm text-center p-4 mb-4" role="alert">
                <h2 class="alert-heading fw-bold">Thank you, <?php echo htmlspecialchars($name); ?>!</h2>
                <p class="mb-0 mt-2 small">Your submission has been successfully transmitted via POST.</p>
            </div>

            <div class="px-2">
                <h5 class="fw-bold text-info mb-3 pb-1 border-bottom border-secondary">Submission Summary</h5>
                
                <div class="mb-3">
                    <div class="data-label">Sender Name</div>
                    <div class="data-value"><?php echo htmlspecialchars($name); ?></div>
                </div>
                <div class="mb-3">
                    <div class="data-label">Email Address</div>
                    <div class="data-value"><?php echo htmlspecialchars($email); ?></div>
                </div>
                <div class="mb-3">
                    <div class="data-label">Message</div>
                    <div class="message-box"><?php echo nl2br(htmlspecialchars($message)); ?></div>
                </div>
            </div>
        <?php else: ?>
            <form method="post" action="" class="px-2">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea id="message" name="message" class="form-control" rows="5" required><?php echo htmlspecialchars($message); ?></textarea>
                </div>
                <button type="submit" class="btn btn-info w-100">Submit Feedback</button>
            </form>
        <?php endif; ?>
    </div>

</body>
</html>
