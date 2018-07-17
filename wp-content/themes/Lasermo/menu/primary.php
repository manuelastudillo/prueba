<?php if ( has_nav_menu( 'primary' ) ) : // Check if there's a menu assigned to the 'primary' location. ?>

	<nav <?php hybrid_attr( 'menu', 'primary' ); ?>>
			
		<a id="toggle-primary-menu" href="#"></a>		
			
		<div class="wrap">
		
			<?php wp_nav_menu(
				array(
					'theme_location'  => 'primary',
					'container'       => '',
					'menu_id'         => 'menu-primary-items',
					'menu_class'      => 'menu-items',
					'fallback_cb'     => '',
					'items_wrap'      => '<ul id="%s" class="%s">%s</ul>'					
				)
			); ?>
			
			<?php swt_social_profiles(); ?>

		</div><!-- .wrap -->

	</nav><!-- #menu-primary -->

<?php endif; // End check for menu. ?>