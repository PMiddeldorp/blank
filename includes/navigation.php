<?php

// Register Navigation
function register__menu() {
  register_nav_menus(
    array(
      'main' => 'Main', // Main Navigation
    )
  );
}
add_action('init', 'register__menu'); 
