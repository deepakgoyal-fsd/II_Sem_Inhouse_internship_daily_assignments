<?php


$errors = [];
$submitted = false;
$old = [
    'name' => '', 'email' => '', 'branch' => '', 'phone' => '',
    'gender' => '', 'course' => '', 'address' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Pull raw POST fields
    $old['name']    = trim($_POST['name'] ?? '');
    $old['email']   = trim($_POST['email'] ?? '');
    $old['branch']  = trim($_POST['branch'] ?? '');
    $old['phone']   = trim($_POST['phone'] ?? '');
    $old['gender']  = trim($_POST['gender'] ?? '');
    $old['course']  = trim($_POST['course'] ?? '');
    $old['address'] = trim($_POST['address'] ?? '');

    // ---- Full Validation ----

    // Name: required, no digits
    if ($old['name'] === '') {
        $errors[] = "Name is required.";
    } elseif (!preg_match('/^[A-Za-z\s]+$/', $old['name'])) {
        $errors[] = "Name cannot contain numbers or symbols.";
    }

    // Email: required, valid format
    if ($old['email'] === '') {
        $errors[] = "Email is required.";
    } elseif (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Branch: required
    if ($old['branch'] === '') {
        $errors[] = "Please select your branch.";
    }

    // Phone: required, exactly 10 digits
    if ($old['phone'] === '') {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match('/^[0-9]{10}$/', $old['phone'])) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    // Gender: required selection
    if ($old['gender'] === '') {
        $errors[] = "Please select a gender.";
    }

    // Course: required
    if ($old['course'] === '') {
        $errors[] = "Please select your course.";
    }

    // Address: required, minimum length
    if ($old['address'] === '') {
        $errors[] = "Address is required.";
    } elseif (strlen($old['address']) < 10) {
        $errors[] = "Address must be at least 10 characters long.";
    }

    // Photo: front-end UI only per spec — not stored/processed server-side.
    // We only read the filename (if provided) purely for display in the success card.
    $photoName = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $photoName = basename($_FILES['photo']['name']);
    }

    if (empty($errors)) {
        $submitted = true;
    }
}

function h($val) { return htmlspecialchars($val, ENT_QUOTES, 'UTF-8'); }

