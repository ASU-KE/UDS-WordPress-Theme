<?php

/**
 * Customizer to UDS Advanced Settings Migration
 *
 * @package uds-wordpress-theme
 * @author KE Web Services
 *
 * Handles migration of customizer settings to ACF options fields
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

/**
 * Migrate existing customizer theme_mod settings to ACF options
 * This ensures backward compatibility during the transition
 */
function uds_wp_migrate_customizer_settings() {
    
    // Check if migration has already run
    $migration_completed = get_option('uds_customizer_migration_completed', false);
    
    if ($migration_completed) {
        return;
    }
    
    // Get all current theme modifications
    $theme_mods = get_theme_mods();
    
    if (empty($theme_mods)) {
        return;
    }
    
    // Analytics settings migration
    $analytics_fields = [
        'asu_hub_analytics',
        'site_gcs_ownership_verification_id', 
        'site_gtm_container_id',
        'site_ga_tracking_id',
        'hotjar_site_id'
    ];
    
    foreach ($analytics_fields as $field) {
        if (isset($theme_mods[$field])) {
            update_field($field, $theme_mods[$field], 'options');
        }
    }
    
    // 404 page settings migration
    $page_404_fields = [
        '404_page_type',
        '404_page_id', 
        'image_404'
    ];
    
    foreach ($page_404_fields as $field) {
        if (isset($theme_mods[$field])) {
            update_field($field, $theme_mods[$field], 'options');
        }
    }
    
    // Footer settings migration
    $footer_fields = [
        'footer_row_branding',
        'footer_logo_type',
        'logo_select',
        'logo_url',
        'footer_logo_link',
        'footer_row_actions',
        'footer_unit_name_type',
        'footer_unit_name_text',
        'contribute_url',
        'contribute_text',
        'contact_url',
        'use_main_site_social_menu',
        'use_main_site_footer_menu'
    ];
    
    foreach ($footer_fields as $field) {
        if (isset($theme_mods[$field])) {
            update_field($field, $theme_mods[$field], 'options');
        }
    }
    
    // Header settings migration
    $header_fields = [
        'header_navigation_menu',
        'use_main_site_menu',
        'alternate_home_url'
    ];
    
    foreach ($header_fields as $field) {
        if (isset($theme_mods[$field])) {
            update_field($field, $theme_mods[$field], 'options');
        }
    }
    
    // Site info settings migration
    $site_info_fields = [
        'sitename_as_link',
        'site_display_name',
        'parent_unit_name',
        'parent_unit_link'
    ];
    
    foreach ($site_info_fields as $field) {
        if (isset($theme_mods[$field])) {
            update_field($field, $theme_mods[$field], 'options');
        }
    }
    
    // Mark migration as completed
    update_option('uds_customizer_migration_completed', true);
    
    // Log the migration
    if (function_exists('wp_get_current_user')) {
        $current_user = wp_get_current_user();
        error_log('UDS Customizer Migration completed by user: ' . $current_user->user_login);
    }
}

/**
 * Get setting value with fallback to theme_mod for backward compatibility
 */
function uds_wp_get_setting($setting_name, $default = '') {
    
    // First try to get from ACF options
    $acf_value = get_field($setting_name, 'options');
    
    if ($acf_value !== false && $acf_value !== null && $acf_value !== '') {
        return $acf_value;
    }
    
    // Fallback to theme_mod
    return get_theme_mod($setting_name, $default);
}

/**
 * Run migration on admin_init to ensure ACF is loaded
 */
add_action('admin_init', 'uds_wp_migrate_customizer_settings');

/**
 * Add admin notice when migration completes
 */
function uds_wp_migration_admin_notice() {
    
    $migration_completed = get_option('uds_customizer_migration_completed', false);
    $notice_dismissed = get_option('uds_migration_notice_dismissed', false);
    
    if ($migration_completed && !$notice_dismissed) {
        ?>
        <div class="notice notice-success is-dismissible" id="uds-migration-notice">
            <p><strong>UDS Theme:</strong> Customizer settings have been successfully migrated to UDS Advanced Settings. 
            <a href="<?php echo admin_url('options-general.php?page=uds-advanced-settings'); ?>">View Settings</a></p>
        </div>
        <script>
        jQuery(document).ready(function($) {
            $('#uds-migration-notice').on('click', '.notice-dismiss', function() {
                $.ajax({
                    url: ajaxurl,
                    data: {
                        action: 'dismiss_uds_migration_notice'
                    }
                });
            });
        });
        </script>
        <?php
    }
}
add_action('admin_notices', 'uds_wp_migration_admin_notice');

/**
 * Handle dismissal of migration notice
 */
function uds_wp_dismiss_migration_notice() {
    update_option('uds_migration_notice_dismissed', true);
    wp_die();
}
add_action('wp_ajax_dismiss_uds_migration_notice', 'uds_wp_dismiss_migration_notice');
