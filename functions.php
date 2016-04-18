<?php
/**
 *  CUSTOM POST TYPE PRODUCT
 *  https://generatewp.com/post-type/?edit=Ma7KWx8
 */
if ( ! function_exists('spark_product_post_type') ) {

// Register Custom Post Type
function spark_product_post_type() {

    $labels = array(
        'name'                  => _x( 'Produtos', 'Post Type General Name', 'spark' ),
        'singular_name'         => _x( 'Produto', 'Post Type Singular Name', 'spark' ),
        'menu_name'             => __( 'Produtos', 'spark' ),
        'name_admin_bar'        => __( 'Produtos', 'spark' ),
        'archives'              => __( 'Produtos', 'spark' ),
        'parent_item_colon'     => __( 'Parent Item:', 'spark' ),
        'all_items'             => __( 'Todos produtos', 'spark' ),
        'add_new_item'          => __( 'Adicionar produto', 'spark' ),
        'add_new'               => __( 'Adicionar novo', 'spark' ),
        'new_item'              => __( 'Novo produto', 'spark' ),
        'edit_item'             => __( 'Editar produto', 'spark' ),
        'update_item'           => __( 'Atualizar produto', 'spark' ),
        'view_item'             => __( 'Ver produto', 'spark' ),
        'search_items'          => __( 'Buscar produto', 'spark' ),
        'not_found'             => __( 'Nada encontrado', 'spark' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'spark' ),
        'featured_image'        => __( 'Featured Image', 'spark' ),
        'set_featured_image'    => __( 'Set featured image', 'spark' ),
        'remove_featured_image' => __( 'Remove featured image', 'spark' ),
        'use_featured_image'    => __( 'Use as featured image', 'spark' ),
        'insert_into_item'      => __( 'Insert into item', 'spark' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'spark' ),
        'items_list'            => __( 'Items list', 'spark' ),
        'items_list_navigation' => __( 'Items list navigation', 'spark' ),
        'filter_items_list'     => __( 'Filter items list', 'spark' ),
    );
    $rewrite = array(
        'slug'                  => 'produtos',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Produto', 'spark' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', ),
        'taxonomies'            => array( 'product_category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-tag',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'product', $args );

}
add_action( 'init', 'spark_product_post_type', 0 );

}

/**
 *  META BOXES FOR PRODUCTS
 */
