<?php

// Remove Admin bar
function remove_admin_bar() {
  return false;
}
add_filter('show_admin_bar', 'remove_admin_bar');


// remove block library CSS
function remove_wp_block_library_css(){
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );
  wp_dequeue_style( 'classic-theme-styles' );
  wp_dequeue_style( 'wc-block-style' ); // remove woocommerce block css
  wp_dequeue_style( 'global-styles' ); // remove theme.json
}
add_action( 'wp_enqueue_scripts', 'remove_wp_block_library_css' );


//Remove jQuery migrate
function remove_jquery_migrate($scripts) {
  if (!is_admin() && isset($scripts->registered['jquery'])) {

    $script = $scripts->registered['jquery'];
    if ($script->deps) { // Check whether the script has any dependencies
      $script->deps = array_diff($script->deps, array(
        'jquery-migrate'
      ));
    }

  }
}
add_action('wp_default_scripts', 'remove_jquery_migrate');


// Remove WP Emoji
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');


// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action( 'wp_head', 'wp_resource_hints', 2, 99 );

// Filters
add_filter('auto_plugin_update_send_email', '__return_false' ); // disable email notification after auto plugin update
