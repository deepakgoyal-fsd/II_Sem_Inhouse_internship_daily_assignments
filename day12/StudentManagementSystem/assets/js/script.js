document.addEventListener('DOMContentLoaded', function () {

    // Auto-dismiss the success alert after 3 seconds
    var successAlert = document.getElementById('successAlert');
    if (successAlert) {
        setTimeout(function () {
            var alertInstance = bootstrap.Alert.getOrCreateInstance(successAlert);
            alertInstance.close();
        }, 3000);
    }

    // Confirm dialog before delete
    document.querySelectorAll('.delete-form').forEach(function (form) {
        form.addEventListener('submit', function (e) {
            var name = form.getAttribute('data-student-name') || 'this student';
            if (!confirm('Delete ' + name + '? This cannot be undone.')) {
                e.preventDefault();
            }
        });
    });

    // Live photo preview on add/edit forms
    var photoInput = document.getElementById('photo');
    var previewImg = document.getElementById('photoPreview');
    var placeholder = document.getElementById('photoPlaceholderIcon');
    if (photoInput) {
        photoInput.addEventListener('change', function (e) {
            var file = e.target.files[0];
            if (!file) return;
            var reader = new FileReader();
            reader.onload = function (evt) {
                if (previewImg) {
                    previewImg.src = evt.target.result;
                    previewImg.classList.remove('d-none');
                }
                if (placeholder) {
                    placeholder.classList.add('d-none');
                }
            };
            reader.readAsDataURL(file);
        });
    }

    // Bootstrap client-side validation styling
    var forms = document.querySelectorAll('.needs-validation');
    Array.prototype.slice.call(forms).forEach(function (form) {
        form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
});
