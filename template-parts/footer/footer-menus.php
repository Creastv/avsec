<?php

/**
 * Template part for displaying footer menus
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>


<?php
// Footer Menu 1
$menu_1_id = get_theme_mod('footer_menu_1', '');
$menu_1_title = get_theme_mod('footer_menu_1_title', '');

if ($menu_1_id && $menu_1_title) :
?>
<div class="footer-menu calaps">
    <h4 class="footer-menu-title calaps__opener"><?php echo esc_html($menu_1_title); ?></h4>
    <?php
        wp_nav_menu(array(
            'menu' => $menu_1_id,
            'container' => false,
            'menu_class' => 'footer-menu-list calaps__content',
            'fallback_cb' => false,
        ));
        ?>
</div>
<?php
endif;

// Footer Menu 2
$menu_2_id = get_theme_mod('footer_menu_2', '');
$menu_2_title = get_theme_mod('footer_menu_2_title', '');

if ($menu_2_id && $menu_2_title) :
?>
<div class="footer-menu calaps">
    <h4 class="footer-menu-title calaps__opener"><?php echo esc_html($menu_2_title); ?></h4>
    <?php
        wp_nav_menu(array(
            'menu' => $menu_2_id,
            'container' => false,
            'menu_class' => 'footer-menu-list calaps__content',
            'fallback_cb' => false,
        ));
        ?>
</div>
<?php
endif;

// Footer Menu 3
$menu_3_id = get_theme_mod('footer_menu_3', '');
$menu_3_title = get_theme_mod('footer_menu_3_title', '');

if ($menu_3_id && $menu_3_title) :
?>
<div class="footer-menu calaps">
    <h4 class="footer-menu-title calaps__opener"><?php echo esc_html($menu_3_title); ?></h4>
    <?php
        wp_nav_menu(array(
            'menu' => $menu_3_id,
            'container' => false,
            'menu_class' => 'footer-menu-list calaps__content',
            'fallback_cb' => false,
        ));
        ?>
</div>
<?php
endif;
?>