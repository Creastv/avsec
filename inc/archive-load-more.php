<?php

////////////////////////////////////////////////////////////////////////////////////

function enqueue_load_more_assets()
{
    if (is_archive() || is_home() || is_category() || is_page('aktualnosci') || is_search()) {
        global $wp_query;
        wp_enqueue_script('load-more', get_template_directory_uri() . '/assets/js/load-more-archive.js', [], false, true);

        wp_localize_script('load-more', 'wp_loadmore', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'query_vars' => json_encode($wp_query->query_vars),
        ]);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_load_more_assets');

function load_more_posts_ajax()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $query_vars = isset($_POST['query_vars']) ? json_decode(stripslashes($_POST['query_vars']), true) : [];

    $query_vars['paged'] = $paged;

    $query = new WP_Query($query_vars);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            if (get_post_type() == 'szkolenia') {
                get_template_part('template-parts/content/content-training');
            } else {
                get_template_part('template-parts/content/content-post');
            }
        endwhile;
    else :
        echo '<p>Brak wyników</p>';
    endif;

    wp_die();
}


add_action('wp_ajax_load_more_posts', 'load_more_posts_ajax');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_ajax');
