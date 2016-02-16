<?php get_header();?>
    <body <?php body_class();?>>
        <!--
        ==================================================
        Header Section Start
        ================================================== -->
        <header id="top-bar" class="navbar-fixed-top animated-header">
            <div class="top-line">
                <div class="container">
                    <p class="form-control-static input-sm pull-right social-icons">
                        <a target="_blank" class="facebook" href="http://www.facebook.com/sparkag"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" class="youtube" href="http://www.youtube.com/sparkag"><i class="fa fa-youtube"></i></a>
                        <a target="_blank" class="twitter" href="http://twitter.com/sparkag"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" class="google" href="#"><i class="fa fa-google-plus"></i></a>
                        <a target="_blank" class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                    </p>
                    <p>
                        <span class="fone"><i class="fa fa-phone"></i>Ligue +55 54 3242-4507</span>
                        <span class="fone"><i class="fa fa-phone"></i><a href="#" style="color:#FFFFFF">Solicite uma ligação</a></span>
                        <span><i class="fa fa-calendar"></i><a href="#" target="_blank" style="color:#FFFFFF">Solicite uma consultoria</a></span>
                        <span><i class="fa fa-envelope"></i><a href="mailto:comercial@sparkag.com.br" style="color:#FFFFFF">Escreva-nos</a></span>
                        <span><i class="fa fa-suitcase"></i><a href="#" target="_blank" style="color:#FFFFFF">Trabalhe Conosco</a></span>

                    </p>
                </div>
            </div>
            <div class="container">
                <div class="navbar-header">
                    <!-- responsive nav button -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <!-- /responsive nav button -->

                    <!-- logo -->
                    <div class="navbar-brand">
                        <a href="#" >
                            <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="">
                        </a>
                    </div>
                    <!-- /logo -->
                </div>
                <!-- main menu -->
                <nav class="collapse navbar-collapse navbar-right" role="navigation">
                    <div class="main-menu">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#" >Início</a>
                            </li>
                            <li><a href="#">A SPARK</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviços <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="#">Serviço 1</a></li>
                                        <li><a href="#">Serviço 2</a></li>
                                        <li><a href="#">Serviço 3</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produtos <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="#">WMS</a></li>
                                        <li><a href="#">CART</a></li>
                                        <li><a href="#">LIFT</a></li>
                                        <li><a href="#">AGV</a></li>
                                        <li><a href="#">RFID</a></li>
                                        <li><a href="#">DESK</a></li>
                                        <li><a href="#">GLASS</a></li>
                                        <li><a href="#">WATCH</a></li>
                                        <li><a href="#">ARM</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="#">Blog</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contatos <span class="caret"></span></a>
                                <div class="dropdown-menu">
                                    <ul>
                                        <li><a href="#">Solicite uma ligação</a></li>
                                        <li><a href="#">Solicite uma consultoria</a></li>
                                        <li><a href="#">Trabalhe Conosco</a></li>
                                        <li><a href="#">Fale Conosco</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- /main nav -->
            </div>
        </header>

        <?php require 'warehouse.php';?>

            <!--
            ==================================================
            Slider Section Start
            ================================================== -->
            <?php $recent = new WP_Query("page_id=6");while ($recent->have_posts()): $recent->the_post();?>
	            <section id="about">
	                <div class="container">
	                    <div class="row">
	                        <div class="col-md-6 col-sm-6">
	                            <div class="block wow fadeInLeft" data-wow-delay=".3s" data-wow-duration="500ms">
	                                <h2>
	                                <?php the_title();?>
	                                </h2>
	                                <?php the_content();?>
	                            </div>

	                        </div>
	                        <div class="col-md-6 col-sm-6">
	                            <div class="block wow fadeInRight" data-wow-delay=".3s" data-wow-duration="500ms">
	                            <?php
	if (has_post_thumbnail()) {
		the_post_thumbnail([494, 309]);
	} else {
		echo "<img src='" . bloginfo('stylesheet_directory') . "/images/about/about.jpg' alt=''/>";
	}
	?>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </section> <!-- /#about -->
	            <?php endwhile;?>
            <?php wp_reset_postdata();?>
            <!--
            ==================================================
            Portfolio Section Start
            ================================================== -->
            <section id="works" class="works">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Latest Works</h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus.
                        </p>
                    </div>
                    <div class="row">

                        <?php if (have_posts()) {

	while (have_posts()) {
		the_post();
		?>

	                        <div id="post-<?php the_ID()?>" class="col-sm-4 col-xs-12">
	                            <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
	                                <div class="img-wrapper">
	                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-1.jpg" class="img-responsive" alt="this is a title" >
	                                    <div class="overlay">
	                                        <div class="buttons">
	                                            <a rel="gallery" class="fancybox" href="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-1.jpg">Demo</a>
	                                            <a target="_blank" href="<?php the_permalink();?>">Details</a>
	                                        </div>
	                                    </div>
	                                </div>
	                                <figcaption>
	                                <h4>
	                                <a href="<?php the_permalink();?>">
	                                    <?php the_title();?>
	                                </a>
	                                </h4>
	                                <p>
	                                    <?php the_excerpt();?>
	                                </p>
	                                </figcaption>
	                            </figure>
	                        </div>

                    <?php }
} else {?>

                        <p><?php _e('Sorry, no posts matched your criteria.');?></p>

                        <?php }
