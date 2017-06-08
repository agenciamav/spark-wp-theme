<?php
/**
 * Template Name: Modelo Contato - Dinâmica
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

                <div class="col-md-6 col-md-offset-3">
                    <div class="block">
                        <?php the_content(); ?>
                    </div>
              <br>
                    <div class="contact-form">
                        <?php echo do_shortcode( '[contact-form-7 id="'. rwmb_meta('spark_form_form') . '"]' ); ?>
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
