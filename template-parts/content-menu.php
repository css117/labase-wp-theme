
<nav class="site-navigation toggled">
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-1',
		'menu_id'        => '',
		'container'      => '',
		'menu_class'     => 'main-navigation',
	) );
	?>
	<?php
	wp_nav_menu( array(
		'theme_location' => 'menu-2',
		'menu_id'        => '',
		'container'      => '',
		'menu_class'     => 'social-links',
	) );
	?>
</nav>
<div class="button-nav">
	<?php echo get_hamburger(); ?>
	<label for="site-popin-toggler-closed" class="popin-toggler close">
		<em><?php esc_html_e( 'Retour', 'labase' ); ?></em>
	</label>
	<label for="site-navigation-toggler-closed" class="menu-toggler close">
		<em><?php esc_html_e( 'Fermer', 'labase' ); ?></em>
	</label>
	<label for="site-navigation-toggler-opened" class="menu-toggler open">
		<em><?php esc_html_e( 'Menu', 'labase' ); ?></em>
	</label>
</div>
