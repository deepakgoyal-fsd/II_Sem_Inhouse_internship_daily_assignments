<?php $page = 'Readme'; include __DIR__ . '/header.php'; ?>
<section class="py-5">
  <div class="container" style="max-width: 820px;">
    <h1 class="fw-bold mb-4">📖 Project Readme</h1>

    <h4>About</h4>
    <p>A PHP + MySQL + Bootstrap 5 event landing page for <strong>Global Hackathon 2026</strong> with a live countdown, dynamic seat counter (capped at 100), and a registration form.</p>

    <h4 class="mt-4">File Structure</h4>
    <pre class="bg-dark text-light p-3 rounded"><code>php-app/
├── index.php        Landing page (hero, countdown, seat counter)
├── register.php     Registration form + POST handler
├── login.php        Admin login
├── logout.php       Session destroy
├── admin.php        Admin dashboard (list / delete)
├── readme.php       This page
├── header.php       Shared header / navbar
├── footer.php       Shared footer / scripts
├── db.php           PDO connection + helpers
├── database.sql     MySQL schema
└── assets/
    ├── style.css    Custom styles
    └── style.js     Countdown + smooth scroll</code></pre>

    <h4 class="mt-4">Setup</h4>
    <ol>
      <li>Copy the <code>php-app/</code> folder into your server (XAMPP: <code>htdocs/</code>).</li>
      <li>Import <code>database.sql</code> via phpMyAdmin or:
        <pre class="bg-light p-2 border rounded"><code>mysql -u root -p &lt; database.sql</code></pre>
      </li>
      <li>Update DB credentials in <code>db.php</code> if needed.</li>
      <li>Open <code>http://localhost/php-app/</code> in a browser.</li>
    </ol>

    <h4 class="mt-4">Default Admin</h4>
    <p>Username: <code>admin</code> · Password: <code>admin123</code> — change immediately in production.</p>

    <h4 class="mt-4">Security</h4>
    <ul>
      <li>All queries use PDO prepared statements (SQL-injection safe).</li>
      <li>All inputs are sanitized with <code>strip_tags</code> and validated with <code>filter_var</code>.</li>
      <li>All output is escaped with <code>htmlspecialchars</code>.</li>
      <li>Admin password stored using <code>password_hash</code> / <code>password_verify</code>.</li>
    </ul>
  </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
