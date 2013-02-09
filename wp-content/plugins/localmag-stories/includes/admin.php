<?php

/**
 * Manage Stories Admin screen - Additional Columns
 **/
function story_columns_head( $defaults ){
	//Put featured image in position 3, CB (Checkbox), then Title, then Featured Image
	$defaults = array_slice( $defaults, 0, 2, true) + 
				array('featured_image' => 'Featured Image') + array('is_issue' => 'IssueCover') +
				array_slice( $defaults, 2, count($defaults)-1, true);
	return $defaults;
}

function story_columns_content( $column_name, $post_id ){
    	if ( $column_name == 'featured_image'){
    		$post_featured_image = local_stories_get_featured_image_preview($post_id);
    		if ( $post_featured_image ){
    			echo '<img src="' . $post_featured_image . '" />';
    		}
    	}

    	if ( $column_name == 'is_issue'){
    		$is_issue = local_stories_is_issue($post_id);
    		if($is_issue)
    			echo "Yes";
    		else
    			echo "No";
    		
    	}
	}

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
    $story_latitude = get_post_meta( $post->ID, 'story_latitude', true);
    $story_longitude = get_post_meta( $post->ID, 'story_longitude', true);
    $is_issue = false;
    $is_issue = get_post_meta( $post->ID, 'is_issue', true);
    $shop_issue_number = get_post_meta( $post->ID, 'shop_issue_number', true);
    
	?>
        <p>The featured image description</p>
        <label class="screen-reader-text" for="featured_description">Featured Image Description</label>
        <textarea rows="1" cols="40" name="featured_description" id="featured_description" style="width: 40%;"><?php if( $featured_description ) { echo $featured_description; } ?></textarea>
		<p>
			<label class="selectit">
				<input value="true" type="checkbox" name="is_issue" id="is_issue" <?php if($is_issue != false){ echo "checked='checked'";} ?> >
				Check this if this story is the main cover story, like Jersey-Shore, PA or Roanoke, VA
			</label>
		</p>
	<table>
		<tr class="form-field">
			<td>
				<label class="selectit" for="shop_issue_number"><?php _e('Shop Issue Number'); ?><input type="text" name="shop_issue_number" id="shop_issue_number]" size="10" style="width:40%;" value="<?php if( $shop_issue_number ) { echo $shop_issue_number; } ?>"></label>
			</td>
		</tr>
		<tr class="form-field">
			<td>
				<label class="selectit" for="story_latitude"><?php _e('Story Latitude'); ?><input type="text" name="story_latitude" id="story_latitude]" size="10" style="width:40%;" value="<?php if( $story_latitude ) { echo $story_latitude; } ?>"></label>
			</td>
		</tr>
		<tr class="form-field">
			<td>
				<label class="selectit" for="story_longitude"><?php _e('Story Longitude'); ?><input type="text" name="story_longitude" id="story_longitude" size="10" style="width:40%;" value="<?php if( $story_longitude ) { echo $story_longitude; } ?>"></label>
			</td>
		</tr>
	</table>
	<?php
}

function story_save_metabox( ) {
    global $post;
    if( $_POST ) {
        
        update_post_meta( $post->ID, 'featured_description', $_POST['featured_description'] );
        update_post_meta( $post->ID, 'story_latitude', $_POST['story_latitude'] );
        update_post_meta( $post->ID, 'story_longitude', $_POST['story_longitude'] );
        update_post_meta( $post->ID, 'shop_issue_number', $_POST['shop_issue_number'] );


        if( isset( $_POST['is_issue'] ) )
        	update_post_meta( $post->ID, 'is_issue', $_POST['is_issue'] );
        else
    		update_post_meta( $post->ID, 'is_issue', false );
    }
}

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
?>