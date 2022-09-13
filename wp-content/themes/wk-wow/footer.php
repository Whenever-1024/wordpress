<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WK_Wow
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- #content -->
    <?php get_template_part( 'footer-widget' ); ?>
	<footer id="colophon" class="site-footer <?php echo wk_wow_bg_class(); ?>" role="contentinfo">
		<div class="container pt-3 pb-3">
            <div class="site-info">
                &copy; <?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/date */
								_x( 'Y', 'copyright date format', 'wk-wow' )
							);
							?>
                <span class="sep"> | </span> 

                		<a href="<?php echo esc_url( __( 'https://web-komp.eu/theme/wow/', 'wk-wow' ) ); ?>">
								<?php _e( 'Theme Wow by WebKomp', 'wk-wow' ); ?>
							</a>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->

<a href="#" class=" btn-light btn-lg topbutton" role="button"><i class="fas fa-chevron-up"></i></a>

<?php wp_footer(); ?>
</body>
</html>