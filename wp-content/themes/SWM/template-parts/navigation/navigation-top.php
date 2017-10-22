<?php
/**
 * Displays top navigation
 *
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'tufts' ); ?>">
	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
		'after'          => '<i></i>'
	) ); ?>
</nav><!-- #site-navigation -->
