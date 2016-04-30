				
					<?php
                    $type = 'product';
                    $args=array(
                      'post_type' => $type,
                      'post_status' => 'publish',
                      'posts_per_page' => -1                                  
                    );
                    $my_query = null;
                    $my_query = new WP_Query($args);
                    if( $my_query->have_posts() ) {
                      while ($my_query->have_posts()) : $my_query->the_post(); ?>

						<?php if( rwmb_meta( 'spark_warehouse_config_show' ) ){ ?>
                        
                        	<div class="panel panel-product">

								<?php if (has_post_thumbnail()){ ?>
									<a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>" class="">
		                            	<?php the_post_thumbnail('medium-wide', array('class' => 'img-responsive')); ?>
		                            </a>
		                       	<?php } ?>	

		                       	<div class="panel-body">

									<div class="media">
										<a class="pull-left" href="#">											
											<?php $i = 0; ?>
						                    <?php foreach( rwmb_meta( 'spark_warehouse_config_icon', 'type=file&size=full' ) as $icon ){ ?>
						                        <img src="<?php echo $icon['url']; ?>" class="media-object" title="<?php echo $icon['title']; ?>" alt="<?php echo $icon['alt']; ?>">			                        
						                    <?php } ?>    										
										</a>
										<div class="media-body">
											<h3 class="media-heading"><a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>										
											<?php echo rwmb_meta( 'spark_warehouse_config_infobox_text', get_the_ID() ); ?>
										</div>
									</div>

		                       	</div>
									
							</div>                        	
                       
						<?php } ?>

                        <?php
                      endwhile;
                    }
                    wp_reset_query();  // Restore global post data stomped by the_post().
                    ?>				