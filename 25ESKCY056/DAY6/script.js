const API_URL = 'https://jsonplaceholder.typicode.com/posts';

        let allPosts = [];

        // ── DOM refs ──
        const loadingEl = document.getElementById('loading');
        const errorEl = document.getElementById('error-msg');
        const container = document.getElementById('cards-container');
        const searchInput = document.getElementById('search-input');
        const userFilter = document.getElementById('user-filter');
        const countBadge = document.getElementById('card-count');
        const noResults = document.getElementById('no-results');

        // ── Fetch ──
        async function fetchPosts() {
            try {
                const res = await fetch(API_URL);
                if (!res.ok) throw new Error(`HTTP ${res.status}`);
                allPosts = await res.json();

                loadingEl.style.display = 'none';
                populateUserFilter();
                renderCards(allPosts);
            } catch (err) {
                loadingEl.style.display = 'none';
                errorEl.style.display = 'block';
                console.error('Fetch error:', err);
            }
        }

        // ── Build user filter dropdown ──
        function populateUserFilter() {
            const userIds = [...new Set(allPosts.map(p => p.userId))].sort((a, b) => a - b);
            userIds.forEach(id => {
                const opt = document.createElement('option');
                opt.value = id;
                opt.textContent = `User ${id}`;
                userFilter.appendChild(opt);
            });
        }

        // ── Render cards ──
        function renderCards(posts) {
            container.innerHTML = '';
            noResults.style.display = 'none';

            if (posts.length === 0) {
                noResults.style.display = 'block';
                countBadge.textContent = '0 posts';
                return;
            }

            countBadge.textContent = `${posts.length} post${posts.length !== 1 ? 's' : ''}`;

            posts.forEach(post => {
                const col = document.createElement('div');
                col.className = 'col-12 col-sm-6 col-lg-4';

                col.innerHTML = `
          <div class="post-card">
            <span class="post-id">POST #${post.id}</span>
            <div class="post-title">${post.title}</div>
            <div class="post-body">${post.body}</div>
            <span class="user-tag">user_${post.userId}</span>
          </div>`;

                container.appendChild(col);
            });
        }

        // ── Filter logic ──
        function applyFilters() {
            const query = searchInput.value.toLowerCase().trim();
            const userId = userFilter.value;

            const filtered = allPosts.filter(post => {
                const matchSearch = !query ||
                    post.title.toLowerCase().includes(query) ||
                    post.body.toLowerCase().includes(query);
                const matchUser = !userId || post.userId === Number(userId);
                return matchSearch && matchUser;
            });

            renderCards(filtered);
        }

        // ── Events ──
        searchInput.addEventListener('input', applyFilters);
        userFilter.addEventListener('change', applyFilters);

        // ── Init ──
        fetchPosts();
    
