<?php
/**
 * Disable the WordPress wp_autop filter that automatically wraps lines in <p> tags.
 *
 * @package uds-wordpress
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * This line will prevent WordPress from automatically inserting HTML
 * line breaks in your content. If you don't do this, some of the
 * Bootstrap snippets that we are going to add will probably not
 * display correctly.
 *  See:  https://stackoverflow.com/questions/5940854/disable-automatic-formatting-inside-wordpress-shortcodes
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
