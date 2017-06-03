<?php
/**
 * Template Name: Modelo Contato - Perfil Comercial
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
        <div class="block" style="min-height: 300px;">
          <ol class="breadcrumb">
            <li>
              <a href="contatos">
                <i class="ion-ios-home"></i>
                Contatos
              </a>
            </li>
            <li class="active">Comercial 1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>



<section id="team">
  <div class="container">
    <div class="row">
      <!-- <h2 class="subtitle text-center">Meet The Team</h2> -->
      <div class="col-md-3 col-md-offset-2">
        <div class="team-member wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay=".3s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.3s; animation-name: fadeInLeft;">
          <div class="team-img">
            <img src="//sparkag.com.br/wp-content/uploads/2017/05/everson.jpg" class="img-responsive img-thumbnail" alt="">
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="team-member wow fadeInLeft animated" data-wow-duration="500ms" data-wow-delay=".5s" style="visibility: visible; animation-duration: 500ms; animation-delay: 0.5s; animation-name: fadeInLeft;">

          <div class="block" >

            <ol class="breadcrumb">
              <li>
                <a href="index.html">
                  <i class="ion-ios-home"></i>
                  Contatos
                </a>
              </li>
              <li class="active">Comercial 1</li>
            </ol>
          </div>

          <br>

          <h1 class="team_name text-uppercase">Everton Barreto Basso</h1>
          <p class="team_designation">CEO, Project Manager</p>

          <span style="width: 30px; height:3px; display: block; background: orange;"></span>

          <br>

          <!-- DADOS -->
          <table id="contact-info" class="table table-condensed">
            <tbody>

              <tr>
                <td class="text-center icon">
                  <i class="ion-social-whatsapp-outline"></i>
                </td>
                <td>
                  <span>+55 54 9 9999-9999</span>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-ios-telephone-outline"></i>
                </td>
                <td>
                  <span>(54) 3234-1223</span>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-ios-email-outline"></i>
                </td>
                <td>
                  <a href="mailto:email@example.com">email@example.com</a>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-ios-location-outline"></i>
                </td>
                <td>
                  <span>Rua Antônio Peruzzo, 250<br>Bairro Sagrada Família <br>Nova Prata - RS</span>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-social-facebook-outline"></i>
                </td>
                <td>
                  <span>facebook.com/sparkag</span>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-social-instagram-outline"></i>
                </td>
                <td>
                  <span>instagram.com/sparkag</span>
                </td>
              </tr>

              <tr>
                <td class="text-center icon">
                  <i class="ion-ios-home-outline"></i>
                </td>
                <td>
                  <a href="http://sparkag.com.br">www.sparkag.com.br</a>
                </td>
              </tr>

            </tbody>
          </table>

          <style>
          #contact-info {
            border: none;
            font-size: 13px;
          }
          #contact-info * {
            border: none;
          }
          #contact-info .icon i {
            font-size: 19px;
            line-height: 19px;
          }

          #team {
            margin-top: 0;
          }
          #team .team-member {
            margin-top: -50px;
          }
          #team .team-img {
            margin-top: -20px;
          }

          #team .breadcrumb {
            background: none;
            font-size: 16px;
            padding: 8px  0;
          }
          #team .breadcrumb .active {
            color: #fff;
          }
          #team .breadcrumb li a {
            color: #fff;
          }
          </style>

          <hr>

          <a href="#" class="btn btn-xs">
            <i class="ion-ios-download-outline"></i> Baixar V-card
          </a>

          <a href="#" class="btn btn-xs">
            <i class="ion-ios-download-outline"></i> Baixar CSV
          </a>

        </div>
      </div>

    </div>
  </div>
</section>


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

                <div class="col-md-4 col-md-offset-2">
                    <div class="block">
                        <img src="http://placehold.it/500x500" alt="" class="img-responsive">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="block">
                        <ul>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                            <li>Lorem ipsum dolor sit.</li>
                        </ul>
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
