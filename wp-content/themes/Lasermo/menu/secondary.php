<?php if ( has_nav_menu( 'secondary' ) ) : // Check if there's a menu assigned to the 'secondary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'secondary' ); ?>>

		<a id="toggle-secondary-menu" href="#"></a>	
		
		<div class="wrap">

		<?php wp_nav_menu(
			array(
				'theme_location'  => 'secondary',
				'container'       => '',
				'menu_id'         => 'menu-secondary-items',
				'menu_class'      => 'menu-items',
				'fallback_cb'     => '',
				'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'
			)
		); ?>
		
		<?php get_template_part( 'header', 'search' ); // Load header search ?>
		
		</div><!-- .wrap -->

	</nav><!-- #menu-secondary -->

<?php endif; // End check for menu. ?>