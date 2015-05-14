<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Dental_GS
 * @since Dental  1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0;">
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
            echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
    
        ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/jquery.fancybox.css" type="text/css" />
    
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
	
//	include ('includes/custom-style.php');
?>
</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
        <div class="topbar">
        	<div class="topbar_in">
				<?php dynamic_sidebar('top-header-phone'); ?>
            </div>
        </div>
        <div class="header">
        
        	<div class="hdr_top">
				<div class="top-left">
					<img id="logo" src="<?php echo get_option('custom_header');?>" alt="<?php bloginfo( 'name' ). ' ' .bloginfo( 'description' );?>" />
					<h1 id="site-title">
						<a class="logo" href="<?php if($_REQUEST['lang']=='es') echo site_url().'/?lang=es'; else echo site_url()+'/'; ?>"><?php bloginfo( 'name' );?></a>
					</h1>
					<div id="site-description"><?php bloginfo( 'description' );?></div>
				</div>
				<div class="right">
					<?php dynamic_sidebar('top-header-right'); ?>
                </div>
				<div class="clear"></div>
			</div>

			<div id="nav_button" class="nav_bot_show">
            	<h3>MENU</h3>
            </div>
           <div class="nav"><?php
                $defaults = array(
                    'menu'            => 'header', 
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                );
              
                wp_nav_menu( $defaults );
                ?>
                <div class="clear"></div>
            </div>
           
        </div>