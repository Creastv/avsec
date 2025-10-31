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
            $footer_logo_id = get_theme_mod('footer_logo', '');
            $footer_logo_width = get_theme_mod('footer_logo_width', 150);

            if ($footer_logo_id) {
                $footer_logo_url = wp_get_attachment_image_url($footer_logo_id, 'full');
                if ($footer_logo_url) {
            ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="footer-logo-link">
                <img src="<?php echo esc_url($footer_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"
                    style="max-width: <?php echo absint($footer_logo_width); ?>px; height: auto;">
            </a>
            <?php
                }
            } elseif (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
            <h3 class="footer-site-title">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h3>
            <?php
            }
            ?>
        </div>

        <div class="footer-social-inline">
            <?php get_template_part('template-parts/footer/footer-social'); ?>
        </div>
    </div>

    <div class="footer-description">
        <?php
        $footer_description = get_theme_mod('footer_description', '');
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
                    <svg width="35" height="33" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12.9998 23.8333C12.7471 23.8333 12.5304 23.7611 12.3498 23.6166C12.1693 23.4722 12.0339 23.2826 11.9436 23.0479C11.6005 22.0368 11.1672 21.0888 10.6436 20.2041C10.138 19.3194 9.42484 18.2812 8.504 17.0895C7.58317 15.8979 6.83387 14.7604 6.25609 13.677C5.69636 12.5937 5.4165 11.2847 5.4165 9.74996C5.4165 7.63746 6.14775 5.84996 7.61025 4.38746C9.09081 2.9069 10.8873 2.16663 12.9998 2.16663C15.1123 2.16663 16.8998 2.9069 18.3623 4.38746C19.8429 5.84996 20.5832 7.63746 20.5832 9.74996C20.5832 11.393 20.2672 12.7652 19.6353 13.8666C19.0214 14.95 18.3082 16.0243 17.4957 17.0895C16.5207 18.3895 15.7804 19.4729 15.2748 20.3395C14.7873 21.1882 14.3811 22.0909 14.0561 23.0479C13.9658 23.3007 13.8214 23.4993 13.6228 23.6437C13.4422 23.7701 13.2346 23.8333 12.9998 23.8333ZM12.9998 12.4583C13.7582 12.4583 14.3991 12.1965 14.9228 11.6729C15.4464 11.1493 15.7082 10.5083 15.7082 9.74996C15.7082 8.99162 15.4464 8.35065 14.9228 7.82704C14.3991 7.30343 13.7582 7.04163 12.9998 7.04163C12.2415 7.04163 11.6005 7.30343 11.0769 7.82704C10.5533 8.35065 10.2915 8.99162 10.2915 9.74996C10.2915 10.5083 10.5533 11.1493 11.0769 11.6729C11.6005 12.1965 12.2415 12.4583 12.9998 12.4583Z"
                            stroke="#1CAFED" />
                    </svg>

                </span>
                <span class="contact-text"><?php echo esc_html($footer_address); ?></span>
            </div>
            <?php endif; ?>

            <?php if ($footer_email) : ?>
            <div class="contact-item">
                <span class="contact-icon">
                    <svg width="25" height="25" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.16699 13.0002C2.16699 8.91466 2.16699 6.8719 3.4362 5.6027C4.7054 4.3335 6.74815 4.3335 10.8337 4.3335H15.167C19.2525 4.3335 21.2952 4.3335 22.5645 5.6027C23.8337 6.8719 23.8337 8.91466 23.8337 13.0002C23.8337 17.0857 23.8337 19.1284 22.5645 20.3976C21.2952 21.6668 19.2525 21.6668 15.167 21.6668H10.8337C6.74815 21.6668 4.7054 21.6668 3.4362 20.3976C2.16699 19.1284 2.16699 17.0857 2.16699 13.0002Z"
                            stroke="#1CAFED" stroke-width="2" />
                        <path
                            d="M6.5 8.6665L8.8388 10.6155C10.8285 12.2736 11.8233 13.1026 13 13.1026C14.1767 13.1026 15.1715 12.2736 17.1612 10.6155L19.5 8.6665"
                            stroke="#1CAFED" stroke-width="2" stroke-linecap="round" />
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
        $contact_button_text = get_theme_mod('contact_button_text', __('Contact Us', 'avsec'));
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