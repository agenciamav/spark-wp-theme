<div class="footer">
    <section class="about-feature clearfix">
        <div class="container-fluid">

            <div class="row">
                <div class="block col-md-8 col-sm-12 fadeInDown animated">
                    <div class="row">
                        <div class="col-md-6 col-sm-8 col-xs-12">
                            <h3 class="hero text-uppercase">Conheça nossas soluções</h3>
                        </div>
                        <div class="col-md-3 col-sm-2 col-xs-6">
                            <ul>
                                <!-- <li><h4><strong class="text-uppercase">Produtos</strong></h4></li> -->

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
                        <div class="col-md-3 col-sm-2 col-xs-6">
                            <ul>
                                <!-- <li><h4><strong class="text-uppercase">Produtos</strong></h4></li> -->

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
                                    <li><a href="<?php the_permalink() ?>" title="Ver serivço <?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
                                    <?php
                                  endwhile;
                                }
                                wp_reset_query();  // Restore global post data stomped by the_post().
                                ?>
                            </ul>
                        </div>
                    </div>              
                    
                </div>
                <div class="block bg-dark col-md-4 fadeInDown animated hidden-sm hidden-xs">                      
                   <h2 class="">Desenvolvemos projetos de consultoria e soluções logísticas sob medida (???)</h2>                        
                   <a href="#" class="btn btn-lined">Saiba mais</a>

               </div>                    
            </div>            

       </div>

       <div class="container">
           <div id="footer">
                
                <div class="row">
                    <div class="col-md-12">
                        <small>
                            <img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/logo.png" alt="" class="pull-left footer-logo">
                            Rua Antônio Peruzzo, 250. Bairro Sagrada Família<br/>
                             Nova Prata - RS. CEP 95320-000 <br>
                             <a href="mailto:comercial@sparkag.com.br">comercial@sparkag.com.br</a>
                        </small>
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 hidden-sm">
                        <p class="copyright">                            
                            © <span><?php echo date('Y'); ?></span>. <a href="<?php echo bloginfo('url'); ?>">Spark</a> - 
                            Soluções inovadoras em intralogística. Todos os direitos reservados.</p>
                    </div>
                    <div class="col-md-4">
                        <!-- Social Media -->
                        <ul class="social">
                            <li>
                                <a href="">
                                    <span class="ion-android-call"></span>
                                    +55 54 3242-4507
                                </a>
                            </li>
                            <li>
                                <a href="http://wwww.fb.com/Spark" class="Facebook">
                                    <i class="ion-social-facebook"></i>
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
            
            </div>
       </div>

   </section>    
</div>

    <!-- Template Javascript Files
    ================================================== -->
    <!-- modernizr js -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- jquery -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.min.js"></script>
    <!-- owl carouserl js -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/owl.carousel.min.js"></script>
    <!-- bootstrap js -->

    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
    <!-- wow js -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/wow.min.js"></script>
    <!-- slider js -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/slider.js"></script>
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.fancybox.js"></script>
    <!-- template main js -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/main.js"></script>

    <!-- SPARK DEPENDENCIES SCRIPTS -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/zoom_assets/jquery.smoothZoom.min.js"></script>
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/jquery.scrollify.min.js"></script>

    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/owl.carousel.js"></script>

    <!-- SPARK SCRIPTS -->
    <script src="<?php echo bloginfo('stylesheet_directory'); ?>/js/scripts.js"></script>

    <?php wp_footer();?>
    
</body>
</html>