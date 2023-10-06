<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/header.css">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php //wp_body_open(); ?>
	<header id="masthead" class="site-header container-class">
		<div class="site-branding">
			<img src="<?php echo get_template_directory_uri() .'/images/header-logo.png'; ?>" alt="site-logo">
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'news' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-2', // Display the Secondary menu
					'menu_id'        => 'secondary-menu',
				)
			);
			
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
<script type="text/javascript">
    var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
</script>
