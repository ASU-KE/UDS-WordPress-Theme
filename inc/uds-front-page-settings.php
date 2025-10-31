<?php
/**
 * UDS Front Page Settings Handler
 *
 * Manages front page settings from UDS Advanced Settings and syncs with WordPress options.
 * Migrates existing front page settings from WordPress Customizer to UDS Advanced Settings.
 *
 * @package uds-wordpress-theme
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Helper function to check if a field value is valid (not null, false, or empty string)
 *
 * @param mixed $value The value to check.
 * @return bool True if the value is valid, false otherwise.
 */
function uds_is_valid_field_value( $value ) {
	return $value !== '' && $value !== false && $value !== null;
}

/**
 * Migrate existing WordPress front page settings to UDS Advanced Settings
 * This runs once to preserve existing settings when moving from Customizer to UDS Advanced Settings
 */
function uds_migrate_front_page_settings() {
	// Check if ACF is available
	if ( ! function_exists( 'get_field' ) || ! function_exists( 'update_field' ) ) {
		return;
	}
	
	// Check if migration has already been done
	$migration_done = get_option( 'uds_front_page_migration_done', false );
	
	if ( $migration_done ) {
		return;
	}
	
	// Get current WordPress front page settings
	$show_on_front  = get_option( 'show_on_front', 'posts' );
	$page_on_front  = get_option( 'page_on_front', 0 );
	$page_for_posts = get_option( 'page_for_posts', 0 );
	
	// Only migrate if ACF fields don't already have values
	$current_display = get_field( 'uds_front_page_display', 'option' );
	
	if ( ! uds_is_valid_field_value( $current_display ) ) {
		// Migrate to ACF options
		update_field( 'uds_front_page_display', $show_on_front, 'option' );
		
		if ( $show_on_front === 'page' ) {
			// Migrate front page setting if set (0 means unset, so we skip it)
			if ( intval( $page_on_front ) > 0 ) {
				update_field( 'uds_page_on_front', $page_on_front, 'option' );
			}
			
			// Migrate posts page setting if set (0 means unset, so we skip it)
			if ( intval( $page_for_posts ) > 0 ) {
				update_field( 'uds_page_for_posts', $page_for_posts, 'option' );
			}
		}
	}
	
	// Mark migration as complete
	update_option( 'uds_front_page_migration_done', true );
}
add_action( 'admin_init', 'uds_migrate_front_page_settings' );

/**
 * Sync UDS Advanced Settings front page values to WordPress options
 * This ensures WordPress core functions work correctly with our custom settings
 *
 * @param string $post_id The post ID being saved.
 */
function uds_sync_front_page_settings_to_wp( $post_id ) {
	// Only run on options pages
	if ( 'options' !== $post_id ) {
		return;
	}
	
	// Check if ACF is available
	if ( ! function_exists( 'get_field' ) ) {
		return;
	}
	
	// Get values from ACF
	$front_page_display = get_field( 'uds_front_page_display', 'option' );
	$page_on_front      = get_field( 'uds_page_on_front', 'option' );
	$page_for_posts     = get_field( 'uds_page_for_posts', 'option' );
	
	// Update WordPress options only if we have a valid display setting
	if ( uds_is_valid_field_value( $front_page_display ) ) {
		update_option( 'show_on_front', $front_page_display );
		
		if ( $front_page_display === 'page' ) {
			// Set the front page - ACF returns null/false for empty, WordPress uses 0
			if ( uds_is_valid_field_value( $page_on_front ) ) {
				update_option( 'page_on_front', intval( $page_on_front ) );
			} else {
				update_option( 'page_on_front', 0 );
			}
			
			// Set the posts page - ACF returns null/false for empty, WordPress uses 0
			if ( uds_is_valid_field_value( $page_for_posts ) ) {
				update_option( 'page_for_posts', intval( $page_for_posts ) );
			} else {
				update_option( 'page_for_posts', 0 );
			}
		} else {
			// Reset to show posts on front
			update_option( 'page_on_front', 0 );
			update_option( 'page_for_posts', 0 );
		}
	}
}
add_action( 'acf/save_post', 'uds_sync_front_page_settings_to_wp', 20 );

/**
 * Hide front page settings from WordPress Customizer
 * Since we're managing these in UDS Advanced Settings
 *
 * @param WP_Customize_Manager $wp_customize The customizer manager instance.
 */
function uds_customize_register_remove_front_page_settings( $wp_customize ) {
	// Remove the static front page section from Customizer
	$wp_customize->remove_section( 'static_front_page' );
}
add_action( 'customize_register', 'uds_customize_register_remove_front_page_settings', 20 );
