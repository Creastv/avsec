<?php

/**
 * Template part for displaying footer branding
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="footer-brand">
    <div class="footer-logo-social">
        <div class="footer-logo">
            <?php
            // Get footer logo with WPML support (falls back to default language if not set)
            $footer_logo_id = avsec_get_footer_logo_id();
            $footer_logo_width = get_theme_mod('footer_logo_width', 150);

            if ($footer_logo_id) {
                $footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
                if ($footer_logo_url) {
            ?>
            <a href="<?php echo esc_url(avsec_get_home_url()); ?>" rel="home" class="footer-logo-link">
                <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                    style="max-width: <?php echo absint($footer_logo_width); ?>px; height: auto;">
            </a>
            <?php
                }
            } else {
                // Try to use header logo if footer logo is not set
                $header_logo_id = avsec_get_custom_logo_id();
                if ($header_logo_id) {
                    $header_logo_url = wp_get_attachment_image_url($header_logo_id, 'full');
                    if ($header_logo_url) {
                    ?>
            <a href="<?php echo esc_url(avsec_get_home_url()); ?>" rel="home" class="footer-logo-link">
                <img src="<?php echo esc_url($header_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                    style="max-width: <?php echo absint($footer_logo_width); ?>px; height: auto;">
            </a>
            <?php
                    }
                } else {
                    // No logo at all - show site title
                    ?>
            <h3 class="footer-site-title">
                <a href="<?php echo esc_url(avsec_get_home_url()); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h3>
            <?php
                }
            }
            ?>
        </div>

        <div class="footer-social-inline">
            <?php get_template_part('template-parts/footer/footer-social'); ?>
        </div>
    </div>

    <div class="footer-description">
        <?php
        $footer_description = avsec_get_translated_theme_mod('footer_description', 'Footer Description');
        if ($footer_description) {
            echo '<p>' . wp_kses_post($footer_description) . '</p>';
        }
        ?>
    </div>
    <div class="footer-contact">
        <div class="footer-contact-address">
            <?php
            $footer_email = get_theme_mod('footer_email', '');
            $footer_phone = get_theme_mod('footer_phone', '');
            $footer_address = get_theme_mod('footer_address', '');
            ?>
            <?php if ($footer_address) : ?>
            <div class="contact-item">
                <span class="contact-icon">
                    <svg width="20" height="26" viewBox="0 0 18 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M9 22.8332C8.74723 22.8332 8.53056 22.761 8.35001 22.6165C8.16945 22.4721 8.03403 22.2825 7.94376 22.0478C7.6007 21.0366 7.16737 20.0887 6.64375 19.204C6.1382 18.3193 5.425 17.2811 4.50417 16.0894C3.58334 14.8978 2.83403 13.7603 2.25625 12.6769C1.69653 11.5936 1.41667 10.2846 1.41667 8.74984C1.41667 6.63734 2.14792 4.84984 3.61042 3.38734C5.09098 1.90678 6.8875 1.1665 9 1.1665C11.1125 1.1665 12.9 1.90678 14.3625 3.38734C15.8431 4.84984 16.5833 6.63734 16.5833 8.74984C16.5833 10.3929 16.2674 11.7651 15.6354 12.8665C15.0215 13.9498 14.3083 15.0241 13.4958 16.0894C12.5208 17.3894 11.7806 18.4728 11.275 19.3394C10.7875 20.188 10.3813 21.0908 10.0563 22.0478C9.96598 22.3005 9.82153 22.4991 9.62292 22.6436C9.44237 22.77 9.23473 22.8332 9 22.8332ZM9 11.4582C9.75834 11.4582 10.3993 11.1964 10.9229 10.6728C11.4465 10.1491 11.7083 9.50817 11.7083 8.74984C11.7083 7.9915 11.4465 7.35053 10.9229 6.82692C10.3993 6.30331 9.75834 6.0415 9 6.0415C8.24167 6.0415 7.6007 6.30331 7.07709 6.82692C6.55348 7.35053 6.29167 7.9915 6.29167 8.74984C6.29167 9.50817 6.55348 10.1491 7.07709 10.6728C7.6007 11.1964 8.24167 11.4582 9 11.4582Z"
                            stroke="#1cafed"></path>
                    </svg>

                </span>
                <?php
                    $footer_address_url = get_theme_mod('footer_address_url', '');
                    // Allow <br> tags in address
                    $allowed_tags = array('br' => array());
                    $footer_address_safe = wp_kses($footer_address, $allowed_tags);
                    if ($footer_address_url) :
                    ?>
                <a href="<?php echo esc_url($footer_address_url); ?>" class="contact-link" target="_blank"
                    rel="noopener noreferrer">
                    <span class="contact-text"><?php echo $footer_address_safe; ?></span>
                </a>
                <?php else : ?>
                <span class="contact-text"><?php echo $footer_address_safe; ?></span>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php if ($footer_email) : ?>
            <div class="contact-item">
                <span class="contact-icon">
                    <svg width="23" height="16" viewBox="0 0 23 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M21.9167 3.24984C21.9167 2.104 20.9792 1.1665 19.8333 1.1665H3.16668C2.02084 1.1665 1.08334 2.104 1.08334 3.24984M21.9167 3.24984V15.7498C21.9167 16.8957 20.9792 17.8332 19.8333 17.8332H3.16668C2.02084 17.8332 1.08334 16.8957 1.08334 15.7498V3.24984M21.9167 3.24984L11.5 10.5415L1.08334 3.24984"
                            stroke="#1cafed" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </span>
                <a href="mailto:<?php echo esc_attr($footer_email); ?>" class="contact-link">
                    <?php echo esc_html($footer_email); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if ($footer_phone) : ?>
            <div class="contact-item">
                <span class="contact-icon">📞</span>
                <a href="tel:<?php echo esc_attr($footer_phone); ?>" class="contact-link">
                    <?php echo esc_html($footer_phone); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php
        $contact_button_text = avsec_get_translated_theme_mod('contact_button_text', 'Contact Button Text', __('Contact Us', 'avsec'));
        $contact_button_url = get_theme_mod('contact_button_url', '#');
        if ($contact_button_text && $contact_button_url) :
        ?>
        <div class="footer-contact-button">
            <a href="<?php echo esc_url($contact_button_url); ?>" class="btn btn-outline-primary">
                <?php echo esc_html($contact_button_text); ?>
            </a>
        </div>
        <?php endif; ?>

    </div>
</div>