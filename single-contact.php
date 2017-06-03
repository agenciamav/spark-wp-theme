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
