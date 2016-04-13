<?php get_header();?>
<?php //if (have_posts()) { while (have_posts()) { the_post(); ?>
        <!-- 
        ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">
                            <h1><?php the_title() ?></h1>                            
                        </div>
                    </div>
                </div>
            </div>   
        </section><!--/#Page header-->


        <!-- 
        ================================================== 
            Service Page Section  Start
        ================================================== -->
        <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">         


                    <div class="col-md-6">
                        <div class="block">
                            <?php if (has_post_thumbnail()){ ?>
                                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>                                
                            <?php }else{ ?>
                                <img class="img-responsive" src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=1280&h=720" alt="" />
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block">
                            <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
                            
                            <?php the_content() ?>                            

                            <!-- <h1 class="text-center"><?php the_title() ?></h1>
                            <p class="subtitle-des wow fadeInUp animated" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis porro recusandae non quibusdam iure adipisci.</p>
                            <div class="row service-parts">
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="600ms">
                                        <i class="ion-ios-paper-outline"></i>
                                        <h4>BRANDING</h4>
                                        <p>Veritatis eligendi, dignissimos. Porta fermentum mus aute pulvinar earum minus platea massa feugiat rutrum urna facilisi ipsameum.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="800ms">
                                        <i class="ion-ios-pint-outline"></i>
                                        <h4>DESIGN</h4>
                                        <p>Veritatis eligendi, dignissimos. Porta fermentum mus aute pulvinar earum minus platea massa feugiat rutrum urna facilisi ipsameum.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="1s">
                                        <i class="ion-ios-paper-outline"></i>
                                        <h4>DEVELOPMENT</h4>
                                        <p>Veritatis eligendi, dignissimos. Porta fermentum mus aute pulvinar earum minus platea massa feugiat rutrum urna facilisi ipsameum.</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block wow fadeInUp animated" data-wow-duration="400ms" data-wow-delay="1.1s">
                                        <i class="ion-ios-paper-outline"></i>
                                        <h4>THEMEING</h4>
                                        <p>Veritatis eligendi, dignissimos. Porta fermentum mus aute pulvinar earum minus platea massa feugiat rutrum urna facilisi ipsameum.</p>
                                    </div>
                                </div>
                            </div> -->

                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- 
        ================================================== 
            Works Section Start
        ================================================== -->
        <section class="works service-page">
            <div class="container">
                <h2 class="subtitle wow fadeInUp animated" data-wow-delay=".3s" data-wow-duration="500ms">Some Of Our Features Works</h2>
                    <p class="subtitle-des wow fadeInUp animated" data-wow-delay=".5s" data-wow-duration="500ms">
                        Aliquam lobortis. Maecenas vestibulum mollis diam. Pellentesque auctor neque nec urna. Nulla sit amet est. Aenean posuere <br> tortor sed cursus feugiat, nunc augue blandit nunc, eu sollicitudin urna dolor sagittis lacus.
                    </p>
                <div class="row">
                    <div class="col-sm-3">
                         <figure class="wow fadeInLeft animated portfolio-item" data-wow-duration="500ms" data-wow-delay="0ms">
                            <div class="img-wrapper">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" class="img-responsive" alt="this is a title" >
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260">Demo</a>        
                                        <a target="_blank" href="">Details</a>
                                    </div>
                                </div>
                            </div>
                            <figcaption>
                                <h4>
                                    <a href="#">
                                        Dew Drop        
                                    </a>
                                </h4>
                                <p>
                                    Redesigne UI Concept
                                </p>
                            </figcaption>
                        </figure>
                    </div>

                    <div class="col-sm-3">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="img-wrapper">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" class="img-responsive" alt="this is a title" >
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260">Demo</a>        
                                        <a target="_blank" href="">Details</a>
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

                    <div class="col-sm-3">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="300ms">
                            <div class="img-wrapper">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" class="img-responsive" alt="" >
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260">Demo</a>        
                                        <a target="_blank" href="">Details</a>
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

                    <div class="col-sm-3">
                        <figure class="wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay="600ms">
                            <div class="img-wrapper">
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" class="img-responsive" alt="" >
                                <div class="overlay">
                                    <div class="buttons">
                                        <a rel="gallery" class="fancybox" href="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260">Demo</a>        
                                        <a target="_blank" href="">Details</a>
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

                   

                </div>
            </div>
        </section>
        <!-- 
        ================================================== 
            Clients Section Start
        ================================================== -->
        <section id="clients">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="subtitle text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay=".3s">Our Happy Clinets</h2>
                        <p class="subtitle-des text-center wow fadeInUp animated" data-wow-duration="500ms" data-wow-delay=".5s">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore, error.</p>
                        <div id="clients-logo" class="owl-carousel">
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                             <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
                            <div>
                                <img src="https://placeholdit.imgix.net/~text?txtsize=35&txt=imagem&w=370&h=260" alt="">
                            </div>
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
                            <h2 class="title wow fadeInDown" data-wow-delay=".3s"   data-wow-duration="500ms">SO WHAT YOU THINK ?</h1>
                            <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis,<br>possimus commodi, fugiat magnam temporibus vero magni recusandae? Dolore, maxime praesentium.</p>
                            <a href="contact.html" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Contact With Me</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>


    <?php get_footer();?>