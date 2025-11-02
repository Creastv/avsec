<?php

/**
 * Template part for displaying site branding
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="site-branding">
    <?php
    // Get custom logo with WPML support
    $logo_id = avsec_get_custom_logo_id();

    if ($logo_id) {
        $logo_url = wp_get_attachment_image_url($logo_id, 'full');
        $logo_alt = get_post_meta($logo_id, '_wp_attachment_image_alt', true);

        if ($logo_url) {
            printf(
                '<a href="%1$s" class="custom-logo-link" rel="home"><img src="%2$s" class="custom-logo" alt="%3$s" /></a>',
                esc_url(avsec_get_home_url()),
                esc_url($logo_url),
                esc_attr($logo_alt ? $logo_alt : get_bloginfo('name'))
            );
        } else {
            // Fallback to default site name if logo URL is not available
    ?>
            <h1 class="site-title">
                <a href="<?php echo esc_url(avsec_get_home_url()); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
        <?php
        }
    } else {
        // No logo set - show site title
        ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url(avsec_get_home_url()); ?>" rel="home">
                <?php bloginfo('name'); ?>
            </a>
        </h1>
        <?php
        $description = get_bloginfo('description', 'display');
        if ($description || is_customize_preview()) {
        ?>
            <p class="site-description"><?php echo $description; ?></p>
    <?php
        }
    }
    ?>
</div>