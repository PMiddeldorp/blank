<?php

function checkEnvironment(){
  $address = $_SERVER['REMOTE_ADDR'];
  if($address === '::1'){
    return 'development';
  } else {
    return 'production';
  }
}

// Load scripts
function blank_scripts() {
  if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    // deregister jQuery
    wp_deregister_script('jquery');

    // register scripts
    if(checkEnvironment() === 'development'):
      wp_register_script('main', get_template_directory_uri() . '/development/main.js', array(), '1.0.0', true); 
    else:
      wp_register_script('main', get_template_directory_uri() . '/dist/main.min.js', array(), '1.0.0', true);
    endif;

    // Enqueue scripts
    wp_enqueue_script('main');

  }
}
add_action('init', 'blank_scripts');


// Load styles
function blank_styles() {

  // register styles
  if(checkEnvironment() === 'development'):
    wp_register_style('blank', get_template_directory_uri() . '/development/styles.css', array(), '1.0', 'all');
  else:
    wp_register_style('blank', get_template_directory_uri() . '/dist/styles.min.css', array(), '1.0', 'all');
  endif;

  // Enqueue styles
  wp_enqueue_style('blank');

}
add_action('wp_enqueue_scripts', 'blank_styles');
