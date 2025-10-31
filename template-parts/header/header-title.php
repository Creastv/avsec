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
        esc_html__('Aktualności', 'avsec'),
    );
    $subtitle = '';
} elseif (is_single()) {
    $title = get_the_title();
    $subtitle = null;
} elseif (is_page()) {
    $title = get_the_title();
    $subtitle = '';
} elseif (is_archive()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} elseif (is_search()) {
    $title = sprintf(
        /* translators: %s: search term. */
        esc_html__('Search Results for: %s', 'avsec'),
        '<span>' . get_search_query() . '</span>',
    );
    $subtitle = '';
} else if (is_category()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} else if (is_author()) {
    $title = get_the_author();
    $subtitle = get_the_author_meta('description');
} else if (is_tag()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} else if (is_tax()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} else if (is_date()) {
    $title = get_the_archive_title();
    $subtitle = get_the_archive_description();
} else if (is_attachment()) {
    $title = get_the_title();
    $subtitle = '';
} else if (is_singular()) {
    $title = get_the_title();
    $subtitle = '';
} else if (is_post_type_archive()) {
    $title = get_the_archive_title();
} elseif (is_404()) {
    $title = esc_html__('Page Not Found', 'avsec');
    $subtitle = esc_html__('The page you are looking for does not exist.', 'avsec');
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

// Prepare background image style
$bg_style = '';
if ($bg_image) {
    $bg_style = 'style="background-image: url(' . esc_url($bg_image) . ');"';
}
?>

<div class="page-title-wrapper  <?php if (is_home() || is_single() || is_category()) echo ' post-page-wrap--extend'; ?>"
    <?php echo $bg_style; ?>>
    <div class="container">

        <h1 class="page-title"><?php echo $title; ?></h1>
        <?php if ($subtitle) : ?>
        <p class="page-subtitle"><?php echo $subtitle; ?></p>
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
        <?php if (is_search()) : ?>
        <div class="search-form">
            <?php get_search_form(); ?>
        </div>
        <?php endif; ?>
        <?php if ($show_meta) : ?>
        <?php if (function_exists('yoast_breadcrumb')) : ?>
        <nav class="breadcrumbs" aria-label="Breadcrumbs">
            <?php yoast_breadcrumb('', ''); ?>
        </nav>
        <?php endif; ?>
        <!-- <div class="post-meta">
                <span class="posted-on">
                    <time datetime="<?php echo get_the_date('c'); ?>">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 12C10.9 12 9.95833 11.6083 9.175 10.825C8.39167 10.0417 8 9.1 8 8C8 6.9 8.39167 5.95833 9.175 5.175C9.95833 4.39167 10.9 4 12 4C13.1 4 14.0417 4.39167 14.825 5.175C15.6083 5.95833 16 6.9 16 8C16 9.1 15.6083 10.0417 14.825 10.825C14.0417 11.6083 13.1 12 12 12ZM4 20V17.2C4 16.6333 4.14583 16.1125 4.4375 15.6375C4.72917 15.1625 5.11667 14.8 5.6 14.55C6.63333 14.0333 7.68333 13.6458 8.75 13.3875C9.81667 13.1292 10.9 13 12 13C13.1 13 14.1833 13.1292 15.25 13.3875C16.3167 13.6458 17.3667 14.0333 18.4 14.55C18.8833 14.8 19.2708 15.1625 19.5625 15.6375C19.8542 16.1125 20 16.6333 20 17.2V20H4ZM6 18H18V17.2C18 17.0167 17.9542 16.85 17.8625 16.7C17.7708 16.55 17.65 16.4333 17.5 16.35C16.6 15.9 15.6917 15.5625 14.775 15.3375C13.8583 15.1125 12.9333 15 12 15C11.0667 15 10.1417 15.1125 9.225 15.3375C8.30833 15.5625 7.4 15.9 6.5 16.35C6.35 16.4333 6.22917 16.55 6.1375 16.7C6.04583 16.85 6 17.0167 6 17.2V18ZM12 10C12.55 10 13.0208 9.80417 13.4125 9.4125C13.8042 9.02083 14 8.55 14 8C14 7.45 13.8042 6.97917 13.4125 6.5875C13.0208 6.19583 12.55 6 12 6C11.45 6 10.9792 6.19583 10.5875 6.5875C10.1958 6.97917 10 7.45 10 8C10 8.55 10.1958 9.02083 10.5875 9.4125C10.9792 9.80417 11.45 10 12 10Z"
                                fill="#1D1B20" />
                        </svg>
                        <?php echo get_the_date(); ?>
                    </time>
                </span>
                <span class="byline">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 12C10.9 12 9.95833 11.6083 9.175 10.825C8.39167 10.0417 8 9.1 8 8C8 6.9 8.39167 5.95833 9.175 5.175C9.95833 4.39167 10.9 4 12 4C13.1 4 14.0417 4.39167 14.825 5.175C15.6083 5.95833 16 6.9 16 8C16 9.1 15.6083 10.0417 14.825 10.825C14.0417 11.6083 13.1 12 12 12ZM4 20V17.2C4 16.6333 4.14583 16.1125 4.4375 15.6375C4.72917 15.1625 5.11667 14.8 5.6 14.55C6.63333 14.0333 7.68333 13.6458 8.75 13.3875C9.81667 13.1292 10.9 13 12 13C13.1 13 14.1833 13.1292 15.25 13.3875C16.3167 13.6458 17.3667 14.0333 18.4 14.55C18.8833 14.8 19.2708 15.1625 19.5625 15.6375C19.8542 16.1125 20 16.6333 20 17.2V20H4ZM6 18H18V17.2C18 17.0167 17.9542 16.85 17.8625 16.7C17.7708 16.55 17.65 16.4333 17.5 16.35C16.6 15.9 15.6917 15.5625 14.775 15.3375C13.8583 15.1125 12.9333 15 12 15C11.0667 15 10.1417 15.1125 9.225 15.3375C8.30833 15.5625 7.4 15.9 6.5 16.35C6.35 16.4333 6.22917 16.55 6.1375 16.7C6.04583 16.85 6 17.0167 6 17.2V18ZM12 10C12.55 10 13.0208 9.80417 13.4125 9.4125C13.8042 9.02083 14 8.55 14 8C14 7.45 13.8042 6.97917 13.4125 6.5875C13.0208 6.19583 12.55 6 12 6C11.45 6 10.9792 6.19583 10.5875 6.5875C10.1958 6.97917 10 7.45 10 8C10 8.55 10.1958 9.02083 10.5875 9.4125C10.9792 9.80417 11.45 10 12 10Z"
                            fill="#1D1B20" />
                    </svg>
                    <span class="author vcard">
                        <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                            <?php the_author(); ?>
                        </a>
                    </span>
                </span>
                <?php if (has_category()) : ?>
                    <span class="cat-links">
                        <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_264_2742)">
                                <path
                                    d="M20 30L24 26.95L28 30L26.5 25.05L30.5 22.2H25.6L24 17L22.4 22.2H17.5L21.5 25.05L20 30ZM24 34C22.6167 34 21.3167 33.7375 20.1 33.2125C18.8833 32.6875 17.825 31.975 16.925 31.075C16.025 30.175 15.3125 29.1167 14.7875 27.9C14.2625 26.6833 14 25.3833 14 24C14 22.6167 14.2625 21.3167 14.7875 20.1C15.3125 18.8833 16.025 17.825 16.925 16.925C17.825 16.025 18.8833 15.3125 20.1 14.7875C21.3167 14.2625 22.6167 14 24 14C25.3833 14 26.6833 14.2625 27.9 14.7875C29.1167 15.3125 30.175 16.025 31.075 16.925C31.975 17.825 32.6875 18.8833 33.2125 20.1C33.7375 21.3167 34 22.6167 34 24C34 25.3833 33.7375 26.6833 33.2125 27.9C32.6875 29.1167 31.975 30.175 31.075 31.075C30.175 31.975 29.1167 32.6875 27.9 33.2125C26.6833 33.7375 25.3833 34 24 34ZM24 32C26.2333 32 28.125 31.225 29.675 29.675C31.225 28.125 32 26.2333 32 24C32 21.7667 31.225 19.875 29.675 18.325C28.125 16.775 26.2333 16 24 16C21.7667 16 19.875 16.775 18.325 18.325C16.775 19.875 16 21.7667 16 24C16 26.2333 16.775 28.125 18.325 29.675C19.875 31.225 21.7667 32 24 32Z"
                                    fill="#49454F" />
                            </g>
                            <defs>
                                <clipPath id="clip0_264_2742">
                                    <rect x="4" y="4" width="40" height="40" rx="20" fill="white" />
                                </clipPath>
                            </defs>
                        </svg>

                        <?php the_category(', '); ?>
                    </span>
                <?php endif; ?>
            </div> -->
        <?php endif; ?>
    </div>
</div>