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
			<div class="col-md-12">
				<div class="page-header">					
				  	<h1>News <small>Últimas notícias do blog</small>
				  		<a href="/news" class="btn btn-warning btn-sm pull-right">Ver todas <span class="ion-ios-arrow-right"></span></a>
				  	</h1>
				</div>
				<!-- 
				<h1 cla ss="page-title">News <small>Últimas notícias do blog</small></h1>-->
			</div>
		</div>
		<div class="row">

				<?php if (have_posts()) {

					while (have_posts()) {
						the_post();
						?>
						
						<div class="col-md-3">

							<?php if (has_post_thumbnail()){ ?>
								<article id="post-<?php the_ID()?>" class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
									
										<div class="blog-post-image">
											<a href="<?php the_permalink();?>">
												<?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
											</a>
										</div>									
									
										<div class="blog-content">
											<h2 class="blogpost-title">
												<a href="<?php the_permalink();?>"><?php the_title();?></a>
											</h2>
											<div class="blog-meta">
												<span class="text-uppercase"><?php the_time('l, d \d\e F'); ?></span>
												<!-- <span class="text-capitalize">por <?php the_author_posts_link();?></span>
												<span class="text-capitalize"><?php the_category(', ');?></span> -->
											</div>
											<?php the_excerpt();?>										
										</div>
									
								</article>
								<?php }else{ ?>
								<article id="post-<?php the_ID()?>" class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">	

									<div class="blog-post-image">
										<a href="<?php the_permalink();?>">
											<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/placeholder.png" alt="" class="img-responsive" />
										</a>
									</div>				
								
									<div class="blog-content">
										<h2 class="blogpost-title">
											<a href="<?php the_permalink();?>"><?php the_title();?></a>
										</h2>
										<div class="blog-meta">
											<!-- <span class="text-capitalize"><?php the_time('l, d \d\e F \d\e Y');?></span>
											<span class="text-capitalize">por <?php the_author_posts_link();?></span>
											<span class="text-capitalize"><?php the_category(', ');?></span> -->
											<span class="text-uppercase"><?php the_time('l, d \d\e F'); ?></span>
										</div>
										<?php the_excerpt();?>										
									</div>
								
								</article>
							<?php } ?>

							</div>						
									

							<?php } ?>
							<!-- <div class="col-md-3">
								<article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">
									<div class="blog-content">
										<a href="/news" class="btn btn-dafault btn-details">Ver todas <span class="ion-ios-arrow-right"></span></a>
									</div>
								</article>
							</div> -->
						<?php } else {?>

						<p><?php _e('Sorry, no posts matched your criteria.');?></p>
						
						<?php };?>



				
			</section>


<section class="newsletter bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				 <h2 class="">Mantenha-se informado com notícias do blog diretamente em seu e-mail</h2>
			</div>
			<div class="col-md-8">
				<form action="" method="POST" class="" role="form">
					<div class="form-group">
						<p class="form-control-static">Assine nossa newsletter. Informe abaixo o seu e-mail e clique assinar. <br>Fique tranquilo, nós também odiamos <i>spam</i></p>
						<br>
						<div class="input-group input-group-lg">
							<input type="text" class="form-control input-lg" placeholder="Search for...">
							<span class="input-group-btn">
								<button class="btn btn-default btn-lg" type="button"> Assinar! </button>
							</span>
						</div><!-- /input-group -->					
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<section class="about-feature clearfix">
    <div class="container-fluid">
        <div class="row">
            <div class="block col-md-8 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay=".3s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.3s; animation-name: fadeInDown;">
                <div class="col-md-8">
        			<h3 class="hero text-uppercase">Conheça nossas soluções</h3>
        		</div>
               	<div class="col-md-2">
        			<ul>
        				<!-- <li><h4><strong class="text-uppercase">Produtos</strong></h4></li> -->
        				<li><a href="#">WMS</a></li>
        				<li><a href="#">AGV</a></li>
        				<li><a href="#">CART</a></li>
        				<li><a href="#">WATCH</a></li>                				
        				<li><a href="#">WMS</a></li>                				
        				<li><a href="#">GLASS</a></li>                				
        				<li><a href="#">RFID</a></li>                				
        			</ul>
        		</div>
        		<div class="col-md-2">
        			<ul>
        				<!-- <li><h4><strong class="text-uppercase">Serviços</strong></h4></li> -->
        				<li><a href="#">Implementação</a></li>
        				<li><a href="#">Consultoria</a></li>
        				<li><a href="#">Desenvolvimento</a></li>
        				<li><a href="#">Suporte</a></li>                				
        			</ul>
        		</div>
            </div>
            <div class="block bg-dark col-md-4 wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay=".5s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.5s; animation-name: fadeInDown;">                    	
        		 <h2 class="">Desenvolvemos projetos de consultoria e soluções logísticas sob medida (???)</h2>                        
                <a href="#" class="btn btn-lined">Saiba mais</a>
        	                 
            </div>                    
        </div>
    </div>
</section>


	<?php get_footer();?>