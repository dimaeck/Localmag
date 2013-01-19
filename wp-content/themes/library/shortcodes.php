<?php

// shortcodes

// Gallery shortcode

// remove the standard shortcode
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'gallery_shortcode_tbs');

function gallery_shortcode_tbs($attr) {
	global $post, $wp_locale;

	$args = array( 'post_type' => 'attachment', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
		$output = '<div id="article-image-gallery">';
//                $output = '<div>';
		foreach ( $attachments as $attachment ) {
			$small_img_url = wp_get_attachment_image_src( $attachment->ID, 'bones-thumb-600', true );
                        $big_img_url = wp_get_attachment_image_src( $attachment->ID, 'wpf-home-featured', true );
                        
//			$output .= '<li>';
                        $output .= '<a href="';
                        $output .= $big_img_url[0];
                        $output .='" rel="lightbox" />';
                        $output .= '<img src="';
			$att_title = apply_filters( 'the_title' , $attachment->post_title );
                        $output .= $small_img_url[0];
//                        $output .= wp_get_attachment_link( $attachment->ID , 'thumbnail', true );
//			$output .= '</li>';
                        $output .= '" />';
                        $output .= '</a>';
		}
		$output .= '</div>';
	}

	return $output;
}



// Buttons
function buttons( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => 'radius', /* radius, round */
	'size' => 'medium', /* small, medium, large */
	'color' => 'blue',
	'nice' => 'false',
	'url'  => '',
	'text' => '', 
	), $atts ) );
	
	$output = '<a href="' . $url . '" class="button '. $type . ' ' . $size . ' ' . $color;
	if( $nice == 'true' ){ $output .= ' nice';}
	$output .= '">';
	$output .= $text;
	$output .= '</a>';
	
	return $output;
}

add_shortcode('button', 'buttons'); 

// Alerts
function alerts( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="fade in alert-box '. $type . '">';
	
	$output .= $text;
	if($close == 'true') {
		$output .= '<a class="close" href="#">×</a></div>';
	}
	
	return $output;
}

add_shortcode('alert', 'alerts');

// Panels
function panels( $atts, $content = null ) {
	extract( shortcode_atts( array(
	'type' => '	', /* warning, success, error */
	'close' => 'false', /* display close link */
	'text' => '', 
	), $atts ) );
	
	$output = '<div class="panel">';
	$output .= $text;
	$output .= '</div>';
	
	return $output;
}

add_shortcode('panel', 'panels');
?>