// Countdown + smooth scroll for Global Hackathon 2026
(function () {
  const el = document.getElementById('countdown');
  if (!el) return;

  const target = new Date(el.dataset.target).getTime();
  const $d = document.getElementById('days');
  const $h = document.getElementById('hours');
  const $m = document.getElementById('minutes');
  const $s = document.getElementById('seconds');
  const pad = (n) => String(n).padStart(2, '0');

  function tick() {
    const diff = target - Date.now();
    if (diff <= 0) {
      $d.textContent = $h.textContent = $m.textContent = $s.textContent = '00';
      return;
    }
    const days    = Math.floor(diff / 86400000);
    const hours   = Math.floor((diff % 86400000) / 3600000);
    const minutes = Math.floor((diff % 3600000) / 60000);
    const seconds = Math.floor((diff % 60000) / 1000);
    $d.textContent = pad(days);
    $h.textContent = pad(hours);
    $m.textContent = pad(minutes);
    $s.textContent = pad(seconds);
  }
  tick();
  setInterval(tick, 1000);

  // Smooth scroll for in-page anchors
  document.querySelectorAll('a[href^="index.php#"], a[href^="#"]').forEach((a) => {
    a.addEventListener('click', (e) => {
      const hash = a.getAttribute('href').split('#')[1];
      const el = hash && document.getElementById(hash);
      if (el) { e.preventDefault(); el.scrollIntoView({ behavior: 'smooth' }); }
    });
  });
})();
