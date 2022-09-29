<?php
// register Custom Post Types
function create_post_types() {

  // register_post_type('aanbod', array(
  //     'labels' => array(
  //       'name' => 'Aanbod',
  //       'all_items' => 'Alle aanbod',
  //       'add_new_item' => 'Nieuw aanbod',
  //       'new_item' => 'Nieuw aanbod',
  //       'add_new' => 'Nieuw aanbod',
  //     ),
  //     'public' => true,
  //     'has_archive' => false,
  //     'supports' => array('title', 'editor', 'thumbnail'),
  //     'exclude_from_search' => false,
  //     'menu_icon'   => 'dashicons-editor-ul',
  // ));

}
add_action('init', 'create_post_types');

function register_taxonomies() {

	$taxonomies = array(
		array(
			'slug'         => 'thema',
			'single_name'  => 'Thema',
			'plural_name'  => 'Thema\'s',
			'post_type'    => 'project',
		),
	);

	foreach( $taxonomies as $taxonomy ) {
		$labels = array(
			'name' => $taxonomy['plural_name'],
			'singular_name' => $taxonomy['single_name'],
			'search_items' =>  'Search ' . $taxonomy['plural_name'],
			'all_items' => 'All ' . $taxonomy['plural_name'],
			'parent_item' => 'Parent ' . $taxonomy['single_name'],
			'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
			'edit_item' => 'Edit ' . $taxonomy['single_name'],
			'update_item' => 'Update ' . $taxonomy['single_name'],
			'add_new_item' => 'Add New ' . $taxonomy['single_name'],
			'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
			'menu_name' => $taxonomy['plural_name']
		);

		$rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
		$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

		register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
			'hierarchical' => $hierarchical,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => $rewrite,
      'show_tagcloud' => false,
      'show_admin_column' => true,
		));
	}

}
add_action( 'init', 'register_taxonomies' );
