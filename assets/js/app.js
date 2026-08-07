document.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('hostel-theme');
  if (saved === 'dark') document.body.classList.add('dark');
  document.querySelectorAll('[data-theme-toggle]').forEach(button => button.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    localStorage.setItem('hostel-theme', document.body.classList.contains('dark') ? 'dark' : 'light');
  }));
  document.querySelectorAll('[data-confirm]').forEach(el => el.addEventListener('click', (event) => {
    event.preventDefault();
    const form = el.closest('form');
    const continueAction = () => {
      // Confirmation controls are either form submissions or links.  Check the
      // element type explicitly so a button can never be treated as a link with
      // an undefined target.
      if (form instanceof HTMLFormElement) form.submit();
      else if (el instanceof HTMLAnchorElement && el.href) window.location.assign(el.href);
    };
    if (window.Swal) Swal.fire({title: 'Are you sure?', text: el.dataset.confirm, icon: 'warning', showCancelButton: true, confirmButtonColor: '#10B981', cancelButtonColor: '#475569', confirmButtonText: 'Yes, continue'}).then(result => { if (result.isConfirmed) continueAction(); });
    else if (confirm(el.dataset.confirm)) continueAction();
  }));
  const search = document.querySelector('[data-room-search]');
  if (search) search.addEventListener('input', () => document.querySelectorAll('[data-room]').forEach(card => card.hidden = !card.dataset.room.includes(search.value.toLowerCase())));
  const filter = document.querySelector('[data-room-filter]');
  if (filter) filter.addEventListener('change', () => document.querySelectorAll('[data-room]').forEach(card => card.hidden = filter.value && card.dataset.status !== filter.value));
  // Keep legacy admin dashboard markup linked to the new management pages.
  const isAdminPanel = document.querySelector('.nav-label')?.textContent.includes('ADMIN');
  if (isAdminPanel && document.querySelector('.topbar h1')?.textContent.trim() === 'Operations dashboard') {
    document.title = 'Admin Dashboard | StaySpace';
    document.querySelector('.topbar h1').textContent = 'Admin Dashboard';
    document.querySelector('.topbar .eyebrow').textContent = 'Manage students, room requests, room inventory, and hostel operations from one place.';
  }
  if (isAdminPanel) document.querySelectorAll('.sidebar .nav a[href="#rooms"]').forEach(link => { link.href = 'admin_rooms.php'; link.querySelector('span').textContent = 'Room management'; });
  document.querySelectorAll('a[href^="admin_students.php?view="]').forEach(link => {
    const id = new URL(link.href).searchParams.get('view');
    if (id) { link.href = `admin_student_profile.php?id=${encodeURIComponent(id)}`; link.textContent = 'View profile'; }
  });
  if (isAdminPanel && document.querySelector('.sidebar .nav')) {
    const nav = document.querySelector('.sidebar .nav');
    if (!nav.querySelector('a[href="admin_students.php"]')) {
      const students = document.createElement('a'); students.href = 'admin_students.php'; students.innerHTML = '<i class="fa-solid fa-users"></i><span>Student management</span>';
      nav.insertBefore(students, nav.querySelector('.logout'));
    }
  }
  // Keep dashboard data visualisations aligned with the emerald/slate UI palette.
  const occupancyChart = window.Chart?.getChart('occupancy');
  if (occupancyChart) {
    occupancyChart.data.datasets.forEach((dataset, index) => {
      dataset.backgroundColor = ['#10B981', '#22D3EE', '#F59E0B', '#EF4444', '#64748B'][index % 5];
      dataset.borderColor = dataset.backgroundColor;
    });
    occupancyChart.update();
  }
});
