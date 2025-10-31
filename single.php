<?php

/**
 * The template for displaying all single posts
 *
 * @package AvSec
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('template-parts/header/header', 'title'); ?>
            <article id="post-<?php the_ID(); ?>" class="single-post">

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

                <footer class="post-footer">
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <span class="tags-title"><?php esc_html_e('Tags:', 'avsec'); ?></span>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-navigation">
                        <?php
                        the_post_navigation(array(
                            'prev_text' => '<span class="nav-subtitle">' . esc_html__('Poprzednie:', 'avsec') . '</span> <span class="nav-title">%title</span>',
                            'next_text' => '<span class="nav-subtitle">' . esc_html__('Następne:', 'avsec') . '</span> <span class="nav-title">%title</span>',
                        ));
                        ?>
                    </div>
                </footer>
            </article>


        <?php endwhile; ?>
    </div>
    <?php get_template_part('template-parts/parts/recomended-posts'); ?>
</main>

<?php get_footer(); ?>