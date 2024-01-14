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

    // Delete plugins akismet and hello dolly
    delete_plugins( array( 'akismet/akismet.php', 'hello-dolly/hello.php' ) );
}
