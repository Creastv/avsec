<?php
function load_more_team()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) + 1 : 1;

    $args = array(
        'post_type'      => 'zespol',
        'posts_per_page' => 10,
        'post_status'    => 'publish',
        'paged'          => $paged,
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            get_template_part('templates-parts/content/content', 'cart-zespol');
        endwhile;
        $output = ob_get_clean();

        // Sprawdzenie, czy są kolejne posty
        $has_more_posts = ($query->max_num_pages > $paged) ? 'true' : 'false';

        echo json_encode(array(
            'posts' => $output,
            'has_more' => $has_more_posts,
        ));

    else :
        echo json_encode(array(
            'posts' => '',
            'has_more' => 'false',
        ));
    endif;

    wp_reset_postdata();
    wp_die();
}
add_action('wp_ajax_load_more_team', 'load_more_team');
add_action('wp_ajax_nopriv_load_more_team', 'load_more_team');
