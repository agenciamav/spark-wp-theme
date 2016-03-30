<?php
/**
* Bootstrap the Theme Options Framework
*/
// if( file_exists(get_template_directory().'/options/options.php') )
// include_once(get_template_directory().'/options/options.php');


/**
* General Options
*/
// if( file_exists(get_template_directory().'/theme-options.php') )
// include_once(get_template_directory().'/theme-options.php');


/**
 * TYPEROCKET
 */
if( file_exists(get_template_directory().'/typerocket/init.php') )
include_once(get_template_directory().'/typerocket/init.php');

$products = tr_post_type('Produto', 'Produtos');
$services = tr_post_type('Serviço', 'Serviços');

/**
 * THEME OPTIONS
 */
add_filter('tr_theme_options_page', function() {
    return get_template_directory() . '/theme-options.php';
});


// BARRA SUPERIOR
add_filter('show_admin_bar', '__return_true');

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
