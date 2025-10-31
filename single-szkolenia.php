<?php

/**
 * Single template for CPT: Szkolenia
 * Reuses the page template layout from page-form.php
 *
 * @package AvSec
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Reuse the form page template for single szkolenia
include get_template_directory() . '/page-form.php';
