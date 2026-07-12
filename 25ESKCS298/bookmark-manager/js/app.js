$(document).ready(function () {
    // ==========================================================================
    // GLOBAL CONFIG & HELPERS
    // ==========================================================================
    
    // Helper to display modern toast alerts
    function showToast(message, type = 'success') {
        const toastId = 'toast-' + Date.now();
        const iconClass = type === 'success' ? 'bi-check-circle-fill' : 'bi-exclamation-triangle-fill';
        const toastClass = type === 'success' ? 'toast-success' : 'toast-error';
        
        const toastHTML = `
            <div id="${toastId}" class="custom-toast ${toastClass}">
                <i class="bi ${iconClass} toast-icon"></i>
                <div class="toast-content flex-grow-1">${message}</div>
            </div>
        `;
        
        $('#toast-container').append(toastHTML);
        
        // Trigger reflow and show
        setTimeout(() => {
            $(`#${toastId}`).addClass('show');
        }, 10);
        
        // Auto-remove toast
        setTimeout(() => {
            $(`#${toastId}`).removeClass('show');
            setTimeout(() => {
                $(`#${toastId}`).remove();
            }, 350);
        }, 4000);
    }

    // Helper to extract domain from URL for favicon retrieval
    function getDomain(url) {
        try {
            const parsed = new URL(url);
            return parsed.hostname;
        } catch (e) {
            return '';
        }
    }

    // ==========================================================================
    // 1. AUTHENTICATION CONTROLLER (index.html)
    // ==========================================================================
    
    // Page switcher logic with smooth transition
    function switchAuthForm(showSection, hideSection) {
        const container = $('#auth-card-container');
        container.addClass('fade-out');
        
        setTimeout(() => {
            $(hideSection).addClass('d-none');
            $(showSection).removeClass('d-none');
            container.removeClass('fade-out');
        }, 300);
    }

    $('#link-to-register').on('click', function() {
        switchAuthForm('#register-section', '#login-section');
    });

    $('#link-to-login').on('click', function() {
        switchAuthForm('#login-section', '#register-section');
    });

    // Handle user registration submission
    $('#register-form').on('submit', function(e) {
        e.preventDefault();
        
        const username = $('#register-username').val().trim();
        const email = $('#register-email').val().trim();
        const password = $('#register-password').val();
        const confirmPassword = $('#register-confirm-password').val();

        // Client-side validations
        if (password !== confirmPassword) {
            showToast("Passwords do not match.", "error");
            return;
        }

        if (password.length < 6) {
            showToast("Password must be at least 6 characters.", "error");
            return;
        }

        const spinner = $('#register-spinner');
        const submitBtn = $('#register-submit-btn');
        submitBtn.prop('disabled', true);
        spinner.removeClass('d-none');

        $.ajax({
            url: 'api/register.php',
            method: 'POST',
            data: {
                username: username,
                email: email,
                password: password,
                confirm_password: confirmPassword
            },
            dataType: 'json',
            success: function(response) {
                showToast(response.message, "success");
                $('#register-form')[0].reset();
                setTimeout(() => {
                    switchAuthForm('#login-section', '#register-section');
                }, 1000);
            },
            error: function(xhr) {
                let errorMsg = "Registration failed. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                showToast(errorMsg, "error");
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
            }
        });
    });

    // Handle user login submission
    $('#login-form').on('submit', function(e) {
        e.preventDefault();
        
        const identifier = $('#login-identifier').val().trim();
        const password = $('#login-password').val();

        const spinner = $('#login-spinner');
        const submitBtn = $('#login-submit-btn');
        submitBtn.prop('disabled', true);
        spinner.removeClass('d-none');

        $.ajax({
            url: 'api/login.php',
            method: 'POST',
            data: {
                username_or_email: identifier,
                password: password
            },
            dataType: 'json',
            success: function(response) {
                showToast("Welcome! Redirecting...", "success");
                setTimeout(() => {
                    window.location.href = 'dashboard.html';
                }, 1000);
            },
            error: function(xhr) {
                let errorMsg = "Invalid credentials. Please try again.";
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMsg = xhr.responseJSON.message;
                }
                showToast(errorMsg, "error");
            },
            complete: function() {
                submitBtn.prop('disabled', false);
                spinner.addClass('d-none');
            }
        });
    });


    // ==========================================================================
    // 2. DASHBOARD CONTROLLER (dashboard.html)
    // ==========================================================================
    
    // Check if we are on the dashboard page
    if ($('#bookmarks-container').length > 0) {
        let bookmarksData = []; // Cache list
        let currentCategory = 'All';
        let searchQuery = '';
        let deleteId = null;
        let searchTimeout;

        // Mobile responsive sidebar toggle
        $('#mobile-toggle').on('click', function() {
            $('#sidebar-nav').toggleClass('active');
            $(this).find('i').toggleClass('bi-list bi-x');
        });

        // Hide sidebar on clicking link in mobile view
        $(document).on('click', function(e) {
            if ($(window).width() < 992) {
                if (!$(e.target).closest('#sidebar-nav').length && !$(e.target).closest('#mobile-toggle').length) {
                    $('#sidebar-nav').removeClass('active');
                    $('#mobile-toggle').find('i').removeClass('bi-x').addClass('bi-list');
                }
            }
        });

        // Fetch & Populate bookmarks
        function loadBookmarks() {
            $.ajax({
                url: 'api/bookmarks.php',
                method: 'GET',
                data: {
                    category: currentCategory,
                    search: searchQuery
                },
                dataType: 'json',
                success: function(response) {
                    // Update user info
                    if (response.data.user) {
                        $('#user-display-name').text(response.data.user.username);
                        $('#user-display-email').text(response.data.user.email);
                    }
                    
                    bookmarksData = response.data.bookmarks;
                    renderBookmarks(bookmarksData);
                    updateCategoryCounters(response.data.categoriesCount, bookmarksData.length);
                },
                error: function(xhr) {
                    // Redirect back if unauthorized
                    if (xhr.status === 401) {
                        window.location.href = 'index.html';
                    } else {
                        showToast("Failed to retrieve bookmarks.", "error");
                    }
                }
            });
        }

        // Render cards into layout
        function renderBookmarks(bookmarks) {
            const container = $('#bookmarks-container');
            container.empty();

            if (bookmarks.length === 0) {
                container.html(`
                    <div class="empty-state">
                        <i class="bi bi-bookmark-x empty-state-icon"></i>
                        <h3 class="empty-state-title">No bookmarks found</h3>
                        <p class="empty-state-desc">Start building your collection by adding folders, articles, or resources.</p>
                        <button class="btn btn-primary-gradient" data-bs-toggle="modal" data-bs-target="#addModal">
                            <i class="bi bi-plus-lg me-2"></i>Add First Bookmark
                        </button>
                    </div>
                `);
                return;
            }

            bookmarks.forEach(function(bookmark) {
                const catClass = bookmark.category.toLowerCase();
                const domain = getDomain(bookmark.url);
                const faviconUrl = domain ? `https://www.google.com/s2/favicons?sz=64&domain=${domain}` : '';
                const faviconHTML = faviconUrl 
                    ? `<img src="${faviconUrl}" onerror="this.onerror=null; this.parentNode.innerHTML='<i class=bi-globe></i>';">` 
                    : `<i class="bi bi-globe"></i>`;

                const cardHTML = `
                    <div class="glass-card bookmark-card cat-${catClass}" data-id="${bookmark.id}">
                        <div class="bookmark-header">
                            <div class="bookmark-favicon">
                                ${faviconHTML}
                            </div>
                            <h4 class="bookmark-title" title="${bookmark.title}">${bookmark.title}</h4>
                        </div>
                        <div class="bookmark-url">
                            <a href="${bookmark.url}" target="_blank" rel="noopener noreferrer">${bookmark.url}</a>
                        </div>
                        <div class="bookmark-footer">
                            <span class="badge-category badge-${catClass}">${bookmark.category}</span>
                            <div class="bookmark-actions">
                                <button class="action-btn edit-btn" data-id="${bookmark.id}" title="Edit Bookmark">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="action-btn delete-btn text-rose" data-id="${bookmark.id}" title="Delete Bookmark">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `;
                container.append(cardHTML);
            });
        }

        // Update category side counter labels
        function updateCategoryCounters(counters, currentListLength) {
            // Reset counter displays
            $('#badge-work-count').text(0);
            $('#badge-personal-count').text(0);
            $('#badge-study-count').text(0);

            let totalCount = 0;
            counters.forEach(function(item) {
                const count = parseInt(item.count);
                totalCount += count;
                const normalizedCategory = item.category.toLowerCase();
                $(`#badge-${normalizedCategory}-count`).text(count);
            });

            $('#badge-all-count').text(totalCount);
        }

        // Initial Load
        loadBookmarks();

        // Search trigger with debounce
        $('#search-input').on('input', function() {
            clearTimeout(searchTimeout);
            searchQuery = $(this).val().trim();
            
            searchTimeout = setTimeout(function() {
                loadBookmarks();
            }, 300);
        });

        // Category filter link selection
        $('.category-link').on('click', function(e) {
            e.preventDefault();
            $('.category-link').removeClass('active');
            $(this).addClass('active');
            
            currentCategory = $(this).data('category');
            loadBookmarks();
        });

        // Add Bookmark AJAX Form submit
        $('#add-bookmark-form').on('submit', function(e) {
            e.preventDefault();
            
            const title = $('#add-title').val().trim();
            const url = $('#add-url').val().trim();
            const category = $('#add-category').val();

            const spinner = $('#add-spinner');
            const submitBtn = $('#add-submit-btn');
            submitBtn.prop('disabled', true);
            spinner.removeClass('d-none');

            $.ajax({
                url: 'api/bookmarks.php',
                method: 'POST',
                data: {
                    action: 'create',
                    title: title,
                    url: url,
                    category: category
                },
                dataType: 'json',
                success: function(response) {
                    showToast(response.message, "success");
                    $('#add-bookmark-form')[0].reset();
                    $('#addModal').modal('hide');
                    loadBookmarks();
                },
                error: function(xhr) {
                    let errorMsg = "Could not add bookmark.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    showToast(errorMsg, "error");
                },
                complete: function() {
                    submitBtn.prop('disabled', false);
                    spinner.addClass('d-none');
                }
            });
        });

        // Click Edit Bookmark - Load details into fields
        $(document).on('click', '.edit-btn', function() {
            const id = $(this).data('id');
            const bookmark = bookmarksData.find(b => b.id == id);
            
            if (bookmark) {
                $('#edit-id').val(bookmark.id);
                $('#edit-title').val(bookmark.title);
                $('#edit-url').val(bookmark.url);
                $('#edit-category').val(bookmark.category);
                
                $('#editModal').modal('show');
            }
        });

        // Edit Bookmark AJAX Form submit
        $('#edit-bookmark-form').on('submit', function(e) {
            e.preventDefault();
            
            const id = $('#edit-id').val();
            const title = $('#edit-title').val().trim();
            const url = $('#edit-url').val().trim();
            const category = $('#edit-category').val();

            const spinner = $('#edit-spinner');
            const submitBtn = $('#edit-submit-btn');
            submitBtn.prop('disabled', true);
            spinner.removeClass('d-none');

            $.ajax({
                url: 'api/bookmarks.php',
                method: 'POST',
                data: {
                    action: 'update',
                    id: id,
                    title: title,
                    url: url,
                    category: category
                },
                dataType: 'json',
                success: function(response) {
                    showToast(response.message, "success");
                    $('#editModal').modal('hide');
                    loadBookmarks();
                },
                error: function(xhr) {
                    let errorMsg = "Could not update bookmark.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    showToast(errorMsg, "error");
                },
                complete: function() {
                    submitBtn.prop('disabled', false);
                    spinner.addClass('d-none');
                }
            });
        });

        // Click Delete Bookmark - Open Confirm Modal
        $(document).on('click', '.delete-btn', function() {
            deleteId = $(this).data('id');
            $('#deleteModal').modal('show');
        });

        // Confirm Delete Action AJAX
        $('#confirm-delete-btn').on('click', function() {
            if (!deleteId) return;

            const deleteBtn = $(this);
            deleteBtn.prop('disabled', true);

            $.ajax({
                url: 'api/bookmarks.php',
                method: 'POST',
                data: {
                    action: 'delete',
                    id: deleteId
                },
                dataType: 'json',
                success: function(response) {
                    showToast(response.message, "success");
                    $('#deleteModal').modal('hide');
                    loadBookmarks();
                },
                error: function(xhr) {
                    let errorMsg = "Could not delete bookmark.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }
                    showToast(errorMsg, "error");
                },
                complete: function() {
                    deleteBtn.prop('disabled', false);
                    deleteId = null;
                }
            });
        });

        // Logout AJAX trigger
        $('#logout-trigger').on('click', function(e) {
            e.preventDefault();
            
            $.ajax({
                url: 'api/logout.php',
                method: 'POST',
                dataType: 'json',
                success: function(response) {
                    showToast(response.message, "success");
                    setTimeout(() => {
                        window.location.href = 'index.html';
                    }, 1000);
                },
                error: function() {
                    // Fallback redirect
                    window.location.href = 'index.html';
                }
            });
        });
    }
});
