<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage sanpau
 * @since sanpau 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
			
	    <meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	    <meta name="robots" content="index,follow">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/normalize.css" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/foundation.min.css" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<!--[if lt IE 9]>
			<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->
<?php
		/* We add some JavaScript to pages with the comment form
		 * to support sites with threaded comments (when in use).
		 */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* Always have wp_head() just before the closing </head>
		 * tag of your theme, or you will break many plugins, which
		 * generally use this hook to add elements to <head> such
		 * as styles, scripts, and meta tags.
		 */
		wp_head();
?>
	</head>
	<body <?php body_class(); ?>>
	
		<div class="clearfix" id="page">
				
			<header id="masthead" role="banner">
			
				<div id="header-main">
					<div class="row">					
						<?php global $sanpau_options;
					$sanpau_settings = get_option( 'sanpau_options', $sanpau_options ); ?>
					
						<div id="site-title">
						
						<?php if( $sanpau_settings['custom_logo'] ) : ?>
							<h1><a href="<?php echo bloginfo('url'); ?>" class="logo"><img src="<?php echo $sanpau_settings['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" /> </a></h1>
						<?php  else : ?>
							<h1><a href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
							<?php endif; ?>
					  
							<h2><?php bloginfo( 'description' ); ?></h2>
						</div>
						
						<nav id="access" role="navigation" class="clearfix">
							<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'sanpau' ); ?></a>
							<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
							</nav><!-- #access -->
					</div>
				</div>
	
			</header>

			<div id="main" role="main">
			 	<div id="main-inner">	
				 	<div id="box-contact" class="reveal-modal medium" data-reveal>
					</div>
			