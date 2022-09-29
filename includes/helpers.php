<?php

// Add page slug to body class
function add_slug_to_body_class($classes) {
  global $post;
  if (is_home()) {
    $key = array_search('blog', $classes);
    if ($key > -1) {
      unset($classes[$key]);
    }
  } elseif (is_page()) {
    $classes[] = sanitize_html_class($post->post_name);
  } elseif (is_singular()) {
    $classes[] = sanitize_html_class($post->post_name);
  }

  return $classes;
}
add_filter('body_class', 'add_slug_to_body_class');


// custom excerpt length
function custom_excerpt_length( $length ) {
	// Don't change anything inside /wp-admin/
	if ( is_admin() ) {
		return $length;
	}
	// Set excerpt length to 140 words
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
