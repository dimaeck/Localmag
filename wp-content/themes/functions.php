<?php
/*
*/

// Get Bones Core Up & Running!
// require_once('library/bones.php');            // core functions (don't remove)
require_once('library/plugins.php');          // plugins & extra functions (optional)
require_once('library/custom-post-type.php'); // custom post type example

// Options panel
require_once('library/options-panel.php');

// Shortcodes
require_once('library/shortcodes.php');

add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ));
//add_post_type_support( 'issue', 'post-formats' );

// Admin Functions (commented out by default)
// require_once('library/admin.php');         // custom admin functions

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'wpf-featured', 460, 300, true );
add_image_size( 'localmag-issue', 460, 300, false );
add_image_size ( 'wpf-home-featured', 970, 364, true );
add_image_size( 'bones-thumb-600', 639, 300, true );
add_image_size( 'bones-thumb-300', 300, 100, true );
/************* ENQUEUE CSS AND JS *****************/

function theme_styles()  
{ 
    // This is the compiled css file from SCSS
    wp_register_style( 'foundation-app', get_template_directory_uri() . '/stylesheets/app.css', array(), '3.0', 'all' );
    wp_enqueue_style( 'foundation-app' );
    // wp_register_style( 'lightbox', get_template_directory_uri() . '/stylesheets/lightbox.css', array(), '3.0', 'all' );
    // wp_enqueue_style( 'lightbox' );
    
}

add_action('wp_enqueue_scripts', 'theme_styles');

/************* ENQUEUE JS *************************/

/* pull jquery from google's CDN. If it's not available, grab the local copy. Code from wp.tutsplus.com :-) */

$url = 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'; // the URL to check against  
$test_url = @fopen($url,'r'); // test parameters  
if( $test_url !== false ) { // test if the URL exists  

    function load_external_jQuery() { // load external file  
        wp_deregister_script( 'jquery' ); // deregisters the default WordPress jQuery  
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js'); // register the external file  
        wp_enqueue_script('jquery'); // enqueue the external file  
    }  

    add_action('wp_enqueue_scripts', 'load_external_jQuery'); // initiate the function  
} else {  

    function load_local_jQuery() {  
        wp_deregister_script('jquery'); // initiate the function  
        wp_register_script('jquery', bloginfo('template_url').'/javascripts/jquery.min.js', __FILE__, false, '1.8.3', true); // register the local file  
        wp_enqueue_script('jquery'); // enqueue the local file  
    }  

    add_action('wp_enqueue_scripts', 'load_local_jQuery'); // initiate the function  
}  

/* load modernizr from foundation */
function modernize_it(){
    wp_register_script( 'modernizr', get_template_directory_uri() . '/javascripts/foundation/modernizr.foundation.js' ); 
    wp_enqueue_script( 'modernizr' );
}

add_action( 'wp_enqueue_scripts', 'modernize_it' );

function foundation_js(){
    // wp_register_script( 'foundation-reveal', get_template_directory_uri() . '/javascripts/foundation/jquery.reveal.js' ); 
    // wp_enqueue_script( 'foundation-reveal', 'jQuery', '1.1', true );
    wp_register_script( 'foundation-orbit', get_template_directory_uri() . '/javascripts/foundation/jquery.orbit-1.4.0.js' ); 
    wp_enqueue_script( 'foundation-orbit', 'jQuery', '1.4.0', true );
    // wp_register_script( 'foundation-custom-forms', get_template_directory_uri() . '/javascripts/foundation/jquery.customforms.js' ); 
    // wp_enqueue_script( 'foundation-custom-forms', 'jQuery', '1.0', true );
    // wp_register_script( 'foundation-placeholder', get_template_directory_uri() . '/javascripts/foundation/jquery.placeholder.min.js' ); 
    // wp_enqueue_script( 'foundation-placeholder', 'jQuery', '2.0.7', true );
    // wp_register_script( 'foundation-tooltips', get_template_directory_uri() . '/javascripts/foundation/jquery.tooltips.js' ); 
    // wp_enqueue_script( 'foundation-tooltips', 'jQuery', '2.0.1', true );
    wp_register_script( 'foundation-app', get_template_directory_uri() . '/javascripts/app.js' ); 
    wp_enqueue_script( 'foundation-app', 'jQuery', '1.0', true, true );
    // wp_register_script( 'foundation-off-canvas', get_template_directory_uri() . '/javascripts/foundation/off-canvas.js' );
    // wp_enqueue_script( 'foundation-off-canvas', 'jQuery', '1.0', true );
    
    // wp_register_script( 'lightbox', get_template_directory_uri() . '/javascripts/lightbox.js' ); 
    // wp_enqueue_script( 'lightbox', 'jQuery', '1.0', true );
    /* REQUIRES API CLIENT ID FOR OAUTH 
     * USER ID is - 14739626
     */
    // wp_register_script( 'jquery-instagram', get_template_directory_uri() . '/javascripts/jquery.instagram.js' ); 
    // wp_enqueue_script( 'jquery-instagram', 'jQuery', '1.0', true, true );
}

