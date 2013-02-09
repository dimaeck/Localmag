<?php
/**
 * Get Featured Image Preview - Used in Admin screen
 **/
function local_stories_get_featured_image_preview( $post_id ){
	$post_thumbnail_id = get_post_thumbnail_id( $post_id );
	if ($post_thumbnail_id) {
		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'featured_preview' );
		return $post_thumbnail_img[0];
	}
}

function local_stories_is_issue ( $post_id ){
	$is_issue = get_post_meta($post_id, 'is_issue', true);
	if ( $is_issue != false)
		return true;
	else
		return false;
}

?>