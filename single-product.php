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

                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php if( rwmb_meta( 'spark_section_gallery_images', 'type=file&size=large-wide' ) ){ ?>

        <section id="gallery" class="gallery">
            <div class="container-fluid">
                    
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2><?php echo rwmb_meta( 'spark_section_gallery_title'); ?></h2>
                        &nbsp;
                    </div>
                </div>    

                <div class="owl-carousel">
                            
                    <?php $i = 0; ?>
                    <?php foreach( rwmb_meta( 'spark_section_gallery_images', 'type=file&size=large-wide' ) as $image ){ ?>
                        <figure class="">
                            <div class="img-wrapper">
                                <a rel="gallery" class="fancybox" href="<?php echo $image['full_url']; ?>">
                                    <img src="<?php echo $image['url']; ?>" class="<?php echo $image['title']; ?>" alt="<?php echo $image['alt']; ?>">
                                </a>                                            
                            </div>
                        </figure>                                                                
                    <?php } ?>     

                </div>
            </div>

        </section>

        <?php } ?>

        <section class="product_section2" style="background: <?php echo ( rwmb_meta( 'spark_section2_bgcolor' ) ) ? rwmb_meta( 'spark_section2_bgcolor' ) : '#ffffff'; ?>">
            <div class="container">

                <?php if(rwmb_meta( 'spark_section_downloads_files', 'type=file' )){ ?>
                
                    <div class="row">
                        <div class="col-md-8">
                            <?php echo rwmb_meta( 'spark_section2_wysiwyg'); ?>
                        </div>
                        <div class="col-md-4">
                            <section class="product_section_downloads panel panel-default" style="background: <?php echo rwmb_meta( 'spark_section_downloads_bgcolor'); ?>">
                                <div class="panel-body">
                                    <?php echo rwmb_meta( 'spark_section_downloads_wysiwyg'); ?>
                                </div>                                
                                <div class="list-group">
                                    <?php foreach( rwmb_meta( 'spark_section_downloads_files', 'type=file' ) as $file ){ ?>
                                        <a href="<?php echo $file['url']; ?>" class="list-group-item" target="_new"><?php echo $file['title']; ?><i class="ion-ios-cloud-download-outline pull-right"></i></a>
                                    <?php } ?>
                                </div>                                
                            </section>
                        </div>
                    </div>



                <?php }else{ ?>                

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <?php echo rwmb_meta( 'spark_section2_wysiwyg'); ?>
                        </div>                        
                    </div>

                <?php } ?>                

            </div>
        </section>

        <?php if( rwmb_meta( 'spark_section3_wysiwyg') ){ ?>
            <section class="product_section3" style="background: <?php echo rwmb_meta( 'spark_section3_bgcolor'); ?>">
                <div class="container">
                    <?php echo rwmb_meta( 'spark_section3_wysiwyg'); ?>
                </div>
            </section>
        <?php } ?>

        <?php if( rwmb_meta( 'spark_section4_wysiwyg') ){ ?>
        <section class="product_section4" style="background: <?php echo rwmb_meta( 'spark_section4_bgcolor'); ?>">
            <div class="container">
                <?php echo rwmb_meta( 'spark_section4_wysiwyg'); ?>
            </div>
        </section>
        <?php } ?>

        <?php get_template_part('section', 'calltoaction' ); ?> 

    <?php get_footer();?>