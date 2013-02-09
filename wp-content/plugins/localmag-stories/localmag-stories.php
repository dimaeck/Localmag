<?php
/*
Plugin Name: Localmag Stories
Plugin URI: http://localmag.us
Description: Plugin for writing local stories
Version: 0.0.2
Author: Mike Frederick
Author URI: http://localmag.us
License: GPLv2
*/

define( 'LOCAL_VERSION', '0.0.2' );
define( 'LOCAL_BASENAME', plugin_basename( __FILE__ ) );
define( 'LOCAL_DIR', dirname( __FILE__ ) );
define( 'LOCAL_FOLDER', str_replace( basename( __FILE__), '', plugin_basename( __FILE__ ) ) );
define( 'LOCAL_URL', plugin_dir_url(__FILE__ ) );

// Activate plug-in
register_activation_hook( __FILE__, 'stories_activate' ); // Localmag/wp-content/plugins/localmag-stories/localmag-stories.php

require_once( LOCAL_DIR . '/includes/functions.php' );
require_once( LOCAL_DIR . '/includes/setup.php' );

if (is_admin () ) {
    require_once( LOCAL_DIR . '/includes/admin.php' );
}

require_once( LOCAL_DIR . '/includes/hooks.php' );


?>