add_filter( 'rwmb_meta_boxes', 'spark_product_meta_boxes' );
function spark_product_meta_boxes( $meta_boxes ) {
    
    $prefix = 'spark_';

    $section = 'section2_';
    $meta_boxes[] = array(
        'title'      => __( 'Seção 2', 'spark' ),
        'post_types' => 'product',

        'fields'     => 
        array(        
                // WYSIWYG/RICH TEXT EDITOR
                array(
                    // 'name'    => __( 'Conteúdo', 'spark' ),
                    'id'      => $prefix.$section."wysiwyg",
                    'type'    => 'wysiwyg',
                    // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                    'raw'     => false,
                    'std'     => __( '', 'spark' ),
                    // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                    'options' => array(
                        'textarea_rows' => 10,
                        'teeny'         => false,
                        'media_buttons' => true,
                    ),
                ),
                // DIVIDER
                array(
                    'type' => 'divider',
                ),
                // COLOR
                array(
                    'name' => __( 'Cor de fundo', 'spark' ),
                    'id'   => $prefix.$section."bgcolor",
                    'type' => 'color',
                ),
                array(
                    'id'               => $prefix.$section.'bgimage',
                    'name'             => __( 'Imagem de fundo', 'spark' ),
                    'type'             => 'file_advanced',
                    // Delete image from Media Library when remove it from post meta?
                    // Note: it might affect other posts if you use same image for multiple posts
                    'force_delete'     => false,
                    // Maximum image uploads
                    'max_file_uploads' => 1,
                ),

                                        
            ),
    ); 

    $section = 'section_downloads_';
    $meta_boxes[] = array(
        'title'      => __( 'Seção Dowloads', 'spark' ),
        'post_types' => 'product',

        'fields'     => array(           
            // WYSIWYG/RICH TEXT EDITOR
            array(
                // 'name'    => __( 'Conteúdo', 'spark' ),
                'id'      => $prefix.$section."wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => __( '', 'spark' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 10,
                    'media_buttons' => true,
                ),
            ),
            //FILES
            // array(
            //     'name' => __( 'Arquivos', 'spark' ),
            //     'id'   => $prefix.$section."files",
            //     'type' => 'file',
            //     'clone' => true,
            // ),
            array(
                'id'          => $prefix.$section."files",
                'name' => __( 'Arquivos', 'spark' ),                                
                'type'             => 'file_advanced',
                // 'max_file_uploads' => 4,
                // 'mime_type'        => 'application,audio,video,image,', // Leave blank for all file types                           
            ),
            // DIVIDER
            array(
                'type' => 'divider',
            ),
            // COLOR
            array(
                'name' => __( 'Cor de fundo', 'spark' ),
                'id'   => $prefix.$section."bgcolor",
                'type' => 'color',
            ),
            array(
                'id'               => $prefix.$section.'bgimage',
                'name'             => __( 'Imagem de fundo', 'spark' ),
                'type'             => 'file_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),

                                    
        ),  
    );  

    $section = 'section3_';
    $meta_boxes[] = array(
        'title'      => __( 'Seção 3', 'spark' ),
        'post_types' => 'product',

        'fields'     => array(           
            // WYSIWYG/RICH TEXT EDITOR
            array(
                // 'name'    => __( 'Conteúdo', 'spark' ),
                'id'      => $prefix.$section."wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => __( '', 'spark' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 10,
                    'teeny'         => false,
                    'media_buttons' => true,
                ),
            ),
            // DIVIDER
            array(
                'type' => 'divider',
            ),
            // COLOR
            array(
                'name' => __( 'Cor de fundo', 'spark' ),
                'id'   => $prefix.$section."bgcolor",
                'type' => 'color',
            ),
            array(
                'id'               => $prefix.$section.'bgimage',
                'name'             => __( 'Imagem de fundo', 'spark' ),
                'type'             => 'file_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),

                                    
        ),  
    );   


    $section = 'section4_';
    $meta_boxes[] = array(
        'title'      => __( 'Seção Adicional', 'spark' ),
        'post_types' => 'product',

        'fields'     => array(           
            // WYSIWYG/RICH TEXT EDITOR
            array(
                // 'name'    => __( 'Conteúdo', 'spark' ),
                'id'      => $prefix.$section."wysiwyg",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => __( '', 'spark' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 10,
                    'teeny'         => false,
                    'media_buttons' => true,
                ),
            ),
            // DIVIDER
            array(
                'type' => 'divider',
            ),
            // COLOR
            array(
                'name' => __( 'Cor de fundo', 'spark' ),
                'id'   => $prefix.$section."bgcolor",
                'type' => 'color',
            ),
            array(
                'id'               => $prefix.$section.'bgimage',
                'name'             => __( 'Imagem de fundo', 'spark' ),
                'type'             => 'file_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
            ),

                                    
        ),  
    );   


    $section = 'section_gallery_';
    $meta_boxes[] = array(
        'title'      => __( 'Imagens', 'spark' ),
        'post_types' => 'product',

        'fields'     => array(           
            // WYSIWYG/RICH TEXT EDITOR
            array(
                'name'    => __( 'Título', 'spark' ),
                'id'      => $prefix.$section."title",
                'type'    => 'text',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => __( '', 'spark' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 10,
                    'teeny'         => false,
                    'media_buttons' => true,
                ),
            ),
            array(
                'id'               => $prefix.$section.'images',
                'name'             => __( 'Imagens', 'spark' ),
                'type'             => 'image_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 10,
            ),                                    
        ),  
    );   


   
    $section = 'warehouse_config_';
    $meta_boxes[] = array(
        'title'      => __( 'Exibição no Warehouse', 'spark' ),
        'post_types' => 'product',

        'fields'     => array(           
            // WYSIWYG/RICH TEXT EDITOR
            array(
                'name'    => __( 'Exibir', 'spark' ),
                'id'      => $prefix.$section."show",
                'type'    => 'checkbox',      
                'desc' => __( 'Exibir Infobox no Warehouse, e adicionar produto no menu de produtos', 'spark' ),
            ),
            // WYSIWYG/RICH TEXT EDITOR
            array(
                'name'    => __( 'Texto da infobox', 'spark' ),
                'id'      => $prefix.$section."text",
                'type'    => 'wysiwyg',
                // Set the 'raw' parameter to TRUE to prevent data being passed through wpautop() on save
                'raw'     => false,
                'std'     => __( '', 'spark' ),
                // Editor settings, see wp_editor() function: look4wp.com/wp_editor
                'options' => array(
                    'textarea_rows' => 10,
                    'teeny'         => false,
                    'media_buttons' => true,
                ),
            ),                     
            array(
                'id'               => $prefix.$section.'infobox_position_x',
                'name'             => __( 'Posição X da infobox', 'spark' ),
                'type'             => 'number',
                'desc' => __( 'Posição horizontal em pixels', 'spark' ),
            ),
            array(
                'id'               => $prefix.$section.'infobox_position_y',
                'name'             => __( 'Posição Y da infobox', 'spark' ),
                'type'             => 'number',
                'desc' => __( 'Posição vertical em pixels', 'spark' ),
            ),
            array(
                'name'             => __( 'Exibir no Zoom', 'spark' ),
                'id'               => $prefix.$section.'infobox_show_at_zoom',
                'desc' => __( 'Somente exibe a infobox quando o zoom for maior que o valor infomado.', 'spark' ),
                'type'       => 'slider',
                            
                // jQuery UI slider options. See here http://api.jqueryui.com/slider/
                'js_options' => array(
                    'min'  => 10,
                    'max'  => 90,
                    'step' => 5,
                    // 'value' => 85,
                ),
                'std' => 85,                
            ),
            
            // DIVIDER
            array(
                'type' => 'divider',
            ),
            array(
                'id'               => $prefix.$section.'icon',
                'name'             => __( 'Ícone do produto', 'spark' ),
                'type'             => 'file_advanced',
                // Delete image from Media Library when remove it from post meta?
                // Note: it might affect other posts if you use same image for multiple posts
                'force_delete'     => false,
                // Maximum image uploads
                'max_file_uploads' => 1,
                'desc'  => __( 'Ícone do menu de produtos', 'spark' ),
            ),
            array(
                'id'               => $prefix.$section.'focus_x',
                'name'             => __( 'Posição horizontal da câmera', 'spark' ),
                'type'             => 'number',
                // 'desc' => __( 'Posição horizontal da câmera', 'spark' ),
            ),
            array(
                'id'               => $prefix.$section.'focus_y',
                'name'             => __( 'Posição vertical da câmera', 'spark' ),
                'type'             => 'number',
                // 'desc' => __( 'Posição vertical da câmera', 'spark' ),
            ),
            // SLIDER
            array(
                'name'             => __( 'Zoom', 'spark' ),
                'id'               => $prefix.$section.'focus_zoom',
                'type'       => 'slider',
                            
                // jQuery UI slider options. See here http://api.jqueryui.com/slider/
                'js_options' => array(
                    'min'  => 0,
                    'max'  => 100,
                    'step' => 5,
                ),

                'std' => 90, 
            ),
                                    
        ),  
    );


    $prefix = 'spark_';


    $section = 'cta_';
    // $post_types = get_post_types();

    $meta_boxes[] = array(
        'title'  => __( 'Chamada para ação', 'spark' ),
        'post_types' => ['post', 'page', 'product', 'service'],
        'fields' => array(
            array(
                'name'        => __( 'CTA', 'spark' ),
                'id'          => $prefix.$section."post",
                'type'        => 'post',
                'desc'        => __( 'Bloco de chamada para ação exibido no final do conteúdo da página', 'spark' ),
                // 'clone'       => true,
                // 'multiple'    => true,
                // Post type: string (for single post type) or array (for multiple post types)
                'post_type'   => array( 'cta' ),
                // Default selected value (post ID)
                'std'         => 1,
                // Field type, either 'select' or 'select_advanced' (default)
                'field_type'  => 'select_advanced',
                // Placeholder
                'placeholder' => __( 'Seleciona um item', 'spark' ),
                // Query arguments (optional). No settings means get all published posts
                // @see https://codex.wordpress.org/Class_Reference/WP_Query
                'query_args'  => array(
                    'post_status'    => 'publish',
                    'posts_per_page' => - 1,
                )
            ),
        )
    );
    

    return $meta_boxes;
}




