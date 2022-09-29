<?php

/*------------------------------------*\
	ACF
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Website opties',
		'menu_title'	=> 'Website opties',
		'menu_slug' 	=> 'website-opties',
		'capability'	=> 'edit_posts',
		'redirect'	=> false
	));
}

// image field
function acf_image($imageField,$imageSize) {

  $image = get_field($imageField); if( !empty($image) ):

    // vars
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];

    // thumbnail
    $size = $imageSize;
    $thumb = $image['sizes'][ $size ];
    $width = $image['sizes'][ $size . '-width' ];
    $height = $image['sizes'][ $size . '-height' ];

    $return = "<figure>";
    $return .= "<img src='".$thumb."' alt='".$alt."' width='".$width."' height='".$height."' >";
    $return .= "</figure>";

    echo $return;

  endif;
}


// image subfield
function acf_image_subfield($imageField, $imageSize) {

    $image = get_sub_field($imageField); if( !empty($image) ):

    // vars
    $url = $image['url'];
    $title = $image['title'];
    $alt = $image['alt'];

    // thumbnail
    $size = $imageSize;
    $thumb = $image['sizes'][ $size ];

    $return = "<figure>";
    $return .= "<img src='".$thumb."' alt='".$alt."'>";
    $return .= "</figure>";

    echo $return;

  endif;
}

// ACF link field
function acf_link_button($link_field) {

	if($link_field):

		$link_field = get_field($link_field);

		$link_url = $link_field['url'];
		$link_title = $link_field['title'];
		$link_target = $link_field['target'] ? $link_field['target'] : '_self';

		$return = "<a class='button' href='".$link_url."' target='".$link_target."'>".$link_title."</a>";

		echo $return;

	endif;
}
