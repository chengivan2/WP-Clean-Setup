<?php
/*
Plugin Name: WP Clean Setup
Description: A WordPress plugin that deletes: Sample Page,
                                            Hello World post, 
                                            Hello Dolly and Akismeet Pluginson activation.
Version: 1.0
Author: Ivan the Dev
Author URI: https://ivanthedev.guru
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

// Register activation hook
register_activation_hook( __FILE__, 'wpcs_delete_posts_and_plugins' );

// Define function to delete posts and plugins
function wpcs_delete_posts_and_plugins() {

    // Delete posts with post id 1 and 2
    wp_delete_post( 1, true );
    wp_delete_post( 2, true );

    // Delete plugins akismet anti-spam and hello dolly
    delete_plugins( array( 'akismet-anti-spam/akismet.php' ) );

    // Get the absolute path to the plugins directory
    $plugins_dir = WP_CONTENT_DIR . '/plugins';

    // Get the plugin file name from the current file
    $this_plugin = plugin_basename( __FILE__ );

    // Check if hello dolly plugin exists in the plugins directory
    if ( file_exists( $plugins_dir . '/hello.php' ) ) {

        // Delete hello dolly plugin from the plugins directory
        delete_plugins( array( 'hello.php' ) );
    }

    // Check if hello dolly plugin exists in the hello-dolly subdirectory
    if ( file_exists( $plugins_dir . '/hello-dolly/hello.php' ) ) {

        // Delete hello dolly plugin from the hello-dolly subdirectory
        delete_plugins( array( 'hello-dolly/hello.php' ) );
    }

    // Deactivate this plugin
    deactivate_plugins( $this_plugin );
}