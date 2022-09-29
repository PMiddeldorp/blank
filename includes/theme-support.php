<?php

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (function_exists('add_theme_support')) {

    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 960, '', true); // Large Thumbnail
    add_image_size('medium', 768, '', true); // Medium Thumbnail
    add_image_size('header', 1440, '', true); // Large Thumbnail

}
