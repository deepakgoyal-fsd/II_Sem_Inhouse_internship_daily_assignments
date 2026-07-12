// ===================================================================
// CodeForge Institute — Landing Page Scripts
// 1) Adds a background to the navbar once the user scrolls down
// 2) Reveals sections gently as they enter the viewport
// ===================================================================

document.addEventListener('DOMContentLoaded', function () {

  // --- Navbar background on scroll ---
  var navbar = document.querySelector('.navbar-cf');

  function handleNavbarScroll() {
    if (window.scrollY > 30) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }

  handleNavbarScroll();
  window.addEventListener('scroll', handleNavbarScroll);

  // --- Scroll reveal using IntersectionObserver ---
  var revealEls = document.querySelectorAll('.reveal');
  var prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReducedMotion || !('IntersectionObserver' in window)) {
    revealEls.forEach(function (el) { el.classList.add('is-visible'); });
  } else {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.15 });

    revealEls.forEach(function (el) { observer.observe(el); });
  }

  // --- Close mobile navbar after clicking a link ---
  var navLinks = document.querySelectorAll('.navbar-cf .nav-link');
  var navCollapse = document.querySelector('#cfNavbar');

  navLinks.forEach(function (link) {
    link.addEventListener('click', function () {
      if (navCollapse.classList.contains('show')) {
        var bsCollapse = bootstrap.Collapse.getInstance(navCollapse);
        if (bsCollapse) bsCollapse.hide();
      }
    });
  });

});
