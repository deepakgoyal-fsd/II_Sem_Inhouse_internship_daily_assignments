$(document).ready(function () {
    // 1. Initialize count from localStorage or set default
    let currentRegistrations = parseInt(localStorage.getItem('hackathon_reg_count'));
    if (isNaN(currentRegistrations)) {
        currentRegistrations = 142; // Default starting count
        localStorage.setItem('hackathon_reg_count', currentRegistrations);
    }
    $('#regCount').text(currentRegistrations);

    // 2. Handle Form Submission
    $('#hackathonForm').on('submit', function (e) {
        e.preventDefault(); // Stop the page from reloading

        // Basic validation check
        if (this.checkValidity()) {
            // Increment the count
            currentRegistrations += 1;
            
            // Save to storage and update UI
            localStorage.setItem('hackathon_reg_count', currentRegistrations);
            $('#regCount').text(currentRegistrations);

            // Show success alert
            $('#successAlert').removeClass('d-none');
            
            // Reset form
            this.reset();
            $(this).removeClass('was-validated');

            // Hide alert after 5 seconds
            setTimeout(function () {
                $('#successAlert').addClass('d-none');
            }, 5000);
        } else {
            $(this).addClass('was-validated'); // Show Bootstrap validation errors
        }
    });

    // 3. Optional: Add a simple countdown timer (kept from your original snippet)
    const targetDate = new Date(2026, 6, 10, 9, 0, 0).getTime();
    function updateCountdown() {
        const now = new Date().getTime();
        const difference = targetDate - now;

        if (difference <= 0) {
            $('#days, #hours, #minutes, #seconds').text("00");
            return;
        }

        const days = Math.floor(difference / (1000 * 60 * 60 * 24));
        const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((difference % (1000 * 60)) / 1000);

        $('#days').text(days < 10 ? '0' + days : days);
        $('#hours').text(hours < 10 ? '0' + hours : hours);
        $('#minutes').text(minutes < 10 ? '0' + minutes : minutes);
        $('#seconds').text(seconds < 10 ? '0' + seconds : seconds);
    }
    setInterval(updateCountdown, 1000);
});