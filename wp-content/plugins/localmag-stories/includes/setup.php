<?php
/**
 * Custom Image Sizes
 **/
add_image_size('featured_preview', 55, 55, true);
add_image_size( 'localmag-issue', 460, 300, false );

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
add_action( 'init', 'story_location_taxonomy');

/**
 * Locations Taxonomy Custom Fields
 **/

	/**
	 * Add custom fields to Editing Screen
	 **/
	function locations_edit_taxonomy_custom_fields ($tag) {
		$tid = $tag->term_id; //Get ID of term
		$term_meta = get_option( "taxonomy_term_$tid" ); //Get meta associated with this term
		?>

			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="location_latitude"><?php _e('Location Latitude'); ?></label>
				</th>
				<td>
					<input type="text" name="term_meta[location_latitude]" id="term_meta[location_latitude]" size="25" style="width:60%;" value="<?php echo $term_meta['location_latitude'] ? $term_meta['location_latitude'] : ''; ?>"><br />
					<span class="description"><?php _e('The Location\'s Latitude'); ?></span>
				</td>
			</tr>

			<tr class="form-field">
				<th scope="row" valign="top">
					<label for="location_longitude"><?php _e('Location Longitude'); ?></label>
				</th>
				<td>
					<input type="text" name="term_meta[location_longitude]" id="term_meta[location_longitude]" size="25" style="width:60%;" value="<?php echo $term_meta['location_longitude'] ? $term_meta['location_longitude'] : ''; ?>"><br />
					<span class="description"><?php _e('The Location\'s Longitude'); ?></span>
				</td>
			</tr>

		<?php
	}
	add_action( 'locations_edit_form_fields', 'locations_edit_taxonomy_custom_fields', 10, 2 );

	/**
	 * Add custom fields to Add screen
	 **/
	function locations_add_taxonomy_custom_fields ($tag) {
		$tid = $tag->term_id; //Get ID of term
		$term_meta = get_option( "taxonomy_term_$tid" ); //Get meta associated with this term
		?>

			<div class="form-field">
				<label for="location_latitude"><?php _e('Location Latitude'); ?></label>
				<input type="text" name="term_meta[location_latitude]" id="term_meta[location_latitude]" size="25" style="width:60%;" value="<?php echo $term_meta['location_latitude'] ? $term_meta['location_latitude'] : ''; ?>"><br />
					<span class="description"><?php _e('The Location\'s Latitude'); ?></span>
				<label for="location_longitude"><?php _e('Location Longitude'); ?></label>
				<input type="text" name="term_meta[location_longitude]" id="term_meta[location_longitude]" size="25" style="width:60%;" value="<?php echo $term_meta['location_longitude'] ? $term_meta['location_longitude'] : ''; ?>"><br />
				<span class="description"><?php _e('The Location\'s Longitude'); ?></span>
			</div>

		<?php
	}
	add_action( 'locations_add_form_fields', 'locations_add_taxonomy_custom_fields', 10, 2 );

	/**
	 * Saving
	 **/

	// A callback function to save our extra taxonomy field(s)
	function save_taxonomy_custom_fields( $term_id ) {
	    if ( isset( $_POST['term_meta'] ) ) {
	        $term_meta = get_option( "taxonomy_term_$term_id" );
	        $cat_keys = array_keys( $_POST['term_meta'] );
	            foreach ( $cat_keys as $key ){
	            if ( isset( $_POST['term_meta'][$key] ) ){
	                $term_meta[$key] = $_POST['term_meta'][$key];
	            }
	        }
	    	update_option( "taxonomy_term_$term_id", $term_meta );
	    }
	}
	add_action( 'edited_locations', 'save_taxonomy_custom_fields', 10, 2 );

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
					'rewrite' 				=> array( 'slug' => 'stories', 'with_front' => false ),
					'capability_type' 		=> 'post',
					'hierarchical' 			=> false,
					'has_archive' 			=> true,
					'supports' 				=> array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes', 'post-formats', 'gallery', 'video', 'audio'),
		            'register_meta_box_cb' 	=> 'story_add_metabox'
		            );
		
		//Register the custom post with Wordpress
		register_post_type( 'story', $args);
	}
	add_action( 'init', 'story_post_type');

	/**
	 * Story metabox
	 * TO DO - Fix the spacing on the Featured Image Description input field
	 **/
    function story_add_metabox(){
        add_meta_box( 'story-metabox', __( 'Story Meta' ), 'story_edit_metabox', 'story', 'normal', 'high' );
    }

	function story_edit_metabox(){
        global $post;
        $featured_description = get_post_meta( $post->ID, 'featured_description', true);
        
		?>
	        <label class="screen-reader-text" for="featured_description">Featured Image Description:</label>
	        <textarea rows="1" cols="40" name="featured_description" id="featured_description" style="height: 4em; width: 98%;">
	        	<?php if( $featured_description ) { echo $featured_description; } ?>
	        </textarea>
		<?php
	}
    
    function story_save_metabox( ) {
        global $post;
        if( $_POST ) {
            update_post_meta( $post->ID, 'featured_description', $_POST['featured_description'] );
        }
    }
    add_action( 'save_post', 'story_save_metabox' );

    /**
     * Manage Stories Admin screen - Additional Columns
     **/
    function story_columns_head( $defaults ){
    	//Put featured image in position 3, CB (Checkbox), then Title, then Featured Image
    	$defaults = array_slice( $defaults, 0, 2, true) + 
    				array('featured_image' => 'Featured Image') + 
    				array_slice( $defaults, 2, count($defaults)-1, true);
    	return $defaults;
    }
    add_filter( 'manage_story_posts_columns', 'story_columns_head' );

    function story_columns_content( $column_name, $post_id ){
    	if ( $column_name == 'featured_image'){
    		$post_featured_image = local_stories_get_featured_image_preview($post_id);
    		if ( $post_featured_image ){
    			echo '<img src="' . $post_featured_image . '" />';
    		}
    	}
    }
    add_action( 'manage_story_posts_custom_column', 'story_columns_content', 10, 2);
?>