/**
 *  CUSTOM POST TYPE SERVICE
 *  https://generatewp.com/post-type/?edit=7QJjp6k
 */
if ( ! function_exists('spark_service_post_type') ) {

// Register Custom Post Type
function spark_service_post_type() {

    $labels = array(
        'name'                  => _x( 'Serviços', 'Post Type General Name', 'spark' ),
        'singular_name'         => _x( 'Serviço', 'Post Type Singular Name', 'spark' ),
        'menu_name'             => __( 'Serviços', 'spark' ),
        'name_admin_bar'        => __( 'Post Type', 'spark' ),
        'archives'              => __( 'Item Archives', 'spark' ),
        'parent_item_colon'     => __( 'Parent Item:', 'spark' ),
        'all_items'             => __( 'All Items', 'spark' ),
        'add_new_item'          => __( 'Add New Item', 'spark' ),
        'add_new'               => __( 'Add New', 'spark' ),
        'new_item'              => __( 'New Item', 'spark' ),
        'edit_item'             => __( 'Edit Item', 'spark' ),
        'update_item'           => __( 'Update Item', 'spark' ),
        'view_item'             => __( 'View Item', 'spark' ),
        'search_items'          => __( 'Search Item', 'spark' ),
        'not_found'             => __( 'Not found', 'spark' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'spark' ),
        'featured_image'        => __( 'Featured Image', 'spark' ),
        'set_featured_image'    => __( 'Set featured image', 'spark' ),
        'remove_featured_image' => __( 'Remove featured image', 'spark' ),
        'use_featured_image'    => __( 'Use as featured image', 'spark' ),
        'insert_into_item'      => __( 'Insert into item', 'spark' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'spark' ),
        'items_list'            => __( 'Items list', 'spark' ),
        'items_list_navigation' => __( 'Items list navigation', 'spark' ),
        'filter_items_list'     => __( 'Filter items list', 'spark' ),
    );
    $rewrite = array(
        'slug'                  => 'servicos',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'Serviço', 'spark' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,       
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'page',
    );
    register_post_type( 'service', $args );    

}
add_action( 'init', 'spark_service_post_type', 0 );

}

