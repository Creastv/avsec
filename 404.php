<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @package AvSec
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <section class="error-404 not-found">
            <?php get_template_part('template-parts/header/header', 'title'); ?>

            <div class="page-content">
                <p class="text-center">
                    <?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'avsec'); ?>
                </p>

                <?php get_search_form(); ?>
            </div>
        </section>
    </div>
</main>

<?php get_footer(); ?>