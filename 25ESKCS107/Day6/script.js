$(document).ready(function() { 
    const $container = $('#posts-container');
    const $countBadge = $('#post-count');
    const $errorContainer = $('#error-container');

    $countBadge.text('Loading...');
    $container.html(`
        <div class="text-center w-100 my-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-2 text-muted">Fetching live posts...</p>
        </div>
    `);

    fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response failure');
            }
            return response.json();
        })
        .then(posts => {
         $container.html('');

            const limitedPosts = posts.slice(0, 9);
            $countBadge.text(`Showing ${limitedPosts.length} posts`);

            let cardHtml = '';
            limitedPosts.forEach(post => {
                cardHtml += `
                    <div class="col-md-4 col-sm-6">
                        <div class="card h-100 shadow-sm post-card">
                            <div class="card-body">
                                <span class="text-muted small fw-bold">Post #${post.id}</span>
                                <h5 class="card-title text-capitalize text-primary mt-1">${post.title}</h5>
                                <p class="card-text text-secondary">${post.body}</p>
                            </div>
                        </div>
                    </div>
                `;
            });
            $container.html(cardHtml);
        })
        .catch(error => {
            console.error('Error encountered:', error);
            $countBadge.text('Error');
            $container.html('');
            $errorContainer.removeClass('d-none').html(`
                <div class="alert alert-danger text-center" role="alert">
                     Unable to load the blog entries at this moment.
                </div>
            `);
        });
});