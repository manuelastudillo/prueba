<?php
/**
 * Search Form Template
 *
 * The search form template displays the search form.
 *
 */
?>
<div class="search">

	<form method="get" class="search-form" action="<?php echo trailingslashit( home_url() ); ?>">
	<div class="search-wrap">
		<input class="search-text" type="text" name="s" placeholder="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else esc_attr_e( 'Type Here', 'swt' ); ?>"  />
		<a class="search-button fa fa-search-plus"></a>
	</div>
	</form><!-- .search-form -->

</div><!-- .search -->