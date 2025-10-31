<?php

/**
 * Template Name: Formularz
 * Description: Szablon podstron przeznaczony pod strony z formularzem.
 *
 * @package AvSec
 */

get_header(); ?>

<main class="site-main">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" class="page page-form">
            <div class="page-form__grid">
                <div class="page-form__content">
                    <header class="page-form__header">
                        <?php the_title('<h1 class="page-form__title">', '</h1>'); ?>
                        <?php if (function_exists('yoast_breadcrumb')) : ?>
                        <nav class="breadcrumbs" aria-label="Breadcrumbs">
                            <?php yoast_breadcrumb('', ''); ?>
                        </nav>
                        <?php endif; ?>

                        <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                        <?php endif; ?>
                    </header>


                    <div class="post-content">
                        <?php
                            the_content();

                            wp_link_pages(array(
                                'before' => '<div class="page-links">' . esc_html__('Pages:', 'avsec'),
                                'after'  => '</div>',
                            ));
                            ?>
                    </div>
                </div>

                <aside class="page-form__sidebar" aria-label="Formularz kontaktowy">
                    <div class="page-form__sticky">
                        <?php echo do_shortcode('[contact-form-7 id="7507adf" title="Formularz na podstronach"]'); ?>
                    </div>
                </aside>
            </div>
        </article>
        <?php endwhile; ?>
    </div>
    <?php get_template_part('template-parts/parts/recomended-training'); ?>
</main>

<?php get_footer(); ?>