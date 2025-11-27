<?php

/**
 * WordPress Customizer settings
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Customizer settings
function avsec_customize_register($wp_customize)
{
    // Footer Brand Section
    $wp_customize->add_section('footer_brand', array(
        'title'    => __('Footer Brand', 'avsec'),
        'priority' => 30,
    ));

    // Footer Logo
    $wp_customize->add_setting('footer_logo', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'footer_logo', array(
        'label'     => __('Footer Logo', 'avsec'),
        'section'   => 'footer_brand',
        'mime_type' => 'image',
    )));

    // Footer Logo Width
    $wp_customize->add_setting('footer_logo_width', array(
        'default'           => '150',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_logo_width', array(
        'label'       => __('Footer Logo Width (px)', 'avsec'),
        'section'     => 'footer_brand',
        'type'        => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 10,
        ),
    ));

    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default'           => '',
        'sanitize_callback' => 'avsec_sanitize_address_with_br',
    ));

    $wp_customize->add_control('footer_description', array(
        'label'   => __('Footer Description', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'textarea',
    ));

    // Footer Brand Description (Additional)
    $wp_customize->add_setting('description', array(
        'default'           => '',
        'sanitize_callback' => 'avsec_sanitize_address_with_br',
    ));

    $wp_customize->add_control('description', array(
        'label'       => __('Description', 'avsec'),
        'section'     => 'footer_brand',
        'type'        => 'textarea',
        'description' => __('Dodatkowy opis w stopce', 'avsec'),
    ));

    // Footer Email
    $wp_customize->add_setting('footer_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('footer_email', array(
        'label'   => __('Footer Email', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'email',
    ));

    // Footer Phone
    $wp_customize->add_setting('footer_phone', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_phone', array(
        'label'   => __('Footer Phone', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'text',
    ));

    // Footer Address
    $wp_customize->add_setting('footer_address', array(
        'default'           => '',
        'sanitize_callback' => 'avsec_sanitize_address_with_br',
    ));

    $wp_customize->add_control('footer_address', array(
        'label'   => __('Footer Address', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'textarea',
    ));

    // Footer Address URL
    $wp_customize->add_setting('footer_address_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('footer_address_url', array(
        'label'   => __('Footer Address URL', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'url',
    ));

    // Contact Button Text
    $wp_customize->add_setting('contact_button_text', array(
        'default'           => __('Contact Us', 'avsec'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_button_text', array(
        'label'   => __('Contact Button Text', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'text',
    ));

    // Contact Button URL
    $wp_customize->add_setting('contact_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('contact_button_url', array(
        'label'   => __('Contact Button URL', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'url',
    ));

    // Footer Menu 1
    $wp_customize->add_setting('footer_menu_1_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_menu_1_title', array(
        'label'   => __('Footer Menu 1 Title', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('footer_menu_1', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_1', array(
        'label'   => __('Footer Menu 1', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'select',
        'choices' => avsec_get_menu_choices(),
    ));

    // Footer Menu 2
    $wp_customize->add_setting('footer_menu_2_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_menu_2_title', array(
        'label'   => __('Footer Menu 2 Title', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('footer_menu_2', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_2', array(
        'label'   => __('Footer Menu 2', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'select',
        'choices' => avsec_get_menu_choices(),
    ));

    // Footer Menu 3
    $wp_customize->add_setting('footer_menu_3_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_menu_3_title', array(
        'label'   => __('Footer Menu 3 Title', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'text',
    ));

    $wp_customize->add_setting('footer_menu_3', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('footer_menu_3', array(
        'label'   => __('Footer Menu 3', 'avsec'),
        'section' => 'footer_brand',
        'type'    => 'select',
        'choices' => avsec_get_menu_choices(),
    ));

    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title'    => __('Social Media', 'avsec'),
        'priority' => 35,
    ));

    // LinkedIn URL
    $wp_customize->add_setting('social_linkedin', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_linkedin', array(
        'label'   => __('LinkedIn URL', 'avsec'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // Facebook URL
    $wp_customize->add_setting('social_facebook', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_facebook', array(
        'label'   => __('Facebook URL', 'avsec'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // YouTube URL
    $wp_customize->add_setting('social_youtube', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('social_youtube', array(
        'label'   => __('YouTube URL', 'avsec'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // Header Extras Section
    $wp_customize->add_section('header_extras', array(
        'title'    => __('Header Extras', 'avsec'),
        'priority' => 25,
    ));

    // Header Email
    $wp_customize->add_setting('header_email', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('header_email', array(
        'label'   => __('Header Email', 'avsec'),
        'section' => 'header_extras',
        'type'    => 'email',
    ));

    // Platform Button Text
    $wp_customize->add_setting('platform_button_text', array(
        'default'           => __('Platforma AvSec Control', 'avsec'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('platform_button_text', array(
        'label'   => __('Platform Button Text', 'avsec'),
        'section' => 'header_extras',
        'type'    => 'text',
    ));

    // Platform Button URL
    $wp_customize->add_setting('platform_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('platform_button_url', array(
        'label'   => __('Platform Button URL', 'avsec'),
        'section' => 'header_extras',
        'type'    => 'url',
    ));

    // Platform Button Style
    $wp_customize->add_setting('platform_button_style', array(
        'default'           => 'primary',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('platform_button_style', array(
        'label'   => __('Platform Button Style', 'avsec'),
        'section' => 'header_extras',
        'type'    => 'select',
        'choices' => array(
            'primary' => __('Primary', 'avsec'),
            'primary-dark' => __('Primary Dark', 'avsec'),
            'secondary' => __('Secondary', 'avsec'),
            'outline-primary' => __('Outline Primary', 'avsec'),
            'outline-primary-dark' => __('Outline Primary Dark', 'avsec'),
            'outline-secondary' => __('Outline Secondary', 'avsec'),
        ),
    ));

    // Szkolenia Archive Section
    $wp_customize->add_section('szkolenia_archive', array(
        'title'    => __('Archiwum Szkoleń', 'avsec'),
        'priority' => 40,
    ));

    // Szkolenia Archive Subtitle
    $wp_customize->add_setting('szkolenia_archive_subtitle', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('szkolenia_archive_subtitle', array(
        'label'   => __('Podtytuł Archiwum Szkoleń', 'avsec'),
        'section' => 'szkolenia_archive',
        'type'    => 'textarea',
        'description' => __('Podtytuł wyświetlany na stronie archiwum szkoleń', 'avsec'),
    ));
}

// Helper function to get menu choices
function avsec_get_menu_choices()
{
    $menus = wp_get_nav_menus();
    $choices = array('' => __('Select Menu', 'avsec'));

    foreach ($menus as $menu) {
        $choices[$menu->term_id] = $menu->name;
    }

    return $choices;
}

// Sanitize address allowing <br> tags
function avsec_sanitize_address_with_br($value)
{
    // Allow only <br> and <br/> tags
    $allowed_tags = array(
        'br' => array(),
    );
    return wp_kses($value, $allowed_tags);
}

add_action('customize_register', 'avsec_customize_register');
