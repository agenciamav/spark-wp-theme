<?php
  require_once __DIR__ . '/vendor/autoload.php';
  // require_once __DIR__ . '/vendor/jeroendesloovere/vcard/src/VCard.php';
  use JeroenDesloovere\VCard\VCard;

  if ( isset($_GET['download']) || isset($_GET['save']) ) {

    // Get the contact data
    $contact_details['name']        = rwmb_meta( 'contact_details_name' );
    $contact_details['designation'] = rwmb_meta( 'contact_details_designation' );
    $contact_details['whatsapp']    = rwmb_meta( 'contact_details_whatsapp' );
    $contact_details['email']       = rwmb_meta( 'contact_details_email' );
    $contact_details['phone']       = rwmb_meta( 'contact_details_phone' );
    $contact_details['facebook']    = rwmb_meta( 'contact_details_facebook' );
    $contact_details['instagram']   = rwmb_meta( 'contact_details_instagram' );
    $contact_details['address']     = rwmb_meta( 'contact_details_address' );
    $contact_details['cep']         = rwmb_meta( 'contact_details_cep' );
    $contact_details['website']     = rwmb_meta( 'contact_details_website' );

    $contact_details['photo']       = get_the_post_thumbnail_url('full');

    /**
     * VCard generator - Save to file or output as a download
     */
    // define vcard
    $vcard = new VCard();
    // define variables
    $name = explode(" ", $contact_details['name']);

    $firstname = $name[0];

    $lastname = array_splice($name, 1);
    $lastname = implode(" ", $lastname );

    $additional = '';
    $prefix = '';
    $suffix = '';
    // add personal data
    $vcard->addName($lastname, $firstname, $additional, $prefix, $suffix);
    // add work data
    $vcard->addCompany('Spark');
    $vcard->addJobtitle($contact_details['designation']);
    $vcard->addEmail($contact_details['email'] );
    $vcard->addPhoneNumber($contact_details['whatsapp'] , 'PREF;WORK');
    $vcard->addPhoneNumber($contact_details['phone'] , 'WORK');
    $vcard->addAddress(null, null, $contact_details['address'], null, null, $contact_details['cep'], 'Brasil');
    $vcard->addURL($contact_details['website']);
    $vcard->addEmail( $contact_details['facebook'] );
    $vcard->addEmail( $contact_details['instagram'] );

    if( $contact_details['photo'] ){
      $vcard->addPhoto($contact_details['photo']);
    }
    //$vcard->addPhoto('https://raw.githubusercontent.com/jeroendesloovere/vcard/master/tests/image.jpg');

    return $vcard->download();
  }
?>

<?php get_header();?>

<section class="global-page-header">
    &nbsp;
</section>
<section id="team">

   <div id="app"></div>

</section>

<script src="<?php bloginfo('template_url') ?>/dist/build.js?<?php echo date('mm') ?>" type="text/javascript"></script>
<!-- <script src="http://localhost:8080/dist/build.js" type="text/javascript"></script> -->


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
