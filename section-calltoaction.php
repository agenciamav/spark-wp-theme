
        <?php if(rwmb_meta( 'spark_cta_post')){ ?>
        <!-- 
        ================================================== 
            Call To Action Section Start
        ================================================== -->
        <section id="call-to-action">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="block">                            
                            <?php
                                   
                                    $cta = get_post( rwmb_meta( 'spark_cta_post') ); 
                                    if( $cta ) {
                                        $title      = $cta->post_title;
                                        $content    = $cta->post_content;                                
                                ?>
                                            
                                        <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="300ms"><?php echo $title; ?></h1>
                                        <?php echo $content; ?>
                                                                            
                                <?php  } ?>  
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <?php } ?>
