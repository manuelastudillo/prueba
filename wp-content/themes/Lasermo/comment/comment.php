<li <?php hybrid_attr( 'comment' ); ?>>

	<article>				
		<header class="comment-meta">
			<?php echo get_avatar( $comment ); ?>
			<cite <?php hybrid_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<time <?php hybrid_attr( 'comment-published' ); ?>><?php comment_date(); ?> <?php comment_time();?></time> - 			
			<a <?php hybrid_attr( 'comment-permalink' ); ?>><?php _e( 'Permalink', 'swt' ); ?></a> 
			<?php hybrid_comment_reply_link(); ?>						
		</header><!-- .comment-meta -->

		<div <?php hybrid_attr( 'comment-content' ); ?>>
			<?php comment_text(); ?>
		</div><!-- .comment-content -->
	</article>

<?php /* No closing </li> is needed.  WordPress will know where to add it. */ ?>