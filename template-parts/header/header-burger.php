<?php

/**
 * Template part for displaying mobile menu burger button
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
    <span class="menu-toggle-text"><?php esc_html_e('Menu', 'avsec'); ?></span>
    <span class="menu-toggle-icon">
        <span></span>
        <span></span>
        <span></span>
    </span>
</button>