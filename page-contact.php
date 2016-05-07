<?php
/**
 * Template Name: Modelo Contato
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
            
            <?php the_content(); ?>                                        

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






<!--
==================================================
Call To Action Section Start
================================================== -->
<section id="call-to-action">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2 class="title wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms">INTERESSADO EM TRABALHAR CONOSCO?</h1>
                        <p class="wow fadeInDown" data-wow-delay=".5s" data-wow-duration="500ms">Faça parte da construção de uma das maiores empresas de *** do Brasil.</br>Com um ambiente leve e com pessoas focadas em metas e crescimento, a Spark é o lugar ideal para se desenvolver profissionalmente.<br/>Envie seu currículo para que possamos analisar e entraremos em contato o mais breve possível.</p>
                    <a href="<?php echo bloginfo('url'); ?>/contato/trabalhe-conosco" class="btn btn-default btn-contact wow fadeInDown" data-wow-delay=".7s" data-wow-duration="500ms">Enviar currículo</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <?php get_footer();?>