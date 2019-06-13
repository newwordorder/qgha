<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package New_theme
 */

?>

	</div><!-- #content -->

	<footer class="footer">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-4">
					<a href="<?php echo get_home_url(); ?>" id="" class="footer__logo mb-4">
						<img class="footer__logo" data-src="<?php bloginfo('template_directory'); ?>/img/logo--light.svg" alt="Logo">
					</a>
				</div>
</div>
				<div class="row justify-content-center">

				<div class="col-md-4 v-center">
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'footer-social',
							'container_class' => 'footer-social',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'fallback_cb'     => '',
							'menu_id'         => 'footer__social',
						)
					); ?>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 text-align-center">
					<p>&copy; <?php echo date("Y"); ?> Queensland Genomics</p>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-12 text-align-center">
					<a href="<?php echo get_home_url(); ?>/privacy-terms-of-use">Privacy & Terms of use</a> | <a href="http://newwordorder.com.au">Site by NWO</a>
				</div>
			</div>
	</footer>
	</div><!-- #page -->
	</div><!-- Scrollboy -->
<?php wp_footer(); ?>
<script>
amplitude.getInstance().logEvent('Loaded');</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/hammer.min.js" ></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main-min.js" ></script>

</body>
</html>
