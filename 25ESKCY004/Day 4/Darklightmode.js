const themeBtn = document.getElementById('themeBtn');

themeBtn.addEventListener('click', () => {
    document.body.classList.toggle('dark');

    if (document.body.classList.contains('dark')) {
        themeBtn.textContent = 'Switch to Light';
    } else {
        themeBtn.textContent = 'Switch to Dark';
    }
});