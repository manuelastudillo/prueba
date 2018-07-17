<?php if ( is_home() || is_archive() || is_search() ) : // If viewing the blog, an archive, or search results. ?>

	<?php loop_pagination(
		array( 
			'prev_text' => _x( 'Prev', 'posts navigation', 'swt' ), 
			'next_text' => _x( 'Next',     'posts navigation', 'swt' )
		) 
	); ?>

<?php endif; // End check for type of page being viewed. ?>