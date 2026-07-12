/* =====================================================================
   PREVAH 2026 — MAIN SCRIPT
   Handles: loading screen, navbar scroll, countdown, particles,
   scroll reveal, animated counters, event cards, filters, ripple,
   theme toggle, back-to-top, scroll progress, toasts.
   ===================================================================== */

document.addEventListener("DOMContentLoaded", () => {

  /* ---------- 1. LOADING SCREEN ---------- */
  window.addEventListener("load", () => {
    const loader = document.getElementById("loadingScreen");
    setTimeout(() => loader.classList.add("loaded"), 900);
  });

  /* ---------- 2. NAVBAR SCROLL STATE ---------- */
  const navbar = document.getElementById("mainNavbar");
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("scrolled", window.scrollY > 40);
    updateScrollProgress();
    toggleBackToTop();
  });

  /* ---------- 3. SCROLL PROGRESS BAR ---------- */
  const progressBar = document.getElementById("scrollProgress");
  function updateScrollProgress() {
    const scrollTop = window.scrollY;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const pct = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    progressBar.style.width = pct + "%";
  }

  /* ---------- 4. COUNTDOWN TIMER ---------- */
  // Event start date: 10 July 2026, 00:00:00
  const eventDate = new Date("2026-07-10T00:00:00").getTime();

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = eventDate - now;

    const els = {
      days: document.getElementById("cd-days"),
      hours: document.getElementById("cd-hours"),
      minutes: document.getElementById("cd-minutes"),
      seconds: document.getElementById("cd-seconds"),
    };

    if (distance <= 0) {
      els.days.textContent = "00";
      els.hours.textContent = "00";
      els.minutes.textContent = "00";
      els.seconds.textContent = "00";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    els.days.textContent = String(days).padStart(2, "0");
    els.hours.textContent = String(hours).padStart(2, "0");
    els.minutes.textContent = String(minutes).padStart(2, "0");
    els.seconds.textContent = String(seconds).padStart(2, "0");
  }
  updateCountdown();
  setInterval(updateCountdown, 1000);

  /* ---------- 5. HERO PARTICLES ---------- */
  const particleWrap = document.getElementById("heroParticles");
  if (particleWrap) {
    for (let i = 0; i < 30; i++) {
      const p = document.createElement("span");
      p.style.left = Math.random() * 100 + "%";
      p.style.animationDuration = 6 + Math.random() * 10 + "s";
      p.style.animationDelay = Math.random() * 8 + "s";
      p.style.opacity = Math.random() * 0.6 + 0.2;
      particleWrap.appendChild(p);
    }
  }

  /* ---------- 6. SCROLL REVEAL (IntersectionObserver) ---------- */
  // Auto-tag common elements with .reveal for fade-up animation
  const revealTargets = document.querySelectorAll(
    ".stat-card, .category-card, .event-card, .timeline-item, .glass-card, .gallery-item"
  );
  revealTargets.forEach((el) => el.classList.add("reveal"));

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("in-view");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 }
  );
  revealTargets.forEach((el) => observer.observe(el));

  /* ---------- 7. ANIMATED COUNTERS ---------- */
  const counters = document.querySelectorAll(".stat-number");
  const counterObserver = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          counterObserver.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.5 }
  );
  counters.forEach((c) => counterObserver.observe(c));

  function animateCounter(el) {
    const target = parseInt(el.getAttribute("data-count"), 10);
    let current = 0;
    const duration = 1500;
    const stepTime = Math.max(Math.floor(duration / target), 15);
    const increment = Math.ceil(target / (duration / stepTime));

    const timer = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(timer);
      }
      el.textContent = current;
    }, stepTime);
  }

  /* ---------- 8. EVENTS DATA + RENDER ---------- */
  const EVENTS = [
    { name: "Code Storm", category: "Technical", desc: "24-hour hackathon to build solutions that matter.", date: "11 July", time: "9:00 AM", venue: "CS Block Lab 1", prize: "₹50,000" },
    { name: "Robo Race", category: "Technical", desc: "Build and race your own line-following bot.", date: "11 July", time: "11:00 AM", venue: "Mechanical Yard", prize: "₹25,000" },
    { name: "Web Sprint", category: "Technical", desc: "Design and deploy a website in 3 hours flat.", date: "11 July", time: "2:00 PM", venue: "CS Block Lab 2", prize: "₹20,000" },
    { name: "Circuit Break", category: "Technical", desc: "Debug and fix broken circuits against the clock.", date: "11 July", time: "4:00 PM", venue: "EC Lab", prize: "₹15,000" },
    { name: "Valorant Clash", category: "Gaming", desc: "5v5 squad showdown for gaming glory.", date: "12 July", time: "10:00 AM", venue: "Gaming Arena", prize: "₹40,000" },
    { name: "FIFA Face-off", category: "Gaming", desc: "1v1 knockout FIFA tournament.", date: "12 July", time: "1:00 PM", venue: "Gaming Arena", prize: "₹15,000" },
    { name: "Chess Masters", category: "Gaming", desc: "Rapid chess tournament, Swiss format.", date: "12 July", time: "3:00 PM", venue: "Seminar Hall", prize: "₹10,000" },
    { name: "Cricket Premier League", category: "Sports", desc: "6-a-side box cricket knockout tournament.", date: "12 July", time: "8:00 AM", venue: "Main Ground", prize: "₹60,000" },
    { name: "Football Frenzy", category: "Sports", desc: "7-a-side inter-college football league.", date: "12 July", time: "9:00 AM", venue: "Football Ground", prize: "₹45,000" },
    { name: "Athletics Meet", category: "Sports", desc: "Track and field events across categories.", date: "12 July", time: "7:00 AM", venue: "Athletics Track", prize: "₹30,000" },
    { name: "Battle of Bands", category: "Cultural", desc: "Live band performances, original or covers.", date: "13 July", time: "6:00 PM", venue: "Main Stage", prize: "₹50,000" },
    { name: "Solo Singing", category: "Cultural", desc: "Showcase your voice, any genre.", date: "13 July", time: "3:00 PM", venue: "Auditorium", prize: "₹15,000" },
    { name: "Group Dance", category: "Cultural", desc: "High-energy group choreography battle.", date: "13 July", time: "7:30 PM", venue: "Main Stage", prize: "₹55,000" },
    { name: "Street Play (Nukkad)", category: "Cultural", desc: "Powerful social-themed street theatre.", date: "13 July", time: "5:00 PM", venue: "Open Air Theatre", prize: "₹20,000" },
    { name: "Photography Walk", category: "Cultural", desc: "Campus-wide themed photography contest.", date: "10 July", time: "10:00 AM", venue: "Campus Wide", prize: "₹10,000" },
  ];

  const eventsGrid = document.getElementById("eventsGrid");
  const iconMap = { Technical: "bi-cpu", Gaming: "bi-controller", Sports: "bi-trophy", Cultural: "bi-music-note-beamed" };

  function renderEvents(filter = "all") {
    eventsGrid.innerHTML = "";
    const filtered = filter === "all" ? EVENTS : EVENTS.filter((e) => e.category === filter);

    filtered.forEach((ev) => {
      const col = document.createElement("div");
      col.className = "col-sm-6 col-lg-4";
      col.innerHTML = `
        <div class="event-card reveal">
          <div class="event-card-img">
            <span class="event-card-tag">${ev.category}</span>
            <i class="bi ${iconMap[ev.category] || "bi-stars"}"></i>
          </div>
          <div class="event-card-body">
            <h5>${ev.name}</h5>
            <p class="event-card-desc">${ev.desc}</p>
            <div class="event-meta"><i class="bi bi-calendar3"></i> ${ev.date}</div>
            <div class="event-meta"><i class="bi bi-clock"></i> ${ev.time}</div>
            <div class="event-meta"><i class="bi bi-geo-alt"></i> ${ev.venue}</div>
            <div class="event-prize"><i class="bi bi-cash-coin"></i> Prize Pool: ${ev.prize}</div>
            <a href="registration.html" class="btn-event-register">Register</a>
          </div>
        </div>`;
      eventsGrid.appendChild(col);
      const card = col.querySelector(".event-card");
      observer.observe(card);
    });
  }
  renderEvents();

  // Filter chip clicks
  document.querySelectorAll(".filter-chip").forEach((chip) => {
    chip.addEventListener("click", () => {
      document.querySelectorAll(".filter-chip").forEach((c) => c.classList.remove("active"));
      chip.classList.add("active");
      renderEvents(chip.getAttribute("data-filter"));
    });
  });

  /* ---------- 9. BUTTON RIPPLE EFFECT ---------- */
  document.querySelectorAll(".ripple").forEach((btn) => {
    btn.addEventListener("click", function (e) {
      const circle = document.createElement("span");
      const diameter = Math.max(this.clientWidth, this.clientHeight);
      const rect = this.getBoundingClientRect();
      circle.style.width = circle.style.height = diameter + "px";
      circle.style.left = e.clientX - rect.left - diameter / 2 + "px";
      circle.style.top = e.clientY - rect.top - diameter / 2 + "px";
      circle.classList.add("ripple-circle");
      this.appendChild(circle);
      setTimeout(() => circle.remove(), 600);
    });
  });

  /* ---------- 10. THEME TOGGLE (Dark/Light) ---------- */
  const themeToggle = document.getElementById("themeToggle");
  const savedTheme = localStorage.getItem("prevah-theme");
  if (savedTheme === "light") {
    document.body.classList.add("light-mode");
    themeToggle.innerHTML = '<i class="bi bi-moon-stars-fill"></i>';
  }
  themeToggle.addEventListener("click", () => {
    document.body.classList.toggle("light-mode");
    const isLight = document.body.classList.contains("light-mode");
    themeToggle.innerHTML = isLight
      ? '<i class="bi bi-moon-stars-fill"></i>'
      : '<i class="bi bi-sun-fill"></i>';
    localStorage.setItem("prevah-theme", isLight ? "light" : "dark");
  });

  /* ---------- 11. BACK TO TOP BUTTON ---------- */
  const backToTopBtn = document.getElementById("backToTop");
  function toggleBackToTop() {
    backToTopBtn.classList.toggle("visible", window.scrollY > 500);
  }
  backToTopBtn.addEventListener("click", () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  /* ---------- 12. ACTIVE NAV LINK ON SCROLL ---------- */
  const sections = document.querySelectorAll("section[id], header[id]");
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
  window.addEventListener("scroll", () => {
    let current = "";
    sections.forEach((sec) => {
      const top = sec.offsetTop - 140;
      if (window.scrollY >= top) current = sec.getAttribute("id");
    });
    navLinks.forEach((link) => {
      link.classList.toggle("active-link", link.getAttribute("href") === `#${current}`);
    });
  });

  /* ---------- 13. TOAST NOTIFICATION HELPER ---------- */
  window.showToast = function (message, type = "success") {
    const container = document.getElementById("toastContainer");
    const icon = type === "success" ? "bi-check-circle-fill" : "bi-exclamation-triangle-fill";
    const toastEl = document.createElement("div");
    toastEl.className = "toast prevah-toast align-items-center border-0";
    toastEl.setAttribute("role", "alert");
    toastEl.innerHTML = `
      <div class="d-flex">
        <div class="toast-body"><i class="bi ${icon} me-2"></i>${message}</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
      </div>`;
    container.appendChild(toastEl);
    const bsToast = new bootstrap.Toast(toastEl, { delay: 3500 });
    bsToast.show();
    toastEl.addEventListener("hidden.bs.toast", () => toastEl.remove());
  };

  // Initial welcome toast (demo)
  setTimeout(() => showToast("Welcome to PREVAH 2026! Registrations are now open."), 1800);

});