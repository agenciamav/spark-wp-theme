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

        <?php if (have_posts()) { while (have_posts()) { the_post(); ?>
        <!-- 
        ================================================== 
            Service Page Section  Start
        ================================================== -->
        <section id="service-page" class="pages service-page">
            <div class="container">
                <div class="row">         

                    <?php if (has_post_thumbnail()){ ?>
                    <div class="col-md-6">
                        <div class="block">                        
                            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="block">                        
                            <?php the_content() ?>                            
                        </div>
                    </div>
                    <?php }else{ ?>
                        
                        <div class="col-md-8 col-md-offset-2">
                            <div class="block">                        
                                <?php the_content() ?>                 
                            </div>
                        </div>
                    
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php } } ?>

        <?php get_template_part('section', 'calltoaction' ); ?>  

    <?php get_footer();?>