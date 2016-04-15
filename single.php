<?php get_header();?>
<?php
    // Start the loop.
    while ( have_posts() ){
        the_post(); ?>

         <!--
        ==================================================
        Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">                            
                            <?php the_title( '<h1>', '</h1>' ); ?>
                            <div class="portfolio-meta">
                                <span class="text-capitalize"><?php the_time('l, d \d\e F \d\e Y'); ?></span> | <span class="text-capitalize">por <?php the_author_posts_link(); ?></span> | <span class="text-capitalize"><?php the_category(', '); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section><!--/#Page header-->                     

            <section class="single-post">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <div class="post-img">
                                <?php the_post_thumbnail( 'full', array( 'class' => 'img-responsive' ) ); ?>
                            </div>
                        <?php }; ?>
                            <div class="post-content">
                                <?php
                                    the_content();

                                    wp_link_pages( array(
                                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                                        'after'       => '</div>',
                                        'link_before' => '<span>',
                                        'link_after'  => '</span>',
                                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                                        'separator'   => '<span class="screen-reader-text">, </span>',
                                    ) );
                                    
                                ?>
                            </div>
                            <ul class="social-share">
                                <h4>Compartlhe:</h4>
                                <li>
                                    <a href="#" class="Facebook">
                                        <i class="ion-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Twitter">
                                        <i class="ion-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Linkedin">
                                        <i class="ion-social-linkedin"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="Google Plus">
                                        <i class="ion-social-googleplus"></i>
                                    </a>
                                </li>
                                
                            </ul>
                            
                        </div>
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
                                        <h3 class="widget-head text-center">Categorias de News</h3>
                                            <ul>
                                                <?php
                                                    $args = array(
                                                      'orderby' => 'name',
                                                      'parent' => 0
                                                      );
                                                    $categories = get_categories( $args );
                                                    foreach ( $categories as $category ) { ?>
                                                        <li>
                                                            <a href="<?php echo get_category_link( $category->term_id ) ?>">
                                                                <?php echo $category->name ?> <span class="badge"><?php echo $category->count ?></span>
                                                            </a>
                                                        </li>
                                                    <?php }
                                                ?>
                                                                                    
                                        </ul>
                                    </div>
                                    
                                    <div class="recent-post widget">
                                        <h3>Notícias Recentes</h3>
                                        <ul>
                                            <li>
                                                <a href="#">Notícia Primeira</a><br>
                                                <time>14 de Março, 9:15</time>
                                            </li>
                                            <li>
                                                <a href="#">Notícia Segunda</a><br>
                                                <time>14 de Fevereiro, 10:17</time>
                                            </li>
                                            <li>
                                                <a href="#">Intralogística: investimento revertido em lucro</a><br>
                                                <time>14 de Março, 9:15</time>
                                            </li>
                                            <li>
                                                <a href="#">Lançamento do livro “Humano não é Recurso”</a><br>
                                                <time>25 de Maio, 8:15</time>
                                            </li>
                                            <li>
                                                <a href="#">Notícia com video do Youtube</a><br>
                                                <time>25 de Dezembro, 2015</time>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                        </div>
                    </div>
            </div>
        </section>
        
   <?php }; // End of the loop. ?>            
            
            <!--
            ==================================================
            Call To Action Section Start
            ================================================== -->
            <section id="call-to-action">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                                <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="300ms">INTERESSADO EM UMA CONSULTORIA SEM COMPROMISSO?</h1>
                                <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="300ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,</br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                                <a href="#" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="300ms">Solitite uma consultoria</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>

<?php get_footer();?>