<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package append
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<title><?php wp_title(''); ?></title>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'append' ); ?></a>

	<header id="header" class="header fixed-top d-flex align-items-center">
		<div class="container-fluid d-flex align-items-center justify-content-between">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo d-flex align-items-center me-auto me-xl-0" rel="home"><img src="<?php echo get_template_directory_uri() . '/assets/img/logo.png'; ?>" alt="logo"> </a>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$append_description = get_bloginfo( 'description', 'display' );
			if ( $append_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $append_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .container -->

		<nav id="navmenu" class="navmenu">
			<i class="mobile-nav-toggle d-xl-none bi bi-list" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'append' ); ?></i>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
		<a class="btn-getstarted" href="index.html#about">Get Started</a>
	</header><!-- #masthead -->
	


</div>