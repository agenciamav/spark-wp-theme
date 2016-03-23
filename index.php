<?php
/**
 * Template Name: Modelo Home
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header();?>

<?php require 'warehouse-2.php';?>

<section class="text-center slogan">
	<span class="">SOLUÇÕES INOVADORAS EM<br><strong>INTRALOGÍSTICA</strong></span>
</section>

<!-- FEATURES -->
<section id="feature" class="works">
	<div class="container">
		<div class="section-heading">
			<!-- <h1 class="title wow fadeInDown" data-wow-delay=".3s">Lorem ipsum dolor sit amet</h1> -->
			<p class="wow fadeInDown" data-wow-delay=".5s">
				A logística interna bem estruturada reflete em redução de custos, redução de desperdício de materiais, melhor ocupação dos espaços dentro da empresa, flexibilidade operacional, objetividade nas operações, maior produtividade de seus funcionários e, consequentemente, agilidade nos processos da cadeia de suprimentos desde seu início, que começa no recebimento da mercadoria produzida, até a sua entrega ao cliente final.
			</p>
			<h4 class="wow fadeInDown" data-wow-delay=".6s">
				Entenda como a Spark pode lhe ajudar:
			</h4>
		</div>
		<div class="row">
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
					<div class="media-left">
						<div class="icon">
							<i class="ion-ios-chatboxes-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Atendimento e Suporte</h4></a>
						<p>Fale diretamente com nossa equipe de suporte, pré-venda ou solicite uma consultoria.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
					<div class="media-left">
						<div class="icon">
							<i class="ion-ios-book-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Documentação Online</h4></a>
						<p>Obtenha acesso à todo material necessário, documentações e downloads.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
					<div class="media-left">
						<div class="icon">
							<i class="ion-ios-paper-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Informação</h4></a>
						<p>Assuntos atualizados do seu interesse em nosso blog e diretamente no seu e-mail.</p>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="2100ms">
					<div class="media-left">
						<div class="icon">
							<i class="ion-ios-cart-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Conheça os Produtos</h4></a>
						<p>Texto texto texto texto texto texto texto texto texto texto texto texto texto.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="2400ms">
					<div class="media-left">
						<div class="icon">
							<i class="ion-ios-briefcase-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Conheça os Serviços</h4></a>
						<p>Texto texto texto texto texto texto texto texto texto texto texto texto texto.</p>
					</div>
				</div>
			</div>
			<div class="col-md-4 col-lg-4 col-xs-12">
				<div class="media wow fadeInUp animated" data-wow-duration="3000ms" data-wow-delay="2700ms">
					<div class="media-left">
						<div class="icon">
							<!-- <img src="http://dev.sparkag.com.br/wp-content/themes/spark-wp-theme/images/spark.png" alt=""> -->
							<i class="ion-ios-star-outline"></i>
						</div>
					</div>
					<div class="media-body">
						<a href="#"><h4 class="media-heading">Conheça a Spark</h4></a>
						<p>Texto texto texto texto texto texto texto texto texto texto texto texto texto.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> <!-- /#feature -->

<section id="home-news">

	<div class="container">
		<div class="row">
			<div class="col-md-9">

				<?php if (have_posts()) {

					while (have_posts()) {
						the_post();
						?>

						<?php if (has_post_thumbnail()){ ?>
						<article id="post-<?php the_ID()?>" class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
							<div class="row">
								<div class="col-md-4">
									<div class="blog-post-image">
										<a href="<?php the_permalink();?>">
											
												<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
											
										</a>
									</div>									
								</div>
								<div class="col-md-8">
									<div class="blog-content">
										<h2 class="blogpost-title">
											<a href="<?php the_permalink();?>"><?php the_title();?></a>
										</h2>
										<div class="blog-meta">
											<span class="text-capitalize"><?php the_time('l, d \d\e F \d\e Y');?></span>
											<span class="text-capitalize">por <?php the_author_posts_link();?></span>
											<span class="text-capitalize"><?php the_category(', ');?></span>
										</div>
										<?php the_excerpt();?>										
									</div>
								</div>
							</div>
						</article>
						<?php }else{ ?>
						<article id="post-<?php the_ID()?>" class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">				
						
							<div class="blog-content">
								<h2 class="blogpost-title">
									<a href="<?php the_permalink();?>"><?php the_title();?></a>
								</h2>
								<div class="blog-meta">
									<span class="text-capitalize"><?php the_time('l, d \d\e F \d\e Y');?></span>
									<span class="text-capitalize">por <?php the_author_posts_link();?></span>
									<span class="text-capitalize"><?php the_category(', ');?></span>
								</div>
								<?php the_excerpt();?>										
							</div>
						
						</article>
						<?php } ?>						

						<?php } ?>
						<article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
							<div class="blog-content">
								<a href="/news" class="btn btn-dafault btn-details">Ver todas <span class="ion-ios-arrow-right"></span></a>
							</div>
						</article>
					<?php } else {?>

					<p><?php _e('Sorry, no posts matched your criteria.');?></p>

					<?php };?>

				</div>
				<div class="col-md-3">
					<div class="sidebar">						
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
								<h3 class="widget-head">Produtos</h3>
								<ul>
									<li>
										<a href="">WMS <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">CART <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">LIFT <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">AGV <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">RFID <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">DESK <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">GLASS <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">WATCH <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
									<li>
										<a href="">ARM <span class="badge"><span class="ion-ios-arrow-right"></span></span></a>
									</li>
								</ul>
							</div>							

						</div>
					</div>
				</div>
			</section>


<!--
==================================================
Call To Action Section Start
================================================== -->
<section id="call-to-action">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">PREPARADO PARA EXPANDIR O SEU NEGÓCIO?</h1>
						<p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Texto texto texto texto texto texto texto texto texto texto texto<br> texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto texto.</p>
						<a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Solicite contato</a> <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".8s" data-wow-duration="500ms">Fale com um Consultor</a>
					</div>
				</div>

			</div>
		</div>
	</section>

	<?php get_footer();?>