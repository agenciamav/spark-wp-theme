<?php

// SEM BARRA SUPERIOR
add_filter('show_admin_bar', '__return_false');

// IMAGEM DESTACADA
add_theme_support('post-thumbnails');

/**
 * Filter the excerpt "read more" string.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
	if ( is_front_page() ) {	
    	return '...   <a href="'. get_the_permalink() .'" class="">continue lendo <span class="ion-ios-arrow-right"></span></a>';
    }else{
    	return $more;
    }
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
