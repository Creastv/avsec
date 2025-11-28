<?php

/**
 * Template part for displaying page/post title
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Check if header should be hidden (ACF field)
$hide_header = false;
if (is_page() && function_exists('get_field')) {
    $hide_header = get_field('display_header');
}

// If header is hidden, don't display anything
if ($hide_header) {
    return;
}

// Get ACF fields
$bg_image = '';
$custom_desc = '';
if (is_page() && function_exists('get_field')) {
    $bg_image = get_field('bg_img');
    $custom_desc = get_field('desc');
}

// Get the title based on context
if (is_home() || is_front_page()) {
    $title = sprintf(
        /* translators: %s: search term. */
        esc_html__('Avsec news', 'avsec'),
    );
    $subtitle = '';
} elseif (is_single()) {
    $title = get_the_title();
    $subtitle = null;
} elseif (is_page()) {
    $title = get_the_title();
    $subtitle = '';
} else if (is_category()) {
    $title = single_cat_title('', false);
    $subtitle = get_the_archive_description();
} elseif (is_search()) {
    $title = sprintf(
        /* translators: %s: search term. */
        esc_html__('Wyniki wyszukiwania dla: %s', 'avsec'),
        '<span>' . get_search_query() . '</span>',
    );
    $subtitle = '';
    // (None) - Remove, this conditional should not be here or is redundant/unnecessary. 

} else if (is_author()) {
    $title = get_the_author();
    $subtitle = get_the_author_meta('description');
} else if (is_tag()) {
    $title = single_tag_title('', false);
    $subtitle = get_the_archive_description();
} else if (is_tax()) {
    $title = single_term_title('', false);
    $subtitle = get_the_archive_description();
} else if (is_date()) {
    $title = single_date_title('', false);
    $subtitle = get_the_archive_description();
} else if (is_attachment()) {
    $title = single_post_title('', false);
    $subtitle = '';
} else if (is_singular()) {
    $title = get_the_title();
    $subtitle = '';
} else if (is_post_type_archive()) {
    $title = post_type_archive_title('', false);
    // Pobierz subtitle z Customizer dla archiwum szkoleń
    if (is_post_type_archive('szkolenia')) {
        $subtitle = avsec_get_theme_mod('szkolenia_archive_subtitle');
    } else {
        $subtitle = get_the_archive_description();
    }
} elseif (is_archive()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} elseif (is_404()) {
    $title = esc_html__('Strona nie została znaleziona', 'avsec');
    $subtitle = esc_html__('Strona, której szukasz, nie istnieje.', 'avsec');
} else {
    $title = get_the_title();
    $subtitle = '';
}


// Use custom description if available
if ($custom_desc) {
    $subtitle = $custom_desc;
}

// Prepare meta data for single posts
$show_meta = is_single();
?>

<div
    class="page-title-wrapper <?php if ($bg_image) echo 'has-bg-image'; ?> <?php if (is_home() || is_single() || is_category()) echo ' post-page-wrap--extend'; ?>">
    <?php if ($bg_image) : ?>
        <img src="<?php echo esc_url($bg_image); ?>" alt="<?php echo esc_attr($title); ?>"
            class="page-title-bg-image go-parallex">
    <?php endif; ?>
    <div class="container-narrow">
        <?php if ($show_meta) : ?>
            <?php if (function_exists('yoast_breadcrumb')) : ?>
                <nav class="breadcrumbs" aria-label="Breadcrumbs">
                    <?php yoast_breadcrumb('', ''); ?>
                </nav>
            <?php endif; ?>
        <?php endif; ?>
        <?php if (is_404()) : ?>
            <h1 class="page-title">404</h1>
        <?php endif; ?>
        <h1 class="page-title"><?php echo $title; ?></h1>
        <?php if ($subtitle) : ?>
            <div class="page-subtitle"><?php echo $subtitle; ?></div>
        <?php endif; ?>
        <?php if (is_home() || is_category()): ?>
            <?php
            $navLocation = 'blog';
            $temp_menu = wp_nav_menu(array(
                'theme_location'  => $navLocation,
                'menu_id'           => '',
                'menu_class'       => 'archive-cat container',
                'container'      => false,
                'echo'           => false,
            ));
            echo $temp_menu;
            ?>

        <?php endif; ?>

        <?php if (is_search() || is_404()) : ?>
            <div class="search-form">
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>

    </div>
</div>