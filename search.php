<?php get_header();?>
<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<p><?php echo $wp_query->found_posts ?> Resultados para a pesquisa:</p>

					<h1><?php printf( __( '%s', 'twentysixteen' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
				</div>
			</div>
		</div>
	</div>
</section><!--/#page-header-->

<section id="blog-full-width">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="sidebar">
					<div class="search widget">
						<?php get_template_part('searchform'); ?>						
					</div>

					<div class="categories widget">
						<h3 class="widget-head text-center">Produtos</h3>
						<ul>
							<?php
							$type = 'product';
							$args=array(
								'post_type' => $type,
								'post_status' => 'publish',
								'posts_per_page' => -1                                  
								);
							$my_query = null;
							$my_query = new WP_Query($args);
							if( $my_query->have_posts() ) {
								while ($my_query->have_posts()) : $my_query->the_post(); ?>

								<li>
									<a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>"><?php the_title(); ?> <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
								</li>										

								<?php
								endwhile;
							}
		                    wp_reset_query();  // Restore global post data stomped by the_post().
		                    ?>									
		                </ul>
		            </div>

		            <div class="categories widget">
		            	<h3 class="widget-head text-center text-center">Serviços</h3>
		            	<ul>
		            		<?php
		            		$type = 'service';
		            		$args=array(
		            			'post_type' => $type,
		            			'post_status' => 'publish',
		            			'posts_per_page' => -1                                  
		            			);
		            		$my_query = null;
		            		$my_query = new WP_Query($args);
		            		if( $my_query->have_posts() ) {
		            			while ($my_query->have_posts()) : $my_query->the_post(); ?>

		            			<li>
		            				<a href="<?php the_permalink() ?>" title="Ver serviço <?php the_title_attribute(); ?>"><?php the_title(); ?> <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
		            			</li>										

		            			<?php
		            			endwhile;
		            		}
		                    wp_reset_query();  // Restore global post data stomped by the_post().
		                    ?>										
		                </ul>
		            </div>

		            <div class="categories widget">

		            	<?php $taxonomy_name = 'media_category'; ?>
		            	<?php $terms = get_terms( $taxonomy_name, array( 'hide_empty' => false, 'pad_counts' => true, 'hierarchical' => true ) ); ?>

		            	<h3 class="widget-head text-center">Categorias</h3>
		            	<ul>
		            		<?php foreach ($terms as $term) {
												// The $term is an object, so we don't need to specify the $taxonomy.
		            			$term_link = get_term_link( $term );

										    	// If there was an error, continue to the next term.
		            			if ( is_wp_error( $term_link ) ) {
		            				continue;
		            			}
		            			?>										 
		            			<li>
		            				<a href="<?php echo esc_url( $term_link ); ?>"><?php echo $term->name ?> <span class="badge"><?php echo $term->count ?></a>
		            			</li>
		            			<?php } ?>                                            
		            		</ul>
		            	</div>

		            </div>
		        </div>
		        <div class="col-md-9">

		        	<?php if ( have_posts() ) : ?>
						
						<ul>

		        		<?php	
		        		while ( have_posts() ) : the_post(); 
		        				$obj = get_post_type_object( get_post_type() ); ?>

							<li>

		        			<?php if( $obj->labels->name != @$posttype ){ ?>
								<h3><?php  echo $obj->labels->name; ?></h3>		        		
		        				<?php $posttype = $obj->labels->name; ?>
		        			<?php } ?>
								
								<p><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></p>

							</li>

			        	<?php endwhile; ?>

			        	</ul>
			
						<?php 
			        	the_posts_pagination( array(
			        		'prev_text'          => __( 'Voltar', 'twentysixteen' ),
			        		'next_text'          => __( 'Mais', 'twentysixteen' ),
			        		'before_page_number' => '<li class="meta-nav screen-reader-text">' . __( 'Página', 'twentysixteen' ) . ' </li>',
			        		) );

			        	endif;
		        	?>
        		
		        </div>
		    </div>
		</div>
	</section>
	<?php get_footer();?>