<?php
// Pobierz pole ACF Post Object - może być tablicą lub pojedynczym postem
$pages_posts = get_field('pages');

// Jeśli nie jest tablicą, zamień na tablicę
if (!is_array($pages_posts)) {
    $pages_posts = $pages_posts ? array($pages_posts) : array();
}

if (!empty($pages_posts)) :
?>
    <!-- 🔹 POSTY -->
    <div id="pages-list" class="posts-container szkolenia-grid">
        <?php
        global $post;
        foreach ($pages_posts as $pages_post) :
            // Ustaw globalną zmienną $post dla funkcji WordPress
            $post = $pages_post;
            setup_postdata($post);
            get_template_part('template-parts/content/content', 'training');
        endforeach;
        wp_reset_postdata(); // Resetuj dane posta
        ?>
    </div>
<?php endif; ?>