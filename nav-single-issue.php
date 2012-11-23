<?php
/*
 * Template part to be used for navigation at the bottom of child issue/articles
 * Assumes $post is set in file including it. 
 */
	// if( $post->ID > 0);

	global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$loop = new WP_Query ( 
						array('post_type' => 'issue',
								'post_parent' => 0,
								'posts_per_page' => 1,
								'orderby' => 'menu_order',
								'paged'=>$paged
							 )
						 );
?>

<div class="row navigation">
	<div class="six mobile-two columns">
		<?php previous_post_link();?>
	</div>
	<div class="six mobile-two columns">
		<?php next_post_link('<div style="float: right;"> %link &raquo; </div>');?>
	</div>
</div>
