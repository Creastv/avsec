<?php

/**
 * AvSec theme functions and definitions
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
require get_template_directory() . '/blocks/blocks.php';
require get_template_directory() . '/inc/archive-load-more.php';
require get_template_directory() . '/inc/cpt.php';
// Theme setup
function avsec_setup()
{
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'avsec'),
        'secundary' => __('Secundary Menu', 'avsec'),
        'footer' => __('Footer Menu', 'avsec'),
        'blog' => __('Blog Menu', 'avsec'),
    ));
}
add_action('after_setup_theme', 'avsec_setup');

// Enqueue scripts and styles
function avsec_scripts()
{
    // Enqueue Google Fonts
    wp_enqueue_style('avsec-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap', array(), null);

    // Enqueue main stylesheet
    wp_enqueue_style('avsec-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue compiled CSS from SCSS
    wp_enqueue_style('avsec-main', get_template_directory_uri() . '/assets/css/main.min.css', array('avsec-style'), '1.0.0');
    wp_enqueue_style('avsec_swiper_css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css');

    // Enqueue main JavaScript
    wp_enqueue_script('avsec_swiper_js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',  array(), '20130456', true);
    wp_enqueue_script('go-paroller-init', get_template_directory_uri() . '/assets/js/paroller.min.js', array('jquery'), '3', true);
    wp_enqueue_script('avsec-script', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', true);
    wp_enqueue_script('avsec_partners_js', get_template_directory_uri() . '/assets/js/partners.js', array('avsec_swiper_js'), '1.0.0', true);

    // Załaduj style i skrypty dla polecanych szkoleń (template part recomended-training)
    if (is_singular('szkolenia') || is_page_template('page-form.php')) {
        wp_enqueue_style('go-service', get_template_directory_uri() . '/blocks/service/service.min.css');
        wp_enqueue_script('go-service-js', get_template_directory_uri() . '/assets/js/service.js', array('jquery', 'avsec_swiper_js'), '4', true);
    }
}
add_action('wp_enqueue_scripts', 'avsec_scripts');


// gutenberg editor
function add_block_editor_assets()
{
    wp_enqueue_style('block_editor_css', get_template_directory_uri() . '/assets/css/admin.min.css');
}
add_action('enqueue_block_editor_assets', 'add_block_editor_assets', 10, 0);

// Add Google Fonts preconnect links for better performance
function avsec_google_fonts_preconnect()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
}
add_action('wp_head', 'avsec_google_fonts_preconnect', 1);

// Register widget areas
function avsec_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'avsec'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'avsec'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widgets', 'avsec'),
        'id'            => 'footer-widgets',
        'description'   => __('Add footer widgets here.', 'avsec'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ));
}
add_action('widgets_init', 'avsec_widgets_init');

// Custom excerpt length
function avsec_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'avsec_excerpt_length');

// Custom excerpt more
function avsec_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'avsec_excerpt_more');

// Add custom body classes
function avsec_body_classes($classes)
{
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }
    return $classes;
}
add_filter('body_class', 'avsec_body_classes');

// Customize the login page
function avsec_login_logo()
{
?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo esc_url(get_template_directory_uri() . "/assets/img/logo.png"); ?>');
            height: 58px;
            width: 237px;
            background-size: 237px 58px;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'avsec_login_logo');

// Security enhancements
function avsec_remove_version()
{
    return '';
}
add_filter('the_generator', 'avsec_remove_version');

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');

// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Default menu fallback
function avsec_default_menu()
{
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Strona główna</a></li>';
    echo '<li><a href="' . esc_url(admin_url('nav-menus.php')) . '">Dodaj menu</a></li>';
    echo '</ul>';
}

// Include customizer settings
require get_template_directory() . '/inc/wp-customizer.php';

// WPML Integration
function avsec_wpml_setup()
{
    // Register customizer strings for WPML String Translation
    if (function_exists('icl_register_string')) {
        // Footer Brand strings
        $footer_description = get_theme_mod('footer_description');
        if (!empty($footer_description)) {
            icl_register_string('avsec', 'Footer Description', $footer_description);
        }

        $footer_menu_1_title = get_theme_mod('footer_menu_1_title');
        if (!empty($footer_menu_1_title)) {
            icl_register_string('avsec', 'Footer Menu 1 Title', $footer_menu_1_title);
        }

        $footer_menu_2_title = get_theme_mod('footer_menu_2_title');
        if (!empty($footer_menu_2_title)) {
            icl_register_string('avsec', 'Footer Menu 2 Title', $footer_menu_2_title);
        }

        $footer_menu_3_title = get_theme_mod('footer_menu_3_title');
        if (!empty($footer_menu_3_title)) {
            icl_register_string('avsec', 'Footer Menu 3 Title', $footer_menu_3_title);
        }

        $contact_button_text = get_theme_mod('contact_button_text');
        if (!empty($contact_button_text)) {
            icl_register_string('avsec', 'Contact Button Text', $contact_button_text);
        }

        // Header Extras strings
        $platform_button_text = get_theme_mod('platform_button_text');
        if (!empty($platform_button_text)) {
            icl_register_string('avsec', 'Platform Button Text', $platform_button_text);
        }

        // Szkolenia Archive strings
        $szkolenia_archive_subtitle = get_theme_mod('szkolenia_archive_subtitle');
        if (!empty($szkolenia_archive_subtitle)) {
            icl_register_string('avsec', 'Szkolenia Archive Subtitle', $szkolenia_archive_subtitle);
        }
    }
}
add_action('init', 'avsec_wpml_setup');

// Helper function to get translated customizer string
function avsec_get_translated_theme_mod($mod_name, $context_name, $default = '')
{
    $value = get_theme_mod($mod_name, $default);

    if (function_exists('icl_t')) {
        return icl_t('avsec', $context_name, $value);
    }

    return $value;
}

// Get current language code
function avsec_get_current_language()
{
    if (function_exists('icl_get_current_language')) {
        return icl_get_current_language();
    }
    return get_locale();
}

// Get home URL for current language
function avsec_get_home_url()
{
    if (function_exists('icl_get_home_url')) {
        return icl_get_home_url();
    }
    return home_url('/');
}

// Check if WPML is active
function avsec_is_wpml_active()
{
    return defined('ICL_SITEPRESS_VERSION');
}

// Get translated attachment ID (for logo, images, etc.)
function avsec_get_translated_attachment_id($attachment_id)
{
    if (empty($attachment_id)) {
        return $attachment_id;
    }

    // If WPML is active, get translated attachment ID
    if (function_exists('icl_object_id')) {
        // Try to get translated attachment
        $translated_id = icl_object_id($attachment_id, 'attachment', true);

        // If translation exists, use it; otherwise use original
        if ($translated_id && $translated_id != $attachment_id) {
            return $translated_id;
        }
    }

    // WPML Media may not be configured - return original ID
    return $attachment_id;
}

// Get custom logo with WPML support
function avsec_get_custom_logo_id()
{
    $logo_id = get_theme_mod('custom_logo');

    // If logo is empty and WPML is active, try to get from default language
    if (empty($logo_id) && function_exists('icl_get_default_language')) {
        global $sitepress;
        if ($sitepress) {
            $current_lang = $sitepress->get_current_language();
            $default_lang = icl_get_default_language();

            // If we're not in default language
            if ($current_lang !== $default_lang) {
                // Switch to default language temporarily
                $sitepress->switch_lang($default_lang);

                // Get logo from default language
                $logo_id = get_theme_mod('custom_logo');

                // Switch back
                $sitepress->switch_lang($current_lang);
            }
        }
    }

    return avsec_get_translated_attachment_id($logo_id);
}

// Force footer logo to use default language if not set
function avsec_get_footer_logo_id()
{
    $logo_id = get_theme_mod('footer_logo');

    // If logo is empty and WPML is active, try to get from default language
    if (empty($logo_id) && function_exists('icl_get_default_language')) {
        global $sitepress;
        if ($sitepress) {
            $current_lang = $sitepress->get_current_language();
            $default_lang = icl_get_default_language();

            // If we're not in default language
            if ($current_lang !== $default_lang) {
                // Switch to default language temporarily
                $sitepress->switch_lang($default_lang);

                // Get logo from default language
                $logo_id = get_theme_mod('footer_logo');

                // Switch back
                $sitepress->switch_lang($current_lang);
            }
        }
    }

    return avsec_get_translated_attachment_id($logo_id);
}

// ACF Fields for Header
add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_68fe407e70a37',
        'title' => 'Header',
        'fields' => array(
            array(
                'key' => 'field_68fe40ce1e50a',
                'label' => 'Wyłącz nagłówek podstrony',
                'name' => 'display_header',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'allow_in_bindings' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
                'ui' => 1,
            ),
            array(
                'key' => 'field_68fe40f61e50b',
                'label' => 'Zdjęcie nagłówka',
                'name' => 'bg_img',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'url',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_68fe41091e50c',
                'label' => 'Dodatkowy opis pod tytułem',
                'name' => 'desc',
                'aria-label' => '',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'allow_in_bindings' => 0,
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
});



// Excerpt changing 3 dots
function new_excerpt_more($more)
{
    return;
}
add_filter('excerpt_more', 'new_excerpt_more');

// Excerpt
function wp_example_excerpt_length($length)
{
    return 30;
}
add_filter('excerpt_length', 'wp_example_excerpt_length');

function custom_excerpt($length = 55, $more = '...')
{
    global $post;

    // Sprawdzenie, czy post ma ustawiony excerpt
    if (has_excerpt($post->ID)) {
        $excerpt = get_the_excerpt();
        // Dodaj link "Czytaj więcej" po excerpt
        if (!empty($excerpt)) {
            $excerpt .= ' <a href="' . esc_url(get_permalink($post->ID)) . '">' . __(' ... Czytaj więcej', 'avsec') . '</a>';
        }
    } else {
        // Pobranie treści posta bez HTML i shortcodów Divi
        $content = wp_strip_all_tags(get_the_content());
        $content = preg_replace('/\[(\/?et_pb_[a-zA-Z0-9_]+)[^\]]*\]/', '', $content);

        // Tworzenie skrótu
        $words = explode(' ', $content, $length + 1);
        if (count($words) > $length) {
            array_pop($words);
            $excerpt = implode(' ', $words) . ' <a href="' . esc_url(get_permalink($post->ID)) . '">' . __(' ... Czytaj więcej', 'avsec') . '</a>';
        } else {
            $excerpt = implode(' ', $words);
        }
    }

    return $excerpt;
}

// ACF Options Page under Appearance
add_action('acf/init', function () {
    if (! function_exists('acf_add_options_page')) {
        return;
    }

    acf_add_options_page(array(
        'page_title' => 'Ustawienia szablonu',
        'menu_title' => 'Ustawienia szablonu',
        'menu_slug'  => 'ustawienia-szablonu',
        'capability' => 'edit_theme_options',
        'parent_slug' => 'themes.php',
        'redirect'   => false,
    ));
});
