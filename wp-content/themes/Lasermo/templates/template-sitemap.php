<?php
/**
 * Template Name: Sitemap
 *
 * A custom page template for displaying blog archives.
 *
 */

get_header(); // Loads the header.php template. ?>

<main <?php hybrid_attr( 'content' ); ?>>

	<h3><?php _e( 'Pages', 'swt' ); ?></h3>
	<ul>
		<?php wp_list_pages("title_li=" ); ?>
	</ul>	 

	<h3><?php _e( 'Categories', 'swt' ); ?></h3>
	<ul>
		<?php wp_list_categories('sort_column=name&optioncount=1&hierarchical=0&title_li='); ?>
	</ul>

	<h3><?php _e( 'Monthly Archive', 'swt' ); ?></h3>
	<ul>
		<?php wp_get_archives('type=monthly&show_post_count=true'); ?>
	</ul>

	<h3><?php _e( 'Authors', 'swt' ); ?></h3>
	<ul>
		<?php wp_list_authors( 'show_fullname=1&optioncount=1&orderby=post_count&order=DESC' ); ?>
	</ul>

	<h3><?php _e( 'All blog posts', 'swt' ); ?></h3>
	<ul>
		<?php $archive_query = new WP_Query('showposts=1000');
		while ($archive_query->have_posts()) : $archive_query->the_post(); ?>
		<li>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>			
		</li>
		<?php endwhile; ?>
	</ul>

</main><!-- #content -->

<?php get_footer(); // Loads the footer.php template. ?>