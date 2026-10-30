const enrollForm = document.getElementById('enrollForm');
const formMessage = document.getElementById('formMessage');

if (enrollForm && formMessage) {
  enrollForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const data = new FormData(enrollForm);
    const name = data.get('name')?.toString().trim() || 'there';

    formMessage.textContent = `Thanks, ${name}! Your enrollment request has been received.`;
    enrollForm.reset();
  });
}