add_action('wp_enqueue_scripts', 'foundation_js');

function wp_foundation_js(){
    wp_register_script( 'wp-foundation-js', get_template_directory_uri() . '/library/js/scripts.js', 'jQuery', '1.0', true);
    wp_enqueue_script( 'wp-foundation-js' );
    wp_register_script( 'jquery-sticky-js', get_template_directory_uri() . '/javascripts/jquery.sticky.js', 'jQuery','1.0', true);
    wp_enqueue_script( 'jquery-sticky-js', 'jQuery', '1.0', true);
    wp_register_script( 'jquery-ui-effects-core.min', get_template_directory_uri() . '/javascripts/jquery-ui-effects-core.min.js', 'jQuery','1.0', true);
    wp_enqueue_script( 'jquery-ui-effects-core.min', 'jQuery', '1.0', true);
}

add_action('wp_enqueue_scripts', 'wp_foundation_js');

//function typekit_js(){
//    wp_register_script ( 'typekit-js', get_template_directory_uri() . '//use.typekit.net/ics1mgx.js', 'jQuery', '1.0', true);
//    wp_enqueue_script ( 'typekit-js', 'jQuery', '1.0', true);
//}
//
//add_action('wp_enqueue_scripts', 'typekit_js');

function localmag_main_nav() {
    echo '<ul id="menu-main-nav" class="nav-wrapper nav-styles top-nav nav-bar block-grid six-up mobile-two-up">';
    echo    '<li class="nav-blog-title">';
    echo        '<h5><a href="' . get_bloginfo('url') . '"> Local Magazine </a></h5>';
    echo    '</li>';
            wp_nav_menu(
                array( 
                    'menu' => 'main_nav', /* menu name */
                    'menu_class' => '',
                    'theme_location' => 'main_nav', /* where in the theme it's assigned */
                    'container' => 'false', /* container tag */
                    'depth' => '1',
                    'items_wrap' => '%3$s'
                )      
            );
    echo '</ul>';
}

function localmag_footer_links() { 
    wp_nav_menu(
        array(
            'menu' => 'footer_links', /* menu name */
            'menu_class' => '',
            'theme_location' => 'footer_links', /* where in the theme it's assigned */
            'container_class' => 'footer-links clearfix' /* container class */
        )
    );
}

function localmag_sidebar_links() {
    wp_nav_menu(
        array(
            'menu' => 'sidebar_links', /* menu name */
            'menu_class' => 'block-grid two-up sidebar',
            'theme_location' => 'sidebar_links', /* where in the theme it's assigned */
            'container_class' => 'footer-links sidebar-links clearfix' /* container class */
        )
    );   
}

function localmag_register_menus(){
    register_nav_menus(
        array(
            'main_nav' => __('Main Menu'),
            'footer_links' => __('Footer links'),
            'sidebar_links' => __('Sidebar links')
            )
        );
}

add_action( 'init', 'localmag_register_menus');
/************* COMMENT LAYOUT *********************/
	
// Add grid classes to comments
function add_class_comments($classes){
    array_push($classes, "twelve", "columns");
    return $classes;
}
add_filter('comment_class', 'add_class_comments');

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bones_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'bonestheme') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search the Site..." />
    <input type="submit" id="searchsubmit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
} // don't remove this bracket!

/****************** password protected post form *****/

add_filter( 'the_password_form', 'custom_password_form' );

