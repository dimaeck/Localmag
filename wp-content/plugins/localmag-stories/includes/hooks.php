<?php

add_action( 'init', '_story_register_types');
add_action( 'init', 'localmag_stories_activate');

if ( is_admin() ) {
	//Story admin
	add_action( 'manage_story_posts_custom_column', 'story_columns_content', 10, 2);
	add_filter( 'manage_story_posts_columns', 'story_columns_head' );
	add_action( 'save_post', 'story_save_metabox' );
	
	//Locations taxonomy admin
	// add_action( 'locations_add_form_fields', 'locations_add_taxonomy_custom_fields', 10, 2 );
	// add_action( 'locations_edit_form_fields', 'locations_edit_taxonomy_custom_fields', 10, 2 );
	// add_action( 'edited_locations', 'save_taxonomy_custom_fields', 10, 2 );

	//Issues taxonomy admin

}
?>