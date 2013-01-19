<?php
/*
Plugin Name: Localmag Stories
Plugin URI: http://localmag.us
Description: Plugin for writing local stories
Version: 0.0.1
Author: Mike Frederick
Author URI: http://localmag.us
License: GPLv2
*/

define( 'LOCAL_BASENAME', plugin_basename( __FILE__ ) );
define( 'LOCAL_DIR', dirname( __FILE__ ) );
define( 'LOCAL_FOLDER', str_replace( basename( __FILE__), '', plugin_basename( __FILE__ ) ) );
define( 'LOCAL_URL', plugin_dir_url(__FILE__ ) );
define( 'LOCAL_VERSION', '0.0.1' );


require_once( LOCAL_DIR . '/includes/setup.php' );
if (is_admin () ) {
    require_once( LOCAL_DIR . '/includes/admin.php' );
}

require_once( LOCAL_DIR . '/includes/functions.php' );

// Add hooks at the end
require_once( LOCAL_DIR . '/includes/hooks.php' );

?>
