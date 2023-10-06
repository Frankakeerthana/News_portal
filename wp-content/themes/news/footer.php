<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package News
 */

?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory');?>/css/footer.css">
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="footer-text">Copyright © 2023 Ushodaya Enterprises Pvt. Ltd., All Rights Reserved.</div>
			<!-- <a href="<?php //echo esc_url( __( 'https://wordpress.org/', 'news' ) ); 
							?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				//printf( esc_html__( 'Proudly powered by %s', 'news' ), 'WordPress' );
				?>
			</a> -->
			<!-- <span class="sep"> | </span> -->
			<?php
			/* translators: 1: Theme name, 2: Theme author. */
			//printf( esc_html__( 'Theme: %1$s by %2$s.', 'news' ), 'news', '<a href="http://underscores.me/">Underscores.me</a>' );
			?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->

<?php //wp_footer(); 
?>

</body>

</html>