<?php

/**
 * Template part for displaying secondary navigation menu
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<?php
if (has_nav_menu('secundary')) :
?>
<nav id="secondary-navigation" class="secondary-navigation">
    <?php
        wp_nav_menu(array(
            'theme_location' => 'secundary',
            'menu_id'        => 'secondary-menu',
            'menu_class'     => 'secondary-menu',
            'container'      => false,
            'depth'          => 1,
        ));
        ?>
</nav>
<?php
endif;
?>