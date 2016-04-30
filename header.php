<!DOCTYPE html>
<html class="no-js">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="<?php echo bloginfo('stylesheet_directory'); ?>/images/favicon.png">
        <title>Spark</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/ionicons.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/animate.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css">
        <!-- FONTS -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/fonts/stylesheet.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/owl.carousel.css">
        <!-- <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/owl.theme.css"> -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/owl.theme.green.css">        
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/jquery.fancybox.css">
        
        <?php wp_head();?>

        <!-- wahrehouse css -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/warehouse.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/main.css">
        <!-- custum styles -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/style.css">        
        <!-- responsive css -->
        <link rel="stylesheet" href="<?php echo bloginfo('stylesheet_directory'); ?>/css/responsive.css">

    </head>

    <body <?php body_class();?>>
<!--
==================================================
Header Section Start
================================================== -->
<header id="top-bar" class="navbar-fixed-top animated-header">
    <div class="top-line hidden-xs">
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
                <span><i class="fa fa-calendar"></i><a href="#" target="_blank" style="color:#FFFFFF">Agende demonstração</a></span>
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
                <a href="<?php echo bloginfo('url'); ?>" >
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
                        <a href="<?php echo bloginfo('url'); ?>" >Início</a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo bloginfo('url'); ?>/produtos" class="dropdown-toggle" data-toggle="dropdown">Produtos <span class="caret"></span></a>
                        <div class="dropdown-menu">
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
                                    <li><a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                  endwhile;
                                }
                                wp_reset_query();  // Restore global post data stomped by the_post().
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo bloginfo('url'); ?>/servicos" class="dropdown-toggle" data-toggle="dropdown">Serviços <span class="caret"></span></a>
                        <div class="dropdown-menu">
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
                                    <li><a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                  endwhile;
                                }
                                wp_reset_query();  // Restore global post data stomped by the_post().
                                ?>
                            </ul>
                        </div>
                    </li>
                    <li><a href="<?php echo bloginfo('url'); ?>/a-spark">A SPARK</a></li>
                    <li><a href="<?php echo bloginfo('url'); ?>/news">News</a></li>
                    <li><a href="<?php echo bloginfo('url'); ?>/downloads">Downloads</a></li>
                    <li class="dropdown">
                        <a href="<?php echo bloginfo('url'); ?>/contato" class="dropdown-toggle" data-toggle="dropdown">Contatos <span class="caret"></span></a>
                        <div class="dropdown-menu">
                            <ul>
                                <li><a href="<?php echo bloginfo('url'); ?>/contato/solicitar-ligacao">Solicite uma ligação</a></li>
                                <li><a href="<?php echo bloginfo('url'); ?>/contato/solicitar-consultoria">Solicite uma consultoria</a></li>
                                <li><a href="<?php echo bloginfo('url'); ?>/contato/trabalhe-conosco">Trabalhe Conosco</a></li>
                                <li><a href="<?php echo bloginfo('url'); ?>/contato">Fale Conosco</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- /main nav -->
    </div>
</header>