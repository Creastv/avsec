<?php

/**
 * The template for displaying archive pages
 *
 * @package AvSec
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php get_template_part('template-parts/header/header', 'title'); ?>

        <?php if (have_posts()) : ?>
        <div id="posts-container" class="posts-container">
            <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/content/content-post'); ?>
            <?php endwhile; ?>
        </div>
        <?php if ($wp_query->max_num_pages > 1) : ?>
        <div class="read-more-archive text-center">
            <a href="#" class="btn btn-primary" id="load-more" data-page="1"
                data-max="<?php echo $wp_query->max_num_pages; ?>">
                <?php _e('Wczytaj więcej', 'go'); ?>
            </a>
        </div>
        <?php endif; ?>
        <?php else : ?>
        <div class="no-posts">
            <h2><?php _e('Brak postów', 'go'); ?></h2>
            <p><?php _e('Nie znaleziono żadnych postów w tej kategorii.', 'go'); ?></p>
        </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>