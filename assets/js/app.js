document.addEventListener('DOMContentLoaded', () => {
  const saved = localStorage.getItem('hostel-theme');
  if (saved === 'dark') document.body.classList.add('dark');
  document.querySelectorAll('[data-theme-toggle]').forEach(button => button.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    localStorage.setItem('hostel-theme', document.body.classList.contains('dark') ? 'dark' : 'light');
  }));
  document.querySelectorAll('[data-confirm]').forEach(el => el.addEventListener('click', (event) => {
    event.preventDefault(); const go = () => window.location.assign(el.href);
    if (window.Swal) Swal.fire({title: 'Are you sure?', text: el.dataset.confirm, icon: 'warning', showCancelButton: true, confirmButtonColor: '#4f46e5', confirmButtonText: 'Yes, continue'}).then(r => r.isConfirmed && go());
    else if (confirm(el.dataset.confirm)) go();
  }));
  const search = document.querySelector('[data-room-search]');
  if (search) search.addEventListener('input', () => document.querySelectorAll('[data-room]').forEach(card => card.hidden = !card.dataset.room.includes(search.value.toLowerCase())));
  const filter = document.querySelector('[data-room-filter]');
  if (filter) filter.addEventListener('change', () => document.querySelectorAll('[data-room]').forEach(card => card.hidden = filter.value && card.dataset.status !== filter.value));
});
