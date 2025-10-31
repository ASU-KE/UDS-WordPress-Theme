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
defined('ABSPATH') || exit;

/**
 * Migrate existing WordPress front page settings to UDS Advanced Settings
 * This runs once to preserve existing settings when moving from Customizer to UDS Advanced Settings
 */
function uds_migrate_front_page_settings() {
    // Check if migration has already been done
    $migration_done = get_option('uds_front_page_migration_done', false);
    
    if ($migration_done) {
        return;
    }
    
    // Get current WordPress front page settings
    $show_on_front = get_option('show_on_front', 'posts');
    $page_on_front = get_option('page_on_front', 0);
    $page_for_posts = get_option('page_for_posts', 0);
    
    // Only migrate if ACF fields don't already have values
    $current_display = get_field('uds_front_page_display', 'option');
    
    if (empty($current_display)) {
        // Migrate to ACF options
        update_field('uds_front_page_display', $show_on_front, 'option');
        
        if ($show_on_front === 'page') {
            // Migrate front page setting (can be 0 which is valid)
            if ($page_on_front !== '' && $page_on_front !== false) {
                update_field('uds_page_on_front', $page_on_front, 'option');
            }
            
            // Migrate posts page setting (can be 0 which is valid)
            if ($page_for_posts !== '' && $page_for_posts !== false) {
                update_field('uds_page_for_posts', $page_for_posts, 'option');
            }
        }
    }
    
    // Mark migration as complete
    update_option('uds_front_page_migration_done', true);
}
add_action('admin_init', 'uds_migrate_front_page_settings');

/**
 * Sync UDS Advanced Settings front page values to WordPress options
 * This ensures WordPress core functions work correctly with our custom settings
 */
function uds_sync_front_page_settings_to_wp($post_id) {
    // Only run on options pages
    if ('options' !== $post_id) {
        return;
    }
    
    // Get values from ACF
    $front_page_display = get_field('uds_front_page_display', 'option');
    $page_on_front = get_field('uds_page_on_front', 'option');
    $page_for_posts = get_field('uds_page_for_posts', 'option');
    
    // Update WordPress options
    if (!empty($front_page_display)) {
        update_option('show_on_front', $front_page_display);
        
        if ($front_page_display === 'page') {
            // Set the front page
            if (!empty($page_on_front)) {
                update_option('page_on_front', $page_on_front);
            } else {
                update_option('page_on_front', 0);
            }
            
            // Set the posts page
            if (!empty($page_for_posts)) {
                update_option('page_for_posts', $page_for_posts);
            } else {
                update_option('page_for_posts', 0);
            }
        } else {
            // Reset to show posts on front
            update_option('page_on_front', 0);
            update_option('page_for_posts', 0);
        }
    }
}
add_action('acf/save_post', 'uds_sync_front_page_settings_to_wp', 20);

/**
 * Hide front page settings from WordPress Customizer
 * Since we're managing these in UDS Advanced Settings
 */
function uds_customize_register_remove_front_page_settings($wp_customize) {
    // Remove the static front page section from Customizer
    $wp_customize->remove_section('static_front_page');
}
add_action('customize_register', 'uds_customize_register_remove_front_page_settings', 20);
