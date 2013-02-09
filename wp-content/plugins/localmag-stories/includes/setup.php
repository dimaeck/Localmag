<?php
/**
 * Custom Image Sizes
 **/
add_image_size('featured_preview', 55, 55, true);
add_image_size( 'localmag-issue', 460, 300, false );

/**
 * Rewrite Rules
 **/    
function localmag_stories_activate(){
	if ( version_compare( get_bloginfo( 'version' ), '3.1', '<' ) ) {
		deactivate_plugins( LOCAL_BASENAME );
	} else {
			story_post_type();
			story_issue_taxonomy();
			story_location_taxonomy();
			localmag_stories_add_rewrite_rules();
		}
}
function _story_register_types(){
	story_post_type();
	story_issue_taxonomy();
	story_location_taxonomy();
}
function localmag_stories_add_rewrite_rules()
{
	/** Add additional tags **/
	add_rewrite_tag('%is_issue%', '^(true|false)');
	add_rewrite_tag('%taxonomy%', '([^&]+)'); //Used to create feeds for taxonomies

	/** Add rewrite rules **/	
	add_rewrite_rule('feed/?$', 'index.php?feed=rss2&post_type=story&taxonomy=issue', 'top');
	add_rewrite_rule('issue/([^/]+)/([^/]+)/?$', 'index.php?post_type=story&taxonomy=issue&term=$matches[1]&story=$matches[2]', 'bottom');
	flush_rewrite_rules();
}
/**
 * Issues Custom Taxonomy
 **/
function story_issue_taxonomy() {
	$labels = array(
				    'name'                          => 'Issues',
				    'singular_name'                 => 'Issue',
				    'search_items'                  => 'Search Issues',
				    'popular_items'                 => 'Popular Issues',
				    'all_items'                     => 'All Issues',
				    'parent_item'                   => 'Parent Issue',
				    'edit_item'                     => 'Edit Issue',
				    'update_item'                   => 'Update Issue',
				    'add_new_item'                  => 'Add New Issue',
				    'new_item_name'                 => 'New Issue',
				    'separate_items_with_commas'    => 'Separate Issues with commas',
				    'add_or_remove_items'           => 'Add or remove Issue',
				    'choose_from_most_used'         => 'Choose from most used Issues'
				    );

	$args = array(
					'label'                         => 'Issues',
					'labels'                        => $labels,
					'public'                        => true,
					'hierarchical'                  => true,
					'show_ui'                       => true,
					'show_in_nav_menus'             => true,
					'show_admin_column'				=> true, //Shows Locations as a column when viewing the custom post type it's associated with
					'args'                          => array( 'orderby' => 'term_order' ),
					'rewrite'                       => array( 'slug' => 'issue', 'with_front' => false ),
					'query_var'                     => true
				);

	register_taxonomy( 'issue', 'story', $args );
}

/**
 * Locations Custom Taxonomy
 **/
function story_location_taxonomy() {
	$labels = array(
				    'name'                          => 'Locations',
				    'singular_name'                 => 'Location',
				    'search_items'                  => 'Search Locations',
				    'popular_items'                 => 'Popular Locations',
				    'all_items'                     => 'All Locations',
				    'parent_item'                   => 'Parent Location',
				    'edit_item'                     => 'Edit Location',
				    'update_item'                   => 'Update Location',
				    'add_new_item'                  => 'Add New Location',
				    'new_item_name'                 => 'New Location',
				    'separate_items_with_commas'    => 'Separate Locations with commas',
				    'add_or_remove_items'           => 'Add or remove Locations',
				    'choose_from_most_used'         => 'Choose from most used Locations'
				    );

	$args = array(
					'label'                         => 'Locations',
					'labels'                        => $labels,
					'public'                        => true,
					'hierarchical'                  => true,
					'show_ui'                       => true,
					'show_in_nav_menus'             => true,
					'show_admin_column'				=> true, //Shows Locations as a column when viewing the custom post type it's associated with
					'args'                          => array( 'orderby' => 'term_order' ),
					'rewrite'                       => array( 'slug' => 'locations', 'with_front' => false ),
					'query_var'                     => true
				);

	register_taxonomy( 'locations', 'story', $args );
}

/**
 * Story Custom Post Type
 **/
	function story_post_type() { 
		//Custom labels
		$labels = array(
					'name' 					=> __('Stories'), /* This is the Title of the Group */
					'singular_name' 		=> __('Story'), /* This is the individual type */
					'add_new' 				=> __('Add New Story'), /* The add new menu item */
					'add_new_item' 			=> __('Add New Story'), /* Add New Display Title */
					'edit' 					=> __( 'Edit' ), /* Edit Dialog */
					'edit_item' 			=> __('Edit Story'), /* Edit Display Title */
					'new_item' 				=> __('New Story'), /* New Display Title */
					'view_item' 			=> __('View Story'), /* View Display Title */
					'search_items'			=> __('Search Stories'), /* Search Custom Type Title */ 
					'not_found' 			=> __('No stories found in the Database.'), /* This displays if there are no entries yet */ 
					'not_found_in_trash' 	=> __('No stories found in the Trash') /* This displays if there is nothing in the trash */
				);

		//Custom post type args
		$args = array(
					'label'					=> 'Stories',
					$labels,
					'description' 			=> __( 'Story custom post type' ), /* Custom Type Description */
					'public' 				=> true,
					'publicly_queryable' 	=> true,
					'exclude_from_search' 	=> false,
					'show_ui' 				=> true,
					'query_var' 			=> true,
					'menu_position' 		=> 4, /* this is what order you want it to appear in on the left hand side menu */ 
					'menu_icon' 			=> get_stylesheet_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
					'rewrite' 				=> array( 'slug' => 'stories', 'with_front' => false, 'feed' => true ),
					'capability_type' 		=> 'post',
					'hierarchical' 			=> false,
					'has_archive' 			=> true,
					'supports' 				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'post-formats', 'gallery', 'video', 'audio'),
		            'register_meta_box_cb' 	=> 'story_add_metabox'
		            );
		
		//Register the custom post with Wordpress
		register_post_type( 'story', $args);
	}
?>