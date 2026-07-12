document.addEventListener("DOMContentLoaded", function () {

  /* ================= FORM SUBMISSION ================= */
  const form = document.getElementById("regForm");

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    // Basic validation check
    const inputs = form.querySelectorAll("input, select");
    let valid = true;

    inputs.forEach(input => {
      if (input.hasAttribute("required") && !input.value.trim()) {
        valid = false;
      }
    });

    if (!valid) {
      alert("⚠️ Please fill all required fields.");
      return;
    }

    // Success message
    alert("🎉 Registration Successful!\nSee you at Celebrity Night 2026");

    form.reset();
  });


  /* ================= NAVBAR SCROLL EFFECT ================= */
  const navbar = document.querySelector(".navbar");

  window.addEventListener("scroll", () => {
    if (window.scrollY > 50) {
      navbar.style.background = "rgba(10, 14, 28, 0.95)";
    } else {
      navbar.style.background = "rgba(10, 14, 28, 0.6)";
    }
  });


  /* ================= SMOOTH SCROLL ================= */
  document.querySelectorAll("a[href^='#']").forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();

      const target = document.querySelector(this.getAttribute("href"));

      if (target) {
        window.scrollTo({
          top: target.offsetTop - 70,
          behavior: "smooth"
        });
      }
    });
  });


  /* ================= COUNTDOWN TIMER ================= */
  const eventDate = new Date("July 10, 2026 18:00:00").getTime();

  const countdown = document.createElement("div");
  countdown.style.textAlign = "center";
  countdown.style.marginTop = "30px";
  countdown.style.fontSize = "18px";
  countdown.style.color = "#7c5cff";

  document.querySelector(".hero-content").appendChild(countdown);

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = eventDate - now;

    if (distance < 0) {
      countdown.innerHTML = "🎉 Event Started!";
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

    countdown.innerHTML =
      `⏳ ${days}d ${hours}h ${minutes}m ${seconds}s left`;
  }

  setInterval(updateCountdown, 1000);
  updateCountdown();

});

document.addEventListener("DOMContentLoaded", () => {

  /* ================= CUSTOM CURSOR ================= */
  const cursor = document.createElement("div");
  cursor.style.width = "18px";
  cursor.style.height = "18px";
  cursor.style.border = "2px solid #7c5cff";
  cursor.style.borderRadius = "50%";
  cursor.style.position = "fixed";
  cursor.style.top = "0";
  cursor.style.left = "0";
  cursor.style.pointerEvents = "none";
  cursor.style.transition = "transform 0.08s ease";
  cursor.style.zIndex = "9999";
  document.body.appendChild(cursor);

  window.addEventListener("mousemove", (e) => {
    cursor.style.transform = `translate(${e.clientX}px, ${e.clientY}px)`;
  });


  /* ================= TOAST NOTIFICATIONS ================= */
  function showToast(message) {
    const toast = document.createElement("div");
    toast.innerText = message;

    toast.style.position = "fixed";
    toast.style.bottom = "30px";
    toast.style.right = "30px";
    toast.style.background = "rgba(124,92,255,0.9)";
    toast.style.color = "#fff";
    toast.style.padding = "12px 18px";
    toast.style.borderRadius = "10px";
    toast.style.boxShadow = "0 10px 25px rgba(0,0,0,0.3)";
    toast.style.zIndex = "9999";
    toast.style.opacity = "0";
    toast.style.transform = "translateY(20px)";
    toast.style.transition = "0.3s";

    document.body.appendChild(toast);

    setTimeout(() => {
      toast.style.opacity = "1";
      toast.style.transform = "translateY(0)";
    }, 100);

    setTimeout(() => {
      toast.style.opacity = "0";
      toast.style.transform = "translateY(20px)";
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }


  /* ================= FORM (UPGRADED UX) ================= */
  const form = document.getElementById("regForm");

  form.addEventListener("submit", (e) => {
    e.preventDefault();

    const inputs = form.querySelectorAll("input, select");
    let valid = true;

    inputs.forEach(input => {
      if (input.hasAttribute("required") && !input.value.trim()) {
        valid = false;
        input.style.border = "1px solid red";
      } else {
        input.style.border = "none";
      }
    });

    if (!valid) {
      showToast("⚠️ Please fill all required fields");
      return;
    }

    showToast("🎉 Registration Successful!");
    form.reset();
  });


  /* ================= SCROLL REVEAL ================= */
  const sections = document.querySelectorAll(".section, .hero");

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.opacity = "1";
        entry.target.style.transform = "translateY(0)";
      }
    });
  }, { threshold: 0.1 });

  sections.forEach(sec => {
    sec.style.opacity = "0";
    sec.style.transform = "translateY(30px)";
    sec.style.transition = "0.8s ease";
    observer.observe(sec);
  });


  /* ================= PARTICLE BACKGROUND ================= */
  const canvas = document.createElement("canvas");
  document.body.appendChild(canvas);

  canvas.style.position = "fixed";
  canvas.style.top = "0";
  canvas.style.left = "0";
  canvas.style.zIndex = "-1";

  const ctx = canvas.getContext("2d");

  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;

  let particles = [];

  for (let i = 0; i < 60; i++) {
    particles.push({
      x: Math.random() * canvas.width,
      y: Math.random() * canvas.height,
      r: Math.random() * 2,
      dx: (Math.random() - 0.5) * 0.5,
      dy: (Math.random() - 0.5) * 0.5
    });
  }

  function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.fillStyle = "#7c5cff";

    particles.forEach(p => {
      ctx.beginPath();
      ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
      ctx.fill();

      p.x += p.dx;
      p.y += p.dy;

      if (p.x < 0 || p.x > canvas.width) p.dx *= -1;
      if (p.y < 0 || p.y > canvas.height) p.dy *= -1;
    });

    requestAnimationFrame(animate);
  }

  animate();


  /* ================= RESIZE FIX ================= */
  window.addEventListener("resize", () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
  });

});