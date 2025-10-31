document.addEventListener('DOMContentLoaded', function () {
    const btn = document.getElementById('load-more');
    if (!btn) return;

    btn.addEventListener('click', function (e) {
        e.preventDefault();
        const page = parseInt(btn.dataset.page) + 1;
        const max = parseInt(btn.dataset.max);

        const data = new FormData();
        data.append('action', 'load_more_posts');
        data.append('page', page);
        data.append('query_vars', wp_loadmore.query_vars);
        fetch(wp_loadmore.ajax_url, {
            method: 'POST',
            credentials: 'same-origin',
            body: data,
        })
            .then((res) => {
                if (!res.ok) {
                    throw new Error('Network response was not ok');
                }
                return res.text();
            })
            .then((html) => {
                console.log('HTML z Ajaxa:', html);
                const postsContainer = document.getElementById('posts-container');
                if (postsContainer) {
                    postsContainer.insertAdjacentHTML('beforeend', html);
                    btn.dataset.page = page;
                    if (page >= max) {
                        btn.style.display = 'none';
                    }
                } else {
                    console.error('Nie znaleziono kontenera posts-container');
                }
            })
            .catch((error) => {
                console.error('Błąd podczas ładowania postów:', error);
                btn.textContent = 'Błąd - spróbuj ponownie';
            });
    });
}); 
