<?php
/**
 * Template Name: Multi Sections
 *
 * A custom page template for displaying multiple full width sections.
 *
 */

get_header(); // Loads the header.php template. ?>

	<main <?php hybrid_attr( 'content' ); ?>>
	 
		<?php if ( have_posts() ) : // Checks if any posts were found. ?>

			<?php while ( have_posts() ) : // Begins the loop through found posts. ?>

				<?php the_post(); // Loads the post data. ?>
				
					<?php the_content(); ?>
				
			<?php endwhile; // End found posts loop. ?>

			<?php locate_template( array( 'misc/loop-nav.php' ), true ); // Loads the misc/loop-nav.php template. ?>

		<?php else : // If no posts were found. ?>

			<?php locate_template( array( 'content/error.php' ), true ); // Loads the content/error.php template. ?>

		<?php endif; // End check for posts. ?> 

	</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>