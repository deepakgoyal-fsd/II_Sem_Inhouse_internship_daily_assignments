<?php
include("db_connect.php");
// Simple POST receiver: validates and displays form input
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$errors = [];
	$name  = trim($_POST['txtName']  ?? '');
	$email = trim($_POST['txtEmail'] ?? '');
	$phone = trim($_POST['txtPhone'] ?? '');

	if ($name === '') $errors[] = 'Name is required.';
	if ($email === '') $errors[] = 'Email is required.';
	elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Invalid email.';
	if ($phone === '') $errors[] = 'Phone is required.';
	elseif (!ctype_digit($phone)) $errors[] = 'Phone must be digits only.';

	// Handle file upload (optional)
	$uploadedFilePath = '';
	if (isset($_FILES['myfile']) && $_FILES['myfile']['error'] !== UPLOAD_ERR_NO_FILE) {
		$allowed = ['jpg','jpeg','png','gif','webp'];
		$maxSize = 5 * 1024 * 1024; // 5 MB
		$ext = strtolower(pathinfo($_FILES['myfile']['name'], PATHINFO_EXTENSION));

		if (!in_array($ext, $allowed)) {
			$errors[] = 'Uploaded file must be an image (jpg, png, gif, webp).';
		} elseif ($_FILES['myfile']['size'] > $maxSize) {
			$errors[] = 'Uploaded file must be under 5 MB.';
		} else {
			$folder = __DIR__ . '/upload';
			if (!is_dir($folder)) mkdir($folder, 0777, true);
			$newName = time() . '_' . rand(1000,9999) . '.' . $ext;
			$target = $folder . '/' . $newName;
			if (move_uploaded_file($_FILES['myfile']['tmp_name'], $target)) {
				$uploadedFilePath = 'upload/' . $newName; // relative URL for display
			} else {
				$errors[] = 'Failed to move uploaded file.';
			}
		}
	}

	header('Content-Type: text/html; charset=utf-8');
} else {
	$errors = ['No POST data received.'];
	$name = $email = $phone = '';
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration Result</title>
	<style>body{font-family:Arial;padding:20px}</style>
</head>
<body>
<?php if (!empty($errors)): ?>
	<h2>Errors</h2>
	<ul>
		<?php foreach ($errors as $e): ?>
			<li><?php echo htmlspecialchars($e, ENT_QUOTES, 'UTF-8'); ?></li>
		<?php endforeach; ?>
	</ul>
	<p><a href="file1.html">Back to form</a></p>
<?php else: ?>
	<h2>Submitted</h2>
	<p>Name: <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></p>
	<p>Email: <?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></p>
	<p>Phone: <?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?></p>
	<?php if (!empty($uploadedFilePath)): ?>
		<p>Uploaded file:</p>
		<img src="<?php echo htmlspecialchars($uploadedFilePath, ENT_QUOTES, 'UTF-8'); ?>" alt="Uploaded" style="max-width:300px;display:block;margin-top:8px">
	<?php endif; ?>
<?php endif; ?>
</body>
</html>

