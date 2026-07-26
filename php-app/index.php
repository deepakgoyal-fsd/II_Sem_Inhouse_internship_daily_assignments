<?php
require_once __DIR__ . '/db.php';
$page = 'Home';
$left = seatsLeft($pdo);
$booked = seatsBooked($pdo);
$percent = (int) round(($booked / SEAT_CAP) * 100);
include __DIR__ . '/header.php';
?>
<!-- HERO -->
<section id="hero" class="hero-section text-white text-center d-flex align-items-center">
  <div class="container">
    <h1 class="display-3 fw-bold">Global Hackathon <span class="text-warning">2026</span></h1>
    <p class="lead">Code. Build. Win. Grand Prize <strong>₹20,000</strong></p>
    <p class="fs-5">📅 October 25, 2026 · 09:00 AM IST</p>

    <!-- Countdown -->
    <div id="countdown" class="row g-3 justify-content-center my-4"
         data-target="2026-10-25T09:00:00+05:30">
      <div class="col-6 col-md-2"><div class="cd-box"><span id="days">00</span><small>Days</small></div></div>
      <div class="col-6 col-md-2"><div class="cd-box"><span id="hours">00</span><small>Hours</small></div></div>
      <div class="col-6 col-md-2"><div class="cd-box"><span id="minutes">00</span><small>Minutes</small></div></div>
      <div class="col-6 col-md-2"><div class="cd-box"><span id="seconds">00</span><small>Seconds</small></div></div>
    </div>

    <!-- Seat counter -->
    <div class="seat-panel mx-auto p-3">
      <h5 class="mb-2">🎟️ Seats Remaining: <span class="text-warning fw-bold"><?= $left ?></span> / <?= SEAT_CAP ?></h5>
      <div class="progress" style="height: 12px;">
        <div class="progress-bar bg-warning" style="width: <?= $percent ?>%"></div>
      </div>
    </div>

    <a href="register.php" class="btn btn-warning btn-lg mt-4 px-4 fw-bold <?= $left <= 0 ? 'disabled' : '' ?>">
      <?= $left <= 0 ? 'Sold Out' : 'Register Now →' ?>
    </a>
  </div>
</section>

<!-- ABOUT -->
<section id="about" class="py-5">
  <div class="container">
    <h2 class="text-center fw-bold mb-4">About the Event</h2>
    <div class="row g-4">
      <div class="col-md-4"><div class="card h-100 p-3 shadow-sm"><h5>💡 Innovate</h5><p>Solve real-world problems in 48 hours with your team.</p></div></div>
      <div class="col-md-4"><div class="card h-100 p-3 shadow-sm"><h5>🏆 Compete</h5><p>Win the grand prize of ₹20,000 plus swag & mentorship.</p></div></div>
      <div class="col-md-4"><div class="card h-100 p-3 shadow-sm"><h5>🌐 Connect</h5><p>Network with 100 top developers, designers, and mentors.</p></div></div>
    </div>
  </div>
</section>

<?php include __DIR__ . '/footer.php'; ?>
