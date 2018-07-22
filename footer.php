<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package labase
 */

?>
	</div><?php //  #content ?>
</section><?php //  #page ?>
<?php
wp_footer();
get_template_part( 'template-parts/content', 'menu' );
?>
<div class="overlay">
	<label for="site-toggler-navigation-closed" class="menu-toggler close">
		<em><?php esc_html_e( 'Fermer', 'labase' ); ?></em>
	</label>
</div>
<div id="responsive-stylesheet"></div>
</body>
</html>
