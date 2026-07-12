const internalLinks = document.querySelectorAll('a[href^="#"]');
const navbarCollapse = document.querySelector('.navbar-collapse');

internalLinks.forEach((link) => {
  link.addEventListener('click', (event) => {
    const targetId = link.getAttribute('href');

    if (!targetId || targetId === '#') {
      return;
    }

    const target = document.querySelector(targetId);

    if (!target) {
      return;
    }

    event.preventDefault();
    target.scrollIntoView({ behavior: 'smooth', block: 'start' });

    if (navbarCollapse && navbarCollapse.classList.contains('show')) {
      bootstrap.Collapse.getOrCreateInstance(navbarCollapse).hide();
    }
  });
});
