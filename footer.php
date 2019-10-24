<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package River
 */

?>

<footer class="footer">
	<div class="footer__widet">
		<div class="footer__widet--item left">
			<!-- <p class="footer__widet--header">Follow me</p> -->
			<div class="footer__widet--item-sns">
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-facebook-f"></i></a>
				<a href=""><i class="fab fa-instagram"></i></a>
			</div>
		</div>
		<div class="footer__widet--item center">
			<div class="footer__widet--item-category">
				<?php dynamic_sidebar('Footer_widget_category'); ?>
			</div>
		</div>
		<div class="footer__widet--item right">
			<div class="footer__widet--item-tags">
				<?php dynamic_sidebar('Footer_widget_tags'); ?>
			</div>
		</div>
	</div>
	<div class="footer__copy">
		<p>&copy;2019 WordPress Theme River</p>
	</div>
</footer>
<?php wp_footer(); ?>
</body>

</html>