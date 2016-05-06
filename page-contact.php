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

            <div class="row">

                <div class="col-md-6">
                    <div class="block">
                        <h2 class="title wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Envie sua mensagem</h2>
                        <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                            Preencha o formulário abaixo e clique em enviar.<br/>Dentro de alguns dias um cosultor irá entrar em contato com você.
                        </p>
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
                <div class="col-md-6">
                   <div class="map-area">
                    <h2 class="title wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".3s">Encontre-nos</h2>
                    <p class="subtitle-des wow fadeInDown" data-wow-duration="500ms" data-wow-delay=".5s">
                        A Spark encontra-se situada na Serra Gaúcha, ao sul do Brasil.<br/>Veja onde nos encontrar e agende a sua visita.
                    </p>
                    <div class="map">
                        
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3496.5376979193597!2d-51.60796968468938!3d-28.79304628116122!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951dc61ae2bfe18b%3A0xb34cd1d93df2ed5c!2sSpark!5e0!3m2!1spt-BR!2sbr!4v1462503503958" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>

                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.277552998015!2d90.3678744!3d23.773128800000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c0ae4adf3cb9%3A0x7f2cf443b764e4a4!2sShishu+Mela!5e0!3m2!1sen!2s!4v1435516022247" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe> -->

                    </div>
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