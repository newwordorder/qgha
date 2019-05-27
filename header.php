<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package 
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php get_template_part( 'meta' ); ?>
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://use.typekit.net/noo8jys.css">

	<?php get_template_part( 'analytics' ); ?>
	<script defer src="<?php echo get_template_directory_uri(); ?>/js/fa.js"></script> <!--load all styles -->

</head>
<body <?php body_class(); ?>>
<!-- ******************* The Navbar Area ******************* -->
<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>
<div class="header">
	<div id="header" class="header-top" >
		<div class="container header-container" >
			<div class="row">
				<div class="col-md-4">
					<a href="<?php echo get_home_url(); ?>" id="site-logo" class="header__logo">
						<img class="logo logo--light" data-src="<?php bloginfo('template_directory'); ?>/img/logo--light.svg" alt="Queensland Genomics">
						<img class="logo logo--dark" data-src="<?php bloginfo('template_directory'); ?>/img/logo--dark.svg" alt="Queensland Genomics">
					</a>
				</div>
				<a id="toggleMenu" class="toggle-menu">
					<span class="toggle-line"></span>
				</a>
				<div class="col-md-8">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'header-menu',
							'container_class' => 'header-nav header-nav__primary',
							'container_id'    => '',
							'menu_class'      => 'menu header__primary',
							'fallback_cb'     => '',
							'menu_id'         => 'header__primary',
						)
					); ?>
				</div>
			</div>
		</div><!-- .container -->
	</div><!-- #header -->
</div>

<div class="scrollboy">

<div id="content" class="page">
