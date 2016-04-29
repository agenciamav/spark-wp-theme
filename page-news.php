<?php
/**
 * Template Name: Modelo News
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
                    <?php the_content();?>
                </div>
            </div>
        </div>
    </div>
</section><!--/#page-header-->


<?php }}?>

<section id="blog-full-width">

	<div class="container">
		<div class="row">
			<div class="col-md-8">
<?php $news = new WP_Query("post_type=post");?>
				<?php if ($news->have_posts()) {

	while ($news->have_posts()) {
		$news->the_post();
		?>
						<article id="post-<?php the_ID()?>" class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
						<?php if (has_post_thumbnail()) {?>
							<div class="blog-post-image">
								<a href="<?php the_permalink();?>">
										<?php // the_post_thumbnail();
			the_post_thumbnail('full', array('class' => 'img-responsive'));?>

								</a>
							</div>
					 	<?php }?>
							<div class="blog-content">
								<h2 class="blogpost-title">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h2>
								<div class="blog-meta">
									<span class="text-capitalize"><?php the_time('l, d \d\e F \d\e Y');?></span>
									<span class="text-capitalize">por <?php the_author_posts_link();?></span>
									<span class="text-capitalize"><?php the_category(', ');?></span>
								</div>
								<p><?php the_excerpt();?></p>
								<a href="<?php the_permalink();?>" class="btn btn-dafault btn-details">Continue lendo <span class="ion-ios-arrow-right"></span></a>
							</div>
						</article>


						<?php }
} else {?>

					<p><?php _e('Sorry, no posts matched your criteria.');?></p>

					<?php }
;?>

				</div>
				<div class="col-md-4">
					<div class="sidebar">
						<div class="search widget">
							<form action="" method="get" class="searchform" role="search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Pesquisar...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
									</span>
								</div><!-- /input-group -->
							</form>
						</div>
						<div class="author widget">
							<img class="img-responsive" src="http://dev.sparkag.com.br/wp-content/uploads/2016/03/720.jpg">
							<div class="author-body text-center">
								<div class="author-img">
									<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/spark.png">
								</div>
								<div class="author-bio">
									<!-- <h3>Spark</h3> -->
									<div class="office">
										<p><i class="fa fa-building"></i> Rua Antônio Peruzzo, nº 250.<br/>
											<i class="fa fa-map-marker"></i> Bairro Sagrada Família<br>
											Nova Prata – RS. CEP 95320-000</p>
											<h4><i class="fa fa-phone"></i>+55 54 3242-4507</h4>
											<p><i class="fa fa-envelope"></i> <a href="mailto:comercial@sparkag.com.br">comercial@sparkag.com.br</a></p>
										</div>
										<p>
										</p>
									</div>
								</div>
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

						</div>
					</div>
				</div>
			</section>

	<?php get_template_part('section', 'calltoaction' ); ?> 

<?php get_footer();?>