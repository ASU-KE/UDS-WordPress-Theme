<?php

/**
 * ASU Web Standards 2020 Theme Customizer
 *
 * @package asu-web-standards-2020
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

$asu_wp2020_includes = array(
	'/customizer-sanitizers.php',           // Load input sanitizer functions.
	'/customizer-preview-js.php',           // Make Theme Customizer preview reload changes asynchronously.
	'/customizer-post-message-support.php', // Add postMessage support for site title and description in the Theme Customizer.
	'/customizer-endorsed-unit-logos.php',  // Load endorsed unit logos for Customizer.
	'/customizer-settings.php',             // Load custom settings and sections in Customizer.
);

foreach ($asu_wp2020_includes as $file) {
	require_once get_template_directory() . '/inc/customizer' . $file;
}
