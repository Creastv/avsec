<?php

/**
 * The template for displaying all pages
 *
 * @package AvSec
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="page">
            <?php get_template_part('template-parts/header/header', 'title'); ?>
            <?php if (has_post_thumbnail()) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
            <?php endif; ?>

            <div class="post-content">
                <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'avsec'),
                        'after'  => '</div>',
                    ));
                    ?>
            </div>

        </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>