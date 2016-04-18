<?php
/**
 * Template Name: Modelo Contato - Solicitar Ligação
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>
<?php get_header();?>
<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h1><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </div>
</section><!--/#page-header-->


<!--
==================================================
    Contact Section Start
    ================================================== -->
    <section id="contact-section">
        <div class="container">

            <div class="row">

                <div class="col-md-6">
                    <div class="block">
                        <h2 class="title wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Envie sua mensagem</h2>
                        <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                            Preencha o formulário abaixo e clique em enviar.<br/>Dentro de alguns dias um cosultor irá entrar em contato com você.
                        </p>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="contact-form">
                    
                        <form id="contact-form" method="post" action="sendmail.php" role="form">

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".6s">
                                <input type="text" placeholder="Your Name" class="form-control" name="name" id="name">
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".8s">
                                <input type="email" placeholder="Your Email" class="form-control" name="email" id="email" >
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1s">
                                <input type="text" placeholder="Subject" class="form-control" name="subject" id="subject">
                            </div>

                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.2s">
                                <textarea rows="6" placeholder="Message" class="form-control" name="message" id="message"></textarea>
                            </div>


                            <div id="submit" class="wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1.4s">
                                <input type="submit" id="contact-submit" class="btn btn-default btn-send" value="Send Message">
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row address-details">
                <div class="col-md-4">
                    <div class="address wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".3s">
                        <i class="ion-ios-location-outline"></i>
                        <h5> Rua Antônio Peruzzo, nº 250.<br/>Bairro Sagrada Família<br/>Nova Prata – RS. CEP 95320-000</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="email wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".7s">
                        <i class="ion-ios-email-outline"></i>
                        <p><a href="mailto:comercial@sparkag.com.br">comercial@sparkag.com.br</a><br><a href="mailto:contato@sparkag.com.br">contato@sparkag.com.br</a></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="phone wow fadeInLeft" data-wow-duration="500ms" data-wow-delay=".9s">
                        <i class="ion-ios-telephone-outline"></i>
                        <h3>+55 54 3242-4507</h3>
                    </div>
                </div>
            </div>
        </div>


    </section>





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
    <?php  } ?>

<?php get_footer();?>