<?php
/**
 * Template Name: Modelo Arquivos
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header();?>
<?php if (have_posts()) {while (have_posts()) {the_post();?>
<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h1><?php the_title();?></h1>					
				</div>
			</div>
		</div>
	</div>
</section><!--/#page-header-->


<?php }}?>

<section id="blog-full-width">

	<div class="container">
		<div class="row">
			<div class="col-md-12"><?php the_content();?><br>&nbsp;</div>
		</div>
	</div>



	<div class="container">
		<div class="row">

			<div class="col-md-3">
				<div class="sidebar">
					<div class="search widget">
						<form action="" method="get" class="searchform" role="search">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
								</span>
							</div><!-- /input-group -->
						</form>
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




					<div id="accordion">
						<div>


							<?php 
							$posts = 'attachment';
							$terms = $taxonomy_name;

							$tax_terms = get_terms( $terms, 'orderby=name');
							foreach ( $tax_terms as $term ) { ?>
							<h3>
								<a data-toggle="collapse" data-parent="#accordion" href="#arquivos_<?php echo $term->slug ?>"><?php echo $term->name ?> <span class="badge"><?php echo $term->count ?></a>
							</h3>

							<div id="arquivos_<?php echo $term->slug ?>" class="collapse in">
								<div>
									<table class="table">	                            		
										<tbody>

											<?php $args = array(
												'posts_per_page' => -1,
												$terms => $term->slug,
												'post_type' => $posts,
												);
												$tax_terms_posts = get_posts( $args ); ?>
												<?php foreach ( $tax_terms_posts as $file ) { ?>

												<tr>
													<td><?php echo $file->post_title; ?></td>													
													<td class="text-right"><small class="text-right text-muted"><?php echo size_format( filesize( get_attached_file( $file->ID ) ) ); ?></small> &nbsp; <a href="<?php echo $file->guid ?>" target="_new" class="btn btn-default btn-xs" ><i class="ion-ios-cloud-download-outline"></i> Download</a></td>
												</tr>										

												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<?php }
								wp_reset_postdata();
								?>


							</div>
						</div>										
					</section>



					<?php if(rwmb_meta( 'spark_cta_post')){ ?>
	<!--
	==================================================
	Call To Action Section Start
	================================================== -->
	<section id="call-to-action">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<?php

						$cta = get_post( rwmb_meta( 'spark_cta_post') ); 
						if( $cta ) {
							$title      = $cta->post_title;
							$content    = $cta->post_content;                                
							?>

							<h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="300ms"><?php echo $title; ?></h2>
							<?php echo $content; ?>

							<?php  } ?> 								
						</div>
					</div>

				</div>
			</div>
		</section>
		<?php  } ?>

		<?php get_footer();?>