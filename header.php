<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Radio_Killer
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php
	global $isMobile;
	global $userAgent;
	$isMobile = wp_is_mobile();
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
?>
<script>
	var isMobile = <?php echo json_encode($isMobile); ?>;
	var userAgent = <?php echo json_encode($userAgent); ?>;
	var currLayout;
	var sbWidth;
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'radio-killer' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		
		<nav id="site-navigation" class="main-navigation navbar-default" role="navigation">
			<div id="main-navigation-container" class="container">
				<div class="navbar-header">
					<button class="navbar-toggle hamburger collapsed" type="button" data-toggle="modal" data-target="#mobile-menu-fs">
						<span class="hamburger-bar"></span>
					</button>
					<div class="navbar-brand">
						<?php 
						if ( get_header_image() ) : ?>
							<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php header_image(); ?>" alt="">
							</a>
						<?php else:	?>
							<h1 class="site-title">
								<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						<?php
						endif; // End header image check. ?>
					</div>
				</div>
				<div id="navbar-primary" class="collapse navbar-collapse">
				<?php
					
				wp_nav_menu(array(
					'menu'              => 'top_menu',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => false,
					'container_class'   => '',
					'container_id'      => '',
					'menu_class'        => 'nav navbar-nav navbar-right',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker()
					)
				);
				?>
				</div>
			</div><!-- .container -->
			
		</nav><!-- #site-navigation -->
		<nav class="back-to-top"></nav>
	</header><!-- #masthead -->
	
	<!-- FULLSCREEN MODAL CODE (.fullscreen) -->
	<div class="modal fade fullscreen" id="mobile-menu-fs"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div id="mobile-navigation-container" class="main-navigation">
			<div class="modal-header container">
				<div class="navbar-header">
					<button class="navbar-toggle hamburger collapsed" type="button" data-dismiss="modal" data-target="#mobile-menu-fs">
						<span class="hamburger-bar"></span>
					</button>
					<div class="navbar-brand">
						<?php 
						if ( get_header_image() ) : ?>
							<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<img src="<?php header_image(); ?>" alt="">
							</a>
						<?php else:	?>
							<h1 class="site-title">
								<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php bloginfo( 'name' ); ?>
								</a>
							</h1>
							<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) : ?>
								<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
							<?php
							endif; ?>
						<?php
						endif; // End header image check. ?>
					</div>
				</div>
			</div>
			<div class="modal-dialog">
				<nav id="navbar-mobile">
				<?php
				wp_nav_menu(array(
					'menu'              => 'top_menu',
					'theme_location'    => 'primary',
					'depth'             => 2,
					'container'         => false,
					'container_class'   => '',
					'container_id'      => '',
					'menu_id'			=> 'mobile-main-menu',
					'menu_class'        => 'nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wp_bootstrap_navwalker()
					)
				);
				?>
				</nav>
			</div><!-- /.modal-dialog -->
			
		</div> <!-- .container -->
		
	</div><!-- /.fullscreen -->
	
	<div id="content" class="site-content">
