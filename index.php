<?php

/**
 * Plugin Name
 *
 * @package           EverBlock
 * @author            Jayclyde Taguines
 * @copyright         2024 Jayclyde Taguines
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       EverBlock
 * Plugin URI:        https://example.com/plugin-name
 * Description:       Description of the plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Jayclyde Taguines
 * Author URI:        https://example.com
 * Text Domain:       plugin-slug
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Update URI:        https://example.com/my-plugin/
 */

namespace EverBlock;

/**
 * Register the EverBlock Settings page
 */
function everblock_register_settings_page() {
    add_menu_page(
        __('EverBlock Settings', 'everblock'),
        __('EverBlock Settings', 'everblock'),
        'manage_options',
        'everblock',
        __NAMESPACE__ . '\render_settings_page',
        'dashicons-admin-generic',
        6
    );
} 

add_action( 'admin_menu', __NAMESPACE__ . '\everblock_register_settings_page' );

/**
 * Render the EverBlock Settings page
 */
function render_settings_page() { 
    ?>
    
    <div id="everblock">
        <?php esc_html_e( 'EverBlock Settings', 'everblock'); ?>
    </div>

    <?php
}

/**
 * Register the EverBlock Settings page
 * @link https://developer.wordpress.org/reference/functions/add_action
 * 
 * @param string $suffix
 */
add_action( 'admin_enqueue_scripts' , function( $suffix ) {
    // toplevel_page_everblock

    $asset_file_page = plugin_dir_path( __FILE__ ) . 'build/index.asset.php';

    if ( file_exists( $asset_file_page ) && 'toplevel_page_everblock' === $suffix ) {
        $asset_file = include $asset_file_page;
        wp_register_script(
            'everblock-block-editor',
            plugins_url( 'build/index.js', __FILE__ ),
            $asset_file['dependencies'],
            $asset_file['version']
        );
        wp_enqueue_script( 'everblock-block-editor' );
    }
});