<?php
/**
 * Template for displaying search form
 */
?>

<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" class="searchform" role="search">
	<div class="input-group">
		<input type="text" class="form-control" placeholder="<?php echo esc_attr_x( 'Procurar &hellip;', 'placeholder', 'spark' ); ?>" value="<?php echo get_search_query(); ?>" name="s">
		<span class="input-group-btn">
			<button class="btn btn-default" type="submit"> <i class="ion-ios-search"></i> </button>
		</span>
		<input type="hidden" name="posts_per_page" id="inputPosts_per_page" class="form-control" value="-1">
	</div><!-- /input-group -->
</form>