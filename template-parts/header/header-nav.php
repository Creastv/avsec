<?php

/**
 * Template part for displaying navigation menu
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<nav id="site-navigation" class="main-navigation">
    <div class="container-full">

        <?php
        wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_id'        => 'primary-menu',
            'menu_class'     => 'nav-menu',
            'container'      => false,
            'fallback_cb'    => 'avsec_default_menu',
        ));
        ?>
    </div>
</nav>