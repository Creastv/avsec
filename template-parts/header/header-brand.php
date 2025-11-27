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
    if (has_custom_logo()) {
        the_custom_logo();
    ?>
    <?php
    } else {
        // No logo set - show site title
    ?>
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">

            </a>
        </h1>
    <?php } ?>

</div>