;?>

                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="img-wrapper">
                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-2.jpg" class="img-responsive" alt="this is a title" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="images/portfolio/item-2.jpg">Demo</a>
                                            <a target="_blank" href="#">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                <h4>
                                <a href="#">
                                    Bottle Mockup
                                </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit.
                                </p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="img-wrapper">
                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-3.jpg" class="img-responsive" alt="" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="images/portfolio/item-3.jpg">Demo</a>
                                            <a target="_blank" href="#">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                <h4>
                                <a href="#">
                                    Table Design
                                </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor sit amet.
                                </p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="img-wrapper">
                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-4.jpg" class="img-responsive" alt="" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="images/portfolio/item-4.jpg">Demo</a>
                                            <a target="_blank" href="#">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                <h4>
                                <a href="#">
                                    Make Up elements
                                </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="900ms">
                                <div class="img-wrapper">
                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-5.jpg" class="img-responsive" alt="" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="images/portfolio/item-5.jpg">Demo</a>
                                            <a target="_blank" href="#">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                <h4>
                                <a href="#">
                                    Shoping Bag Concept
                                </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                                </figcaption>
                            </figure>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                                <div class="img-wrapper">
                                    <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/portfolio/item-6.jpg" class="img-responsive" alt="" >
                                    <div class="overlay">
                                        <div class="buttons">
                                            <a rel="gallery" class="fancybox" href="images/portfolio/item-6.jpg">Demo</a>
                                            <a target="_blank" href="#">Details</a>
                                        </div>
                                    </div>
                                </div>
                                <figcaption>
                                <h4>
                                <a href="#">
                                    Caramel Bottle
                                </a>
                                </h4>
                                <p>
                                    Lorem ipsum dolor.
                                </p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </div>
            </section> <!-- #works -->
            <!--
            ==================================================
            Portfolio Section Start
            ================================================== -->
            <section id="feature">
                <div class="container">
                    <div class="section-heading">
                        <h1 class="title wow fadeInDown" data-wow-delay=".3s">Lorem ipsum dolor sit amet</h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed,<br> quasi dolores numquam dolor vero ex, tempora commodi repellendus quod laborum.
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay="300ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-flask-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="600ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-lightbulb-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="900ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-lightbulb-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1200ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-americanfootball-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1500ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-keypad-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xs-12">
                            <div class="media wow fadeInDown animated" data-wow-duration="500ms" data-wow-delay="1800ms">
                                <div class="media-left">
                                    <div class="icon">
                                        <i class="ion-ios-barcode-outline"></i>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">Lorem ipsum dolor sit amet</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatum, sint.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> <!-- /#feature -->

            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                                <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Solicite contato</a> <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".8s" data-wow-duration="500ms">Fale com um Consultor</a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
            <!--
            ==================================================
            Footer Section Start
            ================================================== -->
            <footer id="footer">
                <div class="container">
                    <div class="col-md-8">
                        <p class="copyright">Copyright: <span><?php echo date('Y'); ?></span>. Design and Developed by <a href="http://www.sparkag.com.br">Spark</a></p>
                    </div>
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                            <li>
                                <a href="http://wwww.fb.com/Spark" class="Facebook">
                                    <i class="ion-social-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.twitter.com/Spark" class="Twitter">
                                    <i class="ion-social-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="Linkedin">
                                    <i class="ion-social-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/Spark" class="Google Plus">
                                    <i class="ion-social-googleplus"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </footer> <!-- /#footer -->

            <?php wp_footer();?>

<?php get_footer();?>