<article <?php hybrid_attr( 'post' ); ?>>

	<?php if ( is_singular( get_post_type() ) ) : // If viewing a single post. ?>
	
		<header class="entry-header">

			<?php the_title( '<h1 ' . hybrid_get_attr( 'entry-title' ) . '>', '</h1>' ); ?>			
			
			<div class="entry-byline">
				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php _e( 'By ', 'swt' ); the_author_posts_link(); ?></span>
				<?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', 'Off' ); ?>
				<?php edit_post_link(); ?>
			</div><!-- .entry-byline -->				
			
		</header><!-- .entry-header -->

		<div <?php hybrid_attr( 'entry-content' ); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages(); ?>
		</div><!-- .entry-content -->
	
		<footer class="entry-footer">					
			<?php hybrid_post_terms( array( 'taxonomy' => 'category', 'text' => __( 'Posted in %s', 'swt' ) ) ); ?>
			<?php hybrid_post_terms( array( 'taxonomy' => 'post_tag', 'text' => __( 'Tagged %s', 'swt' ) ) ); ?>	
		</footer><!-- .entry-footer -->
							
	<?php else : // If not viewing a single post. ?>
	
		<?php get_the_image( array( 'size' => 'swt-post-image', 'order' => array( 'featured', 'attachment' ) ) ); ?>		
		<header class="entry-header">
		
			<?php the_title( '<h2 ' . hybrid_get_attr( 'entry-title' ) . '><a href="' . get_permalink() . '" rel="bookmark" itemprop="url">', '</a></h2>' ); ?>			
			
			<div class="entry-byline">
				<time <?php hybrid_attr( 'entry-published' ); ?>><?php echo get_the_date(); ?></time>
				<span <?php hybrid_attr( 'entry-author' ); ?>><?php _e( 'By ', 'swt' ); the_author_posts_link(); ?></span>
				<?php comments_popup_link( number_format_i18n( 0 ), number_format_i18n( 1 ), '%', 'comments-link', 'Off' ); ?>
				<?php edit_post_link(); ?>
			</div><!-- .entry-byline -->			
			
		</header><!-- .entry-header -->
			
		<div <?php hybrid_attr( 'entry-summary' ); ?>>			
			<?php the_excerpt(''); ?>			
		</div><!-- .entry-summary -->
		
		<footer class="entry-footer">					
			<a class="more-link" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'swt' ); ?></a>	
 		</footer><!-- .entry-footer -->
		
	<?php endif; // End single post check. ?>

</article><!-- .entry -->