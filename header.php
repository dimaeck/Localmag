<!doctype html>  
<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
		<title><?php wp_title('', true, 'right'); ?></title>
				
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- icons & favicons -->
		<!-- For iPhone 4 -->
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/h/apple-touch-icon.png">
		<!-- For iPad 1-->
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/m/apple-touch-icon.png">
		<!-- For iPhone 3G, iPod Touch and Android -->
		<link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon-precomposed.png">
		<!-- For Nokia -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/library/images/icons/l/apple-touch-icon.png">
		<!-- For everything else -->
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
                <script type="text/javascript" src="//use.typekit.net/ics1mgx.js"></script>
                <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
        <!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	</head>
	
    <body <?php body_class(); ?>>
        <div class="row container">
            <div class="twelve columns">
                <div class="row header-styles">
                    <div class="twelve columns">
                        <div class="row">
                                <?php
                                    $image_num = rand(1,6);
                                ?>
                                <a href="<?php echo site_url();?>">
                                   <img src="<?php echo (get_template_directory_uri() . "/header-images/0$image_num.png") ; ?>"/>
                                </a>
<!--                                <div class="siteinfo align-center">
                                    <h1><a class="brand" id="logo" href="<?php echo get_bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
                                    <hr />
                                    <h4 class="subhead"><?php echo get_bloginfo ( 'description' ); ?> </h4>
                                </div>-->
                        </div>
                        <div class="row">
                            <div id="nav" class="nav-wrapper mobile-hide">
                                <div class="row">
                                    <div class="offset-by-one three columns">
                                        <h5> 
                                            <a href="<?php echo get_bloginfo('url'); ?>"> Local Magazine </a>
                                        </h5>
                                    </div>
                                    <div class="eight columns">
                                                <?php bones_main_nav(); // Adjust using Menus in Wordpress Admin ?>                                                
                                    </div>
                                </div>
                            </div>
<!--                            <div id="nav-mobile" class="nav-wrapper-mobile">
                                <div class="row">
                                    <div class="mobile-relative mobile-four">
                                        <div class="show-for-small menu-action">
                                                    <a href="#sidebar" id="mobile-nav-button" class="sidebar-button small secondary button">
                                                                <svg xml:space="preserve" enable-background="new 0 0 48 48" viewBox="0 0 48 48" height="18px" width="18px" y="0px" x="0px" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" id="Layer_1" version="1.1">
                                                                        <line y2="8.907" x2="48" y1="8.907" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#C3C3C3" fill="none"/>
                                                                        <line y2="24.173" x2="48" y1="24.173" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#C3C3C3" fill="none"/>
                                                                        <line y2="39.439" x2="48" y1="39.439" x1="0" stroke-miterlimit="10" stroke-width="8" stroke="#C3C3C3" fill="none"/>
                                                                        Menu
                                                                </svg>
                                                    </a>
                                        </div>
                                        <?php bones_mobile_nav(); ?>
                                    </div>
                                </div>
                            </div>-->
                        </div>
                    </div>
                </div>