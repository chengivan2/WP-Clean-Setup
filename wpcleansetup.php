<?php
/*
Plugin Name: WP Clean Setup Plugin
Description: Performs cleanup actions on activation.
Version: 2.0
Author: Your Name
*/


    // Actions to perform on activation
    register_activation_hook(__FILE__, 'cleanup_plugin_activation');

    function cleanup_plugin_activation() {
        // Delete page with ID 2
        wp_delete_post(2, true);

        // Delete post with ID 1
        wp_delete_post(1, true);

        // Delete Hello Dolly plugin
        $hello_dolly_path_1 = WP_PLUGIN_DIR . '/hello-dolly/hello.php';
        $hello_dolly_path_2 = WP_PLUGIN_DIR . '/hello.php';

        if (file_exists($hello_dolly_path_1)) {
            delete_plugins( array( 'hello-dolly/hello.php' ));
        } elseif (file_exists($hello_dolly_path_2)) {
            delete_plugins( array( 'hello.php' ));
        }

        // Delete Akismet plugin
        delete_plugins( array( 'akismet/akismet.php' ) )


        // Display success message
        echo 'Clean Up complete!';
    }
    if (isset($_GET['activated']) && is_admin()) {
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');
        $wp_rewrite->flush_rules();
    }
    //removed permalink redirect
?>