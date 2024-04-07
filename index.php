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


// Register custom post types
function dynamic_post_types_plugin_register_post_type() {
    // Define your custom post types here
}
add_action( 'init', 'dynamic_post_types_plugin_register_post_type' );

// Add main menu and submenus
function dynamic_post_types_plugin_menu() {
    add_menu_page(
        'EverBlock',
        'EverBlock',
        'manage_options',
        'dynamic-all-in-one-plugin',
        'dynamic_all_in_one_plugin_settings_page',
        'dashicons-admin-plugins',
        12 // Position in the menu
    );

    // Add submenus
    add_submenu_page(
        'dynamic-all-in-one-plugin',
        'Post Type',
        'Post Type',
        'manage_options',
        'dynamic-post-type',
        'dynamic_post_types_plugin_settings_page'
    );

    add_submenu_page(
        'dynamic-all-in-one-plugin',
        'Custom Field',
        'Custom Field',
        'manage_options',
        'dynamic-custom-field',
        'dynamic_custom_field_settings_page'
    );

    add_submenu_page(
        'dynamic-all-in-one-plugin',
        'Feature 3',
        'Feature 3',
        'manage_options',
        'dynamic-feature-3',
        'dynamic_feature_3_settings_page'
    );

    add_submenu_page(
        'dynamic-all-in-one-plugin',
        'Feature 4',
        'Feature 4',
        'manage_options',
        'dynamic-feature-4',
        'dynamic_feature_4_settings_page'
    );
}
add_action( 'admin_menu', 'dynamic_post_types_plugin_menu' );

// Display the settings page for managing custom post types
function dynamic_post_types_plugin_settings_page() {
    // Display settings page content here
    echo '<div class="wrap">';
    echo '<h2>Manage Custom Post Types</h2>';
    // Add form and controls for managing custom post types
    echo '<form method="post" action="">';
    echo '<input type="text" name="post_type_name" placeholder="Post Type Name">';
    echo '<input type="submit" name="add_post_type" value="Add Post Type">';
    echo '</form>';
    echo '<h3>Registered Custom Post Types</h3>';
    
    // Retrieve list of registered custom post types
    $post_types = get_post_types( array( 'public' => true ), 'objects' );

    // Display the list in a table
    echo '<table class="wp-list-table widefat fixed">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Name</th>';
    echo '<th>Labels</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ( $post_types as $post_type ) {
        echo '<tr>';
        echo '<td>' . $post_type->name . '</td>';
        echo '<td>' . $post_type->label . '</td>';
        echo '<td><a href="#">Edit</a> | <a href="#">Delete</a></td>'; // Add edit and delete links
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    echo '</div>';

    // Handle form submission
    if ( isset( $_POST['add_post_type'] ) ) {
        $post_type_name = sanitize_text_field( $_POST['post_type_name'] );
        // Validate $post_type_name and register the custom post type
        $args = array(
            'public' => true,
            'label'  => $post_type_name,
            // Add more arguments as needed
        );
        register_post_type( $post_type_name, $args );
    }
}