function custom_password_form() {
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$o = '<div class="clearfix"><form action="' . get_option('siteurl') . '/wp-pass.php" method="post">
	' . __( "<p>This post is password protected. To view it please enter your password below:</p>" ) . '
	<div class="row collapse">
        <div class="twelve columns"><label for="' . $label . '">' . __( "Password:" ) . ' </label></div>
        <div class="eight columns">
            <input name="post_password" id="' . $label . '" type="password" size="20" class="input-text" />
        </div>
        <div class="four columns">
            <input type="submit" name="Submit" class="postfix button nice blue radius" value="' . esc_attr__( "Submit" ) . '" />
        </div>
	</div>
    </form></div>
	';
	return $o;
}

// Disable jump in 'read more' link
function remove_more_jump_link($link) {
	$offset = strpos($link, '#more-');
	if ($offset) {
		$end = strpos($link, '"',$offset);
	}
	if ($end) {
		$link = substr_replace($link, '', $offset, $end-$offset);
	}
	return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

// Remove height/width attributes on images so they can be responsive
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

// change the standard class that wordpress puts on the active menu item in the nav bar
//Deletes all CSS classes and id's, except for those listed in the array below
function custom_wp_nav_menu($var) {
        return is_array($var) ? array_intersect($var, array(
                //List of allowed menu classes
                'current_page_item',
                'current_page_parent',
                'current_page_ancestor',
                'first',
                'last',
                'vertical',
                'horizontal'
                )
        ) : '';
}
add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
add_filter('page_css_class', 'custom_wp_nav_menu');
 
//Replaces "current-menu-item" with "active"
function current_to_active($text){
        $replace = array(
                //List of menu item classes that should be changed to "active"
                'current_page_item' => 'active',
                'current_page_parent' => 'active',
                'current_page_ancestor' => 'active',
        );
        $text = str_replace(array_keys($replace), $replace, $text);
                return $text;
        }
add_filter ('wp_nav_menu','current_to_active');
 
//Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
add_filter ('wp_nav_menu','strip_empty_classes');

// Add the Meta Box to the homepage template
function add_homepage_meta_box() {  
    add_meta_box(  
        'homepage_meta_box', // $id  
        'Custom Fields', // $title  
        'show_homepage_meta_box', // $callback  
        'page', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_homepage_meta_box');

// Field Array  
$prefix = 'custom_';  
$custom_meta_fields = array(  
    array(  
        'label'=> 'Homepage tagline area',  
        'desc'  => 'Displayed underneath page title. Only used on homepage template. HTML can be used.',  
        'id'    => $prefix.'tagline',  
        'type'  => 'textarea' 
    )  
);  

// The Homepage Meta Box Callback  
function show_homepage_meta_box() {  
global $custom_meta_fields, $post;  
// Use nonce for verification  
echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
  
    // Begin the field table and loop  
    echo '<table class="form-table">';  
    foreach ($custom_meta_fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);  
        // begin a table row with  
        echo '<tr> 
                <th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
                <td>';  
                switch($field['type']) {  
                    // text  
                    case 'text':  
                        echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="60" /> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break;
                    
                    // textarea  
                    case 'textarea':  
                        echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="80" rows="4">'.$meta.'</textarea> 
                            <br /><span class="description">'.$field['desc'].'</span>';  
                    break;  
                } //end switch  
        echo '</td></tr>';  
    } // end foreach  
    echo '</table>'; // end table  
}  

// Save the Data  
function save_homepage_meta($post_id) {  
    global $custom_meta_fields;  
  
    // verify nonce  
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))  
        return $post_id;  
    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;  
    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($custom_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach  
}  
add_action('save_post', 'save_homepage_meta');  


// CUSTOM
    function issues_metabox(){
        global $post;
        $featured_description = get_post_meta( $post->ID, 'featured_description', true);
        $issue_number = get_post_meta( $post->ID, 'issue_number', true);
    ?>
        <p>
            <label for="featured_description">Featured Image Description: <br />
                <textarea id="featured_description" name="featured_description" cols="45" rows="4"><?php if( $featured_description ) { echo $featured_description; } ?></textarea>
            </label>
        </p>
        <p>
            <label for="issue_number">Issue/Article Number: <br />
                <textarea id="issue_number" name="issue_number" cols="45" rows="4"><?php if( $issue_number ) { echo $issue_number; } ?></textarea>
            </label>
        </p>

 <?php
    }
    
    function save_issues_metabox( ) {
        global $post;

        if( $_POST ) {
            update_post_meta( $post->ID, 'featured_description', $_POST['featured_description'] );
            update_post_meta( $post->ID, 'issue_number', $_POST['issue_number'] );
        }
    }

    function add_custom_metabox(){
        add_meta_box( 'custom-metabox', __( 'Issues Meta' ), 'issues_metabox', 'issue', 'normal', 'high' );
    }

    add_action( 'admin-init', 'add_custom_metabox' );
    add_action( 'save_post', 'save_issues_metabox' );

/* Add a Sponsors URL Field to the Custom Post Type "Sponsor" */
    function sponsor_metabox(){
        global $post;
        $sponsor_url = get_post_meta( $post->ID, 'sponsor_url', true);
    ?>
        <p>
            <label for="sponsor_url">Sponsors URL<br /></label>
                <input type="text" id="sponsor_url" name="sponsor_url" style="width: 300px;" value="<?php if( $sponsor_url ) { echo $sponsor_url; } ?>">
        </p>
 <?php
    }
    
    function save_sponsor_metabox( ) {
        global $post;

        if( $_POST ) {
            update_post_meta( $post->ID, 'sponsor_url', $_POST['sponsor_url'] );
        }
    }

    function add_sponsor_custom_metabox(){
        add_meta_box( 'custom-sponsor-metabox', __( 'Sponsors Meta' ), 'sponsor_metabox', 'sponsor', 'normal', 'high' );
    }

    add_action( 'admin-init', 'add_sponsor_custom_metabox' );
    add_action( 'save_post', 'save_sponsor_metabox' );

/***********************/    
    function get_featured_image_description() {
        global $post;
        $img_description = get_post_meta( $post->ID, 'featured_description', true );

        if ( isset( $img_description ) && $img_description !== '' ){
            return $img_description;
        }else {
            return the_title();
        }
    }

    function get_shop_excerpt() {
        return substr( get_the_excerpt(), 0, strrpos( substr( get_the_excerpt(), 0, 160), ' ' ) );
    }


    function is_subpage() {
        global $post;
        
        if( $post->post_parent ){
            return $post->post_parent;
        }else{
            return false;
        }
    }

    function get_issue_subpages_template($original_template){
        global $post;
        $article_template = TEMPLATEPATH . '/single-article.php';
        $gallery_template = TEMPLATEPATH . '/single-article-gallery.php';
        $video_template = TEMPLATEPATH . '/single-article-video.php';
        
        
        if( $post->post_type == 'issue' && is_subpage() && has_post_format('gallery') ){
            return $gallery_template;                        
        }else if( $post->post_type == 'issue' && is_subpage() && has_post_format('video') ){
            return $video_template;                        
        }else if( $post->post_type == 'issue' && is_subpage() ) {
            return $article_template;                        
        }
        
        return $original_template;
    }
    add_action('single_template', 'get_issue_subpages_template', 1);

    function get_article_icon() {
        echo '<img class="article-icon" src="<?php echo get_template_directory_uri(); ?>/images/article-icon.png" alt="article" />';
    }
    
    /**
     * RSS FEED CUSTOMIZATIONS
     * http://icodesnippet.com/search/pre_get_posts/
     */

    /** Adding in custom post type 'issue' (articles are children of this) **/
    // function myfeed_request($qv) {
    //     if (isset($qv['feed']))
    //         $qv['post_type'] = 'issue';
    //     return $qv;
    // }
    // add_filter('request', 'myfeed_request');

    function rss_add_cpt($query){
        if ($query->is_feed){
            $query->set('post_type', 'issue');
            return $query;
        }
        return $query;
    }
    add_filter('pre_get_posts', 'rss_add_cpt');

    function rss_published_only($query) {
        if ($query->is_feed) {
            $query->set('post_status','publish');
        }
        return $query;
        }
    add_filter('pre_get_posts','rss_published_only');

    function rss_add_featured_image( $content ){
        if(get_the_post_thumbnail()){
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'wpf-featured');
            $image_html = '<img src="' . $image[0]. '" width="' . $image[1] . '" height="' . $image[2] . '">';
            $content = $image_html . $content;
            return $content;
        } else {
            return $content;
        }
    }
    add_filter('the_content_feed', 'rss_add_featured_image');

 ?>
