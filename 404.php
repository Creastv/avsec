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
        </section>
    </div>
</main>

<?php get_footer(); ?>