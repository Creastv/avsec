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

/**
 * WPML - Register Customizer strings for translation
 */
function avsec_register_wpml_strings()
{
    if (!function_exists('icl_register_string')) {
        return;
    }

    // Lista ustawień do tłumaczenia
    $translatable_settings = array(
        'footer_description',
        'description',
        'footer_address',
        'footer_address_url',
        'contact_button_text',
        'contact_button_url',
        'footer_menu_1_title',
        'footer_menu_2_title',
        'footer_menu_3_title',
        'platform_button_text',
        'platform_button_url',
        'szkolenia_archive_subtitle',
    );

    foreach ($translatable_settings as $setting) {
        $value = get_theme_mod($setting, '');
        if (!empty($value)) {
            icl_register_string('Theme Customizer', $setting, $value);
        }
    }
}
add_action('init', 'avsec_register_wpml_strings');

/**
 * Get translated theme_mod value
 * 
 * @param string $setting Setting name
 * @param mixed $default Default value
 * @return mixed Translated value or default
 */
function avsec_get_theme_mod($setting, $default = '')
{
    $value = get_theme_mod($setting, $default);

    if (!empty($value) && function_exists('icl_t')) {
        $value = icl_t('Theme Customizer', $setting, $value);
    }

    return $value;
}

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

function custom_excerpt($length = 55, $more = '...', $show_read_more = true)
{
    global $post;

    // Sprawdzenie, czy post ma ustawiony excerpt
    if (has_excerpt($post->ID)) {
        $excerpt = get_the_excerpt();
        // Dodaj link "Czytaj więcej" po excerpt
        if (!empty($excerpt) && $show_read_more) {
            $excerpt .= ' <a href="' . esc_url(get_permalink($post->ID)) . '">' . __(' Czytaj więcej', 'avsec') . '</a>';
        }
    } else {
        // Pobranie treści posta bez HTML i shortcodów Divi
        $content = wp_strip_all_tags(get_the_content());
        $content = preg_replace('/\[(\/?et_pb_[a-zA-Z0-9_]+)[^\]]*\]/', '', $content);

        // Tworzenie skrótu
        $words = explode(' ', $content, $length + 1);
        if (count($words) > $length) {
            array_pop($words);
            $excerpt = implode(' ', $words);
            if ($show_read_more) {
                $excerpt .= ' <a href="' . esc_url(get_permalink($post->ID)) . '">' . __(' Czytaj więcej', 'avsec') . '</a>';
            } else {
                $excerpt .= $more;
            }
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

// Ustawienie liczby postów na archiwum CPT na 10
function avsec_cpt_archive_posts_per_page($query)
{
    // Sprawdź, czy to główne zapytanie i archiwum CPT
    if (!is_admin() && $query->is_main_query() && is_post_type_archive()) {
        // Ustaw 10 postów na stronę dla wszystkich archiwów CPT
        $query->set('posts_per_page', 10);
    }
}
add_action('pre_get_posts', 'avsec_cpt_archive_posts_per_page');

// Dodaj breadcrumbs dla CPT szkolenia w Yoast SEO
function avsec_add_szkolenia_breadcrumb($links)
{
    // Sprawdź, czy to pojedynczy post typu szkolenia
    if (is_singular('szkolenia')) {
        // Utwórz URL do archiwum szkoleń
        $archive_link = get_post_type_archive_link('szkolenia');
        $archive_url = $archive_link ? $archive_link : home_url('/szkolenia/');

        // Pobierz nazwę archiwum
        $archive_title = __('Szkolenia', 'avsec');

        // Utwórz nowy element breadcrumb dla archiwum
        $archive_breadcrumb = array(
            'url'  => $archive_url,
            'text' => $archive_title,
        );

        // Wstaw element archiwum przed ostatnim elementem (aktualny post)
        $last_element = array_pop($links);
        $links[] = $archive_breadcrumb;
        $links[] = $last_element;
    }

    return $links;
}
add_filter('wpseo_breadcrumb_links', 'avsec_add_szkolenia_breadcrumb');

// Wymusza tłumaczenie etykiety "Home" w breadcrumb Yoast
add_filter('wpseo_breadcrumb_links', function ($links) {
    if (! is_array($links) || empty($links)) {
        return $links;
    }

    // pobierz aktualny język (WPML) — ICL_LANGUAGE_CODE lub domyślnie get_locale()
    $lang = defined('ICL_LANGUAGE_CODE') ? ICL_LANGUAGE_CODE : substr(get_locale(), 0, 2);

    // dopasuj etykietę dla języków; dodaj kolejne języki w razie potrzeby
    $home_labels = [
        'pl' => 'Strona główna',
        'en' => 'Home',
        'de' => 'Heim', // przykład
        // 'de' => 'Startseite',
    ];

    $label = isset($home_labels[$lang]) ? $home_labels[$lang] : $home_labels['en'];

    // pierwszy element breadcrumb to zwykle link do strony głównej
    $links[0]['text'] = $label;

    return $links;
}, 10);
