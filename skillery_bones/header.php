<?php
/**
 * The Header for our theme // based on work done for Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;
    
        wp_title( '|', true, 'right' );
    
        // Add the blog name.
        bloginfo( 'name' );
    
        // Add the blog description for the home/front page.
        $site_description = get_bloginfo( 'description', 'display' );
        if ( $site_description && ( is_home() || is_front_page() ) )
            echo " | $site_description";
    
        // Add a page number if necessary:
        if ( $paged >= 2 || $page >= 2 )
            echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );
    
        ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/scripts/scripts.js"></script>
    <?php wp_head(); ?>
</head>
<body>
<div id="sky">
<div id="clouds">
<?php if ( !is_user_logged_in() ) : ?>
<div id="wrapper">
	<header style="padding-top:12px;">
		<a href="<?=home_url('/');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" id="logo" /></a>
	</header>
<?php else : ?>
<div id="top_nav">
	<header class="auth">
		<a href="<?php echo wp_logout_url(get_bloginfo('home')); ?>" class="logout">Logout</a>
		<a href="<?=home_url('/');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo_small.png" id="logo" /></a>
	</header>
</div>
<div id="wrapper">
<?php endif; ?>
	<div id="main">