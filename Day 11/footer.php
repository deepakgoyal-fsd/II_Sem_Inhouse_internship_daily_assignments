</main>
<footer class="custom-footer text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-0 fs-5"><i class="fas fa-database text-primary"></i> Powered by PHP & MySQL</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    setTimeout(function() {
        let alerts = document.querySelectorAll('.alert-auto-dismiss');
        alerts.forEach(function(alert) {
            let bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 3000);
</script>
</body>

</html>