if ( ! function_exists('spark_cta_post_type') ) {

// Register Custom Post Type
function spark_cta_post_type() {

    $labels = array(
        'name'                  => _x( 'CTAs', 'Post Type General Name', 'spark' ),
        'singular_name'         => _x( 'CTA', 'Post Type Singular Name', 'spark' ),
        'menu_name'             => __( 'Chamadas para Ação', 'spark' ),
        'name_admin_bar'        => __( 'CTA', 'spark' ),
        'archives'              => __( '', 'spark' ),
        'parent_item_colon'     => __( 'Parent Item:', 'spark' ),
        'all_items'             => __( 'Todas CTAs', 'spark' ),
        'add_new_item'          => __( 'Adicionar CTA', 'spark' ),
        'add_new'               => __( 'Adicionar nova', 'spark' ),
        'new_item'              => __( 'Nova CTA', 'spark' ),
        'edit_item'             => __( 'Editar CTA', 'spark' ),
        'update_item'           => __( 'Atualizar CTA', 'spark' ),
        'view_item'             => __( 'Ver CTA', 'spark' ),
        'search_items'          => __( 'Buscar CTA', 'spark' ),
        'not_found'             => __( 'Nada encontrado', 'spark' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'spark' ),
        'featured_image'        => __( 'Featured Image', 'spark' ),
        'set_featured_image'    => __( 'Set featured image', 'spark' ),
        'remove_featured_image' => __( 'Remove featured image', 'spark' ),
        'use_featured_image'    => __( 'Use as featured image', 'spark' ),
        'insert_into_item'      => __( 'Insert into item', 'spark' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'spark' ),
        'items_list'            => __( 'Items list', 'spark' ),
        'items_list_navigation' => __( 'Items list navigation', 'spark' ),
        'filter_items_list'     => __( 'Filter items list', 'spark' ),
    );
    $rewrite = array(
        'slug'                  => 'cta',
        'with_front'            => true,
        'pages'                 => true,
        'feeds'                 => true,
    );
    $args = array(
        'label'                 => __( 'CTA', 'spark' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'comments', 'revisions', 'page-attributes', ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-carrot',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,       
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => $rewrite,
        'capability_type'       => 'post',
    );
    register_post_type( 'cta', $args );

}
add_action( 'init', 'spark_cta_post_type', 0 );

}

// add_filter( 'rwmb_meta_boxes', 'spark_cta_meta_boxes' );
// function spark_cta_meta_boxes( $meta_boxes )
// {
//     $prefix = 'spark_';


//     $section = 'cta_';
//     // $post_types = get_post_types();

//     $meta_boxes[] = array(
//         'title'  => __( 'Chamada para ação', 'spark' ),
//         'post_types' => ['post', 'page', 'product', 'service'],
//         'fields' => array(
//             array(
//                 'name'        => __( 'CTA', 'spark' ),
//                 'id'          => $prefix.$section."post",
//                 'type'        => 'post',
//                 'desc'        => __( 'Bloco de chamada para ação exibido no final do conteúdo da página', 'spark' ),
//                 // 'clone'       => true,
//                 // 'multiple'    => true,
//                 // Post type: string (for single post type) or array (for multiple post types)
//                 'post_type'   => array( 'cta' ),
//                 // Default selected value (post ID)
//                 'std'         => 1,
//                 // Field type, either 'select' or 'select_advanced' (default)
//                 'field_type'  => 'select_advanced',
//                 // Placeholder
//                 'placeholder' => __( 'Seleciona um item', 'spark' ),
//                 // Query arguments (optional). No settings means get all published posts
//                 // @see https://codex.wordpress.org/Class_Reference/WP_Query
//                 'query_args'  => array(
//                     'post_status'    => 'publish',
//                     'posts_per_page' => - 1,
//                 )
//             ),
//         )
//     );
//     return $meta_boxes;
// }




// IMAGE SIZES
add_image_size( 'medium-wide', 360, 240, true );
add_image_size( 'large-wide', 720, 480, true );



// /**
//  * THEME OPTIONS
//  */
// add_filter('tr_theme_options_page', function() {
//     return get_template_directory() . '/theme-options.php';
// });


// BARRA SUPERIOR
// add_filter('show_admin_bar', '__return_false');

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




/**
 *  OPTIONS PAGE
 */

require_once( 'titan-framework-checker.php' );

add_action( 'tf_create_options', 'mytheme_create_options' );
function mytheme_create_options() {
    // We create all our options here
    $titan = TitanFramework::getInstance( 'spark' );

    $section = $titan->createThemeCustomizerSection( array(
        'name' => __( 'Footer Colors', 'spark' ),
    ) );

    $section->createOption( array(
        'name' => __( 'Background Color', 'spark' ),
        'id' => 'footer_bg',
        'type' => 'color',
        'default' => '#222222',
        'css' => 'footer { background: value }',
    ) );

}

// add_action( 'admin_menu', 'spark_add_admin_menu' );
// add_action( 'admin_init', 'spark_settings_init' );


function spark_add_admin_menu(  ) { 

    add_options_page( 'Spark', 'Spark', 'manage_options', 'spark', 'spark_options_page' );

}


function spark_settings_init(  ) { 

    register_setting( 'pluginPage', 'spark_settings' );

    add_settings_section(
        'spark_pluginPage_section', 
        __( 'Your section description', 'spark' ), 
        'spark_settings_section_callback', 
        'pluginPage'
        );

    add_settings_field( 
        'spark_text_field_0', 
        __( 'Settings field description', 'spark' ), 
        'spark_text_field_0_render', 
        'pluginPage', 
        'spark_pluginPage_section' 
        );

    add_settings_field( 
        'spark_checkbox_field_1', 
        __( 'Settings field description', 'spark' ), 
        'spark_checkbox_field_1_render', 
        'pluginPage', 
        'spark_pluginPage_section' 
        );

    add_settings_field( 
        'spark_textarea_field_2', 
        __( 'Settings field description', 'spark' ), 
        'spark_textarea_field_2_render', 
        'pluginPage', 
        'spark_pluginPage_section' 
        );

    add_settings_field( 
        'spark_select_field_3', 
        __( 'Settings field description', 'spark' ), 
        'spark_select_field_3_render', 
        'pluginPage', 
        'spark_pluginPage_section' 
        );


}


function spark_text_field_0_render(  ) { 

    $options = get_option( 'spark_settings' );
    ?>
    <input type='text' name='spark_settings[spark_text_field_0]' value='<?php echo $options['spark_text_field_0']; ?>'>
    <?php

}


function spark_checkbox_field_1_render(  ) { 

    $options = get_option( 'spark_settings' );
    ?>
    <input type='checkbox' name='spark_settings[spark_checkbox_field_1]' <?php checked( $options['spark_checkbox_field_1'], 1 ); ?> value='1'>
    <?php

}


function spark_textarea_field_2_render(  ) { 

    $options = get_option( 'spark_settings' );
    ?>
    <textarea cols='40' rows='5' name='spark_settings[spark_textarea_field_2]'> 
        <?php echo $options['spark_textarea_field_2']; ?>
    </textarea>
    <?php

}


function spark_select_field_3_render(  ) { 

    $options = get_option( 'spark_settings' );
    ?>
    <select name='spark_settings[spark_select_field_3]'>
        <option value='1' <?php selected( $options['spark_select_field_3'], 1 ); ?>>Option 1</option>
        <option value='2' <?php selected( $options['spark_select_field_3'], 2 ); ?>>Option 2</option>
    </select>

    <?php

}


function spark_settings_section_callback(  ) { 

    echo __( 'This section description', 'spark' );

}


function spark_options_page(  ) { 

    ?>
    <form action='options.php' method='post'>

        <h2>Spark</h2>
        
        <?php
        settings_fields( 'pluginPage' );
        do_settings_sections( 'pluginPage' );
        submit_button();
        ?>
        
    </form>
    <?php

}


function getSize($file){
    $bytes = filesize($file);
    $s = array('b', 'Kb', 'Mb', 'Gb');
    $e = floor(log($bytes)/log(1024));
    return sprintf('%.2f '.$s[$e], ($bytes/pow(1024, floor($e))));
}


add_filter('posts_orderby','my_sort_custom',10,2);
function my_sort_custom( $orderby, $query ){
    global $wpdb;

    if(!is_admin() && is_search())
        $orderby =  $wpdb->prefix."posts.post_type DESC, {$wpdb->prefix}posts.post_date DESC";

    return  $orderby;
}