$branches = ['CSE', 'ECE', 'IT', 'ME', 'EEE', 'Civil'];
$courses  = ['B.Tech', 'B.Sc', 'BCA', 'M.Tech', 'MCA'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Registration System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700;800&family=Inter:wght@400;500;600&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
  :root{
    --bg:#0d1220;
    --panel:#141a2b;
    --card:#182036;
    --border:#28304a;
    --gold:#f5b942;
    --teal:#34d399;
    --danger:#fb7185;
    --text:#eef1fb;
    --dim:#8a90ab;
  }
  body{
    background:
      radial-gradient(circle at 90% 0%, rgba(245,185,66,0.08), transparent 40%),
      radial-gradient(circle at 5% 20%, rgba(52,211,153,0.07), transparent 40%),
      var(--bg);
    color:var(--text);
    font-family:'Inter', sans-serif;
    padding:52px 20px 80px;
  }
  .wrap{ max-width:760px; margin:0 auto; }

  .eyebrow{
    font-family:'JetBrains Mono', monospace; font-size:12px; letter-spacing:.14em;
    text-transform:uppercase; color:var(--gold); margin-bottom:10px;
    display:flex; align-items:center; gap:8px;
  }
  .eyebrow::before{ content:'●'; font-size:9px; }
  h1{ font-family:'Poppins', sans-serif; font-weight:800; font-size:30px; letter-spacing:-0.01em; margin-bottom:6px; }
  .sub{ color:var(--dim); font-size:14.5px; margin-bottom:28px; }

  .panel{
    background:var(--panel); border:1px solid var(--border); border-radius:16px;
    padding:32px;
  }

  .error-box{
    background:rgba(251,113,133,0.1); border:1px solid rgba(251,113,133,0.35);
    border-radius:12px; padding:16px 20px; margin-bottom:24px;
  }
  .error-box .title{ font-family:'Poppins', sans-serif; font-weight:600; color:var(--danger); font-size:14px; margin-bottom:8px; }
  .error-box ul{ margin:0; padding-left:18px; color:var(--text); font-size:13.5px; }
  .error-box li{ margin-bottom:4px; }

  label{ font-size:13px; font-weight:600; color:var(--dim); margin-bottom:6px; display:block; }
  .form-control, .form-select{
    background:var(--card); border:1px solid var(--border); color:var(--text);
    border-radius:10px; padding:10px 14px; font-size:14px;
  }
  .form-control:focus, .form-select:focus{
    background:var(--card); color:var(--text); border-color:var(--gold);
    box-shadow:0 0 0 3px rgba(245,185,66,0.15);
  }
  .form-control::placeholder{ color:var(--dim); }
  .mb-field{ margin-bottom:20px; }

  .gender-group{ display:flex; gap:18px; }
  .gender-group .form-check{ padding-left:0; }
  .gender-group .form-check-input{
    background-color:var(--card); border-color:var(--border); margin-right:6px;
  }
  .gender-group .form-check-input:checked{ background-color:var(--gold); border-color:var(--gold); }
  .gender-group label{ color:var(--text); font-weight:400; margin-bottom:0; }

  .photo-row{ display:flex; align-items:center; gap:16px; }
  .photo-preview{
    width:64px; height:64px; border-radius:12px; object-fit:cover;
    border:1px solid var(--border); background:var(--card);
    display:none;
  }

  .btn-submit{
    background:var(--gold); border:none; color:#2a1c00; font-weight:600;
    padding:11px 0; border-radius:10px; width:100%; font-size:15px; margin-top:6px;
  }
  .btn-submit:hover{ background:#f0ad2e; color:#2a1c00; }

  /* Success card */
  .success-card{
    background:linear-gradient(160deg, var(--card), #10162a);
    border:1px solid rgba(52,211,153,0.35); border-radius:16px; padding:30px;
  }
  .success-head{ display:flex; align-items:center; gap:14px; margin-bottom:22px; }
  .avatar-circle{
    width:56px; height:56px; border-radius:14px; background:var(--teal);
    display:flex; align-items:center; justify-content:center;
    font-family:'Poppins', sans-serif; font-weight:700; font-size:20px; color:#062018;
    flex-shrink:0; overflow:hidden;
  }
  .avatar-circle img{ width:100%; height:100%; object-fit:cover; }
  .success-head h3{ font-family:'Poppins', sans-serif; font-weight:700; font-size:19px; margin:0; }
  .success-head p{ margin:0; color:var(--teal); font-size:12.5px; font-family:'JetBrains Mono', monospace; }

  .detail-grid{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .detail-item{ background:var(--panel); border:1px solid var(--border); border-radius:10px; padding:12px 14px; }
  .detail-item.full{ grid-column:1 / -1; }
  .detail-item .lbl{ font-size:11px; text-transform:uppercase; letter-spacing:.06em; color:var(--dim); margin-bottom:4px; }
  .detail-item .val{ font-size:14px; }

  .badge-course{
    display:inline-block; background:rgba(245,185,66,0.15); color:var(--gold);
    border:1px solid rgba(245,185,66,0.35); font-family:'JetBrains Mono', monospace;
    font-size:11.5px; padding:3px 10px; border-radius:20px; margin-top:8px;
  }

  .btn-again{
    margin-top:22px; background:transparent; border:1px solid var(--border); color:var(--text);
    padding:10px 18px; border-radius:10px; font-size:13.5px; text-decoration:none; display:inline-block;
  }
  .btn-again:hover{ border-color:var(--gold); color:var(--gold); }

  footer{ margin-top:34px; text-align:center; font-family:'JetBrains Mono', monospace; font-size:11.5px; color:var(--dim); }
</style>
</head>
<body>

<div class="wrap">
  <div class="eyebrow"></div>
  <h1>Student Registration</h1>
  

  <?php if ($submitted): ?>

  <div class="success-card">
    <div class="success-head">
      <div class="avatar-circle">
        <?php if (!empty($photoName)): ?>
          <span style="font-size:22px;">📷</span>
        <?php else: ?>
          <?= h(strtoupper(substr($old['name'], 0, 1))) ?>
        <?php endif; ?>
      </div>
      <div>
        <h3><?= h($old['name']) ?></h3>
        <p>Registration confirmed</p>
      </div>
    </div>

    <div class="detail-grid">
      <div class="detail-item">
        <div class="lbl">Email</div>
        <div class="val"><?= h($old['email']) ?></div>
      </div>
      <div class="detail-item">
        <div class="lbl">Phone</div>
        <div class="val"><?= h($old['phone']) ?></div>
      </div>
      <div class="detail-item">
        <div class="lbl">Branch</div>
        <div class="val"><?= h($old['branch']) ?></div>
      </div>
      <div class="detail-item">
        <div class="lbl">Gender</div>
        <div class="val"><?= h($old['gender']) ?></div>
      </div>
      <div class="detail-item full">
        <div class="lbl">Address</div>
        <div class="val"><?= h($old['address']) ?></div>
      </div>
      <div class="detail-item full">
        <div class="lbl">Profile Photo</div>
        <div class="val">
          <?= !empty($photoName) ? h($photoName) . ' — selected (preview only, not stored)' : 'No photo uploaded' ?>
        </div>
      </div>
    </div>

    <span class="badge-course"><?= h($old['course']) ?></span>
    <div>
      <a href="" class="btn-again">Register another student</a>
    </div>
  </div>

  <?php else: ?>

  <div class="panel">

    <?php if (!empty($errors)): ?>
      <div class="error-box">
        <div class="title">⚠ Please fix the following:</div>
        <ul>
          <?php foreach ($errors as $err): ?>
            <li><?= h($err) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form method="POST" action="" enctype="multipart/form-data" novalidate>

      <div class="mb-field">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="e.g. Aarav Sharma" value="<?= h($old['name']) ?>">
      </div>

      <div class="row">
        <div class="col-md-6 mb-field">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@college.edu" value="<?= h($old['email']) ?>">
        </div>
        <div class="col-md-6 mb-field">
          <label for="phone">Phone Number</label>
          <input type="tel" class="form-control" id="phone" name="phone" placeholder="10-digit number" value="<?= h($old['phone']) ?>">
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-field">
          <label for="branch">Branch</label>
          <select class="form-select" id="branch" name="branch">
            <option value="" disabled <?= $old['branch'] === '' ? 'selected' : '' ?>>Select branch</option>
            <?php foreach ($branches as $b): ?>
              <option value="<?= h($b) ?>" <?= $old['branch'] === $b ? 'selected' : '' ?>><?= h($b) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-6 mb-field">
          <label for="course">Course</label>
          <select class="form-select" id="course" name="course">
            <option value="" disabled <?= $old['course'] === '' ? 'selected' : '' ?>>Select course</option>
            <?php foreach ($courses as $c): ?>
              <option value="<?= h($c) ?>" <?= $old['course'] === $c ? 'selected' : '' ?>><?= h($c) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="mb-field">
        <label>Gender</label>
        <div class="gender-group">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderM" value="Male" <?= $old['gender'] === 'Male' ? 'checked' : '' ?>>
            <label class="form-check-label" for="genderM">Male</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderF" value="Female" <?= $old['gender'] === 'Female' ? 'checked' : '' ?>>
            <label class="form-check-label" for="genderF">Female</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="genderO" value="Other" <?= $old['gender'] === 'Other' ? 'checked' : '' ?>>
            <label class="form-check-label" for="genderO">Other</label>
          </div>
        </div>
      </div>

      <div class="mb-field">
        <label for="address">Address</label>
        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Street, city, state"><?= h($old['address']) ?></textarea>
      </div>

      <div class="mb-field">
        <label for="photo">Profile Photo</label>
        <div class="photo-row">
          <img id="photoPreview" class="photo-preview" alt="Preview">
          <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
        </div>
        <div style="font-size:11.5px; color:var(--dim); margin-top:6px;">Preview only — not stored on the server yet.</div>
      </div>

      <button type="submit" class="btn-submit">Submit Registration</button>
    </form>
  </div>

  <?php endif; ?>

  <footer>Bootstrap form · PHP validation · sticky fields · success card</footer>
</div>

<script>
  const photoInput = document.getElementById('photo');
  const preview = document.getElementById('photoPreview');
  if (photoInput) {
    photoInput.addEventListener('change', function(){
      const file = this.files[0];
      if (file) {
        const reader = new FileReader();
        reader.onload = e => {
          preview.src = e.target.result;
          preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
      } else {
        preview.style.display = 'none';
      }
    });
  }
</script>

</body>
</html>