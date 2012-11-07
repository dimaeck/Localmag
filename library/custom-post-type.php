<?php
function issue_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'issue', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Issues/Articles'), /* This is the Title of the Group */
			'singular_name' => __('Issue/Article'), /* This is the individual type */
			'add_new' => __('Add New'), /* The add new menu item */
			'add_new_item' => __('Add New Issue/Article'), /* Add New Display Title */
			'edit' => __( 'Edit' ), /* Edit Dialog */
			'edit_item' => __('Edit Issue/Article'), /* Edit Display Title */
			'new_item' => __('New Issue/Article'), /* New Display Title */
			'view_item' => __('View Issue/Article'), /* View Display Title */
			'search_items' => __('Search Issues/Articles'), /* Search Custom Type Title */ 
			'not_found' =>  __('Nothing found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('Nothing found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item' => __('Issue')
			), /* end of arrays */
			'description' => __( 'Issue/Article custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => true,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'sticky', 'post-formats', 'gallery', 'video', 'audio'),
                        'register_meta_box_cb' => 'add_custom_metabox'
	 	) /* end of options */
	); /* end of register post type */
	
    flush_rewrite_rules();	
} 
// adding the function to the Wordpress init
add_action( 'init', 'issue_post_type');

function sponsor_post_type() { 
	// creating (registering) the custom type 
	register_post_type( 'sponsor', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
	 	// let's now add all the options for this post type
		array('labels' => array(
			'name' => __('Sponsor'), /* This is the Title of the Group */
			'singular_name' => __('Sponsor'), /* This is the individual type */
			'add_new' => __('Add New Sponsor'), /* The add new menu item */
			'add_new_item' => __('Add New Sponsor'), /* Add New Display Title */
			'edit' => __( 'Edit Sponsor' ), /* Edit Dialog */
			'edit_item' => __('Edit Sponsor'), /* Edit Display Title */
			'new_item' => __('New Sponsor'), /* New Display Title */
			'view_item' => __('View Sponsor'), /* View Display Title */
			'search_items' => __('Search Sponsor'), /* Search Custom Type Title */ 
			'not_found' =>  __('No Sponsors found in the Database.'), /* This displays if there are no entries yet */ 
			'not_found_in_trash' => __('No Sponsors found in Trash'), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Sponsor custom post type' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 9, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'sticky', 'post-formats', 'gallery', 'video', 'audio'),
                        'register_meta_box_cb' => 'add_custom_metabox'
	 	) /* end of options */
	); /* end of register post type */
	
    flush_rewrite_rules();	
} 
// adding the function to the Wordpress init
add_action( 'init', 'sponsor_post_type');

if( class_exists( 'kdMultipleFeaturedImages' ) ) {

        $args = array(
                'id' => 'issue-cover',
                'post_type' => 'issue',      // Set this to post or page
                'labels' => array(
                    'name'      => 'Issue Cover',
                    'set'       => 'Set Issue Cover',
                    'remove'    => 'Remove Issue Cover',
                    'use'       => 'Use as Issue Cover',
                )
        );

        new kdMultipleFeaturedImages( $args );
}

?>
