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
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>    
    <div class="row full-width-header-here header-fill hide-on-print">
      <?php
        $image_num = rand(1,4);
      ?>
      <a href="<?php echo site_url();?>">
         <img src="<?php echo (get_template_directory_uri() . "/header-images/skinny/0$image_num.png") ; ?>" class="full-width-image" alt="Localmag"/>
      </a>
      <?php localmag_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div>
    <div class="row">
      <div class="twelve columns">
        <div class="row">
          <div class="twelve columns">