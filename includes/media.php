<?php

// Allow SVG upload
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


// Convert youtube url to embed url
function convertYoutube($string) {
  return preg_replace(
    "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
    "<div class='embed-container'><iframe src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe></div>",
    $string
  );
}

// Convert vimeo url to embed url
function convertVimeo($string) {
  return preg_replace(
    "/\s*[a-zA-Z\/\/:\.]*vimeo(be.com\/\|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
    "<div class='embed-container'><iframe src=\"//player.vimeo.com/video/$2\" frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>",
    $string
  );
}

// Wrap youtube url
function oembed_filter($html, $url, $attr, $post_ID) {
  $return = "<div class='embed-container'>$html</div>";
  return $return;
}
add_filter('embed_oembed_html', 'oembed_filter', 10, 4 ) ;
