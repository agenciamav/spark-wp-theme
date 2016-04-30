<!-- Slider Section Start -->
<section id="slider_section" class="section">
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container-fluid">
			<div id="navbar" class="">
				<ul class="nav nav-justified" id="slider-navigation">
					
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
                        
                        <li data-position-x="<?php echo rwmb_meta( 'spark_warehouse_config_focus_x' ) ?>" 
                    		data-position-y="<?php echo rwmb_meta( 'spark_warehouse_config_focus_y' ) ?>" 
                    		data-zoom="<?php echo rwmb_meta( 'spark_warehouse_config_focus_zoom' ) ?>" 
                    		data-infobox="product_<?php the_ID(); ?>">
                        	
                        	<a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>" style="color:#fff;">
                        		                     	
                        		<?php $i = 0; ?>
			                    <?php foreach( rwmb_meta( 'spark_warehouse_config_icon', 'type=file&size=full' ) as $icon ){ ?>
			                        <img src="<?php echo $icon['url']; ?>" title="<?php echo $icon['title']; ?>" alt="<?php echo $icon['alt']; ?>">			                        
			                    <?php } ?>    
								<br>
                        		<?php the_title(); ?>
                        	</a>
                        </li>

						<?php } ?>

                        <?php
                      endwhile;
                    }
                    wp_reset_query();  // Restore global post data stomped by the_post().
                    ?>

					<!-- <li data-slide-to="0" class="active" data-position-x="2496" data-position-y="1600" data-zoom="90" data-show-infobox="wms">
						<a href="http://google.com.br" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_wms.png">
							<br>
							WMS
						</a>
					</li>
					<li data-slide-to="1" data-position-x="1442" data-position-y="982" data-zoom="90" data-show-infobox="cart">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_cart.png">
							<br>
							CART
						</a>
					</li>
					<li data-slide-to="2" data-position-x="3333" data-position-y="920" data-zoom="90" data-show-infobox="lift">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_lift.png">
							<br>
							LIFT
						</a>
					</li>
					<li data-slide-to="3" data-position-x="745" data-position-y="1702" data-zoom="90" data-show-infobox="agv">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_agv.png">
							<br>
							AGV
						</a>
					</li>
					<li data-slide-to="6" data-position-x="1001" data-position-y="1181" data-zoom="90" data-show-infobox="glass">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_glass.png">
							<br>
							GLASS
						</a>
					</li>
					<li data-slide-to="6" data-position-x="1780" data-position-y="1855" data-zoom="90" data-show-infobox="watch">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_watch.png">
							<br>
							WATCH
						</a>
					</li>
					<li data-slide-to="6" data-position-x="1" data-position-y="1" data-zoom="90" data-show-infobox="arm">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_arm.png">
							<br>
							ARM
						</a>
					</li>
					<li data-slide-to="4" data-position-x="2148" data-position-y="1081" data-zoom="90" data-show-infobox="rfid">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_rfid.png">
							<br>
							RFID
						</a>
					</li>
					<li data-slide-to="5" data-position-x="2754" data-position-y="1081" data-zoom="90" data-show-infobox="desk">
						<a href="#" style="color:#fff;">
							<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/icons/white/icon_desk.png">
							<br>
							DESK
						</a>
					</li> -->
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>



<div id="zoom_container">
	
	<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/warehouse.jpg" border="0" id="warehouse" width="100%" height="auto" />

	<div class="landmarks" data-show-at-zoom="85" data-allow-drag="true">

		<?php        
        // $my_query = new WP_Query($args);
        if( $my_query->have_posts() ) {
          while ($my_query->have_posts()) : $my_query->the_post(); ?>          	

          	<?php if (rwmb_meta( 'spark_warehouse_config_show', get_the_ID())) { ?>

	          	<!-- This is a mark-type landmark -->
				<div class="item mark product_<?php the_ID(); ?>" 
					data-position="<?php echo rwmb_meta( 'spark_warehouse_config_infobox_position_x', get_the_ID() ) . ',' . rwmb_meta( 'spark_warehouse_config_infobox_position_y', get_the_ID() ); ?>" 
					data-show-at-zoom="<?php echo rwmb_meta( 'spark_warehouse_config_infobox_show_at_zoom', get_the_ID() ); ?>">
					<div>
						<div class="text">
							<?php if (has_post_thumbnail()){ ?>
								<a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>" class="">
	                            	<figure><?php the_post_thumbnail('medium-wide', array('class' => 'img-responsive')); ?></figure>
	                            </a>
	                       	<?php } ?>	
	                       	<div class="infobox-body">
								<h3><a href="<?php the_permalink() ?>" title="Ver produto <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
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


		<!-- <div class="item mark wms" data-position="2496,1600" data-show-at-zoom="85">
			<div>
				<div class="text">
					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>
					<h4><a href="http://google.com.br">WMS</a></h4>
				</div>
			</div>
		</div>


		<div class="item mark cart" data-position="1442,982" data-show-at-zoom="85">
			<div>
				<div class="text">
					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>
					<h4><a href="http://google.com.br">CART</a></h4>
				</div>
			</div>
		</div>



		<div class="item mark lift" data-position="3333,1070" data-show-at-zoom="85">
			<div>
				<div class="text">
					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/slider/lift_thumb.jpg" alt=""><br>
					<h4><a href="http://google.com.br">LIFT</a></h4>
					<p>Terminal touch-screen para empilhadeiras</p>
				</div>
			</div>
		</div>



		<div class="item mark agv" data-position="745,1702" data-show-at-zoom="85">
			<div>
				<div class="text">
					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>
					<h4><a href="http://google.com.br">AGV</a></h4>
				</div>
			</div>
		</div>


		<div class="item mark rfid" data-position="2148,1081" data-show-at-zoom="85">
			<div>
				<div class="text">

					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>

					<h4><a href="http://google.com.br">RFID</a></h4>
				</div>
			</div>
		</div>

		<div class="item mark desk" data-position="2754,1081" data-show-at-zoom="85">
			<div>
				<div class="text">

					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>

					<h4><a href="http://google.com.br">DESK</a></h4>
				</div>
			</div>
		</div>


		<div class="item mark glass" data-position="1001,1181" data-show-at-zoom="85">
			<div>
				<div class="text">

					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>

					<h4><a href="http://google.com.br">GLASS</a></h4>
				</div>
			</div>
		</div>


		<div class="item mark watch" data-position="1780,1855" data-show-at-zoom="85">
			<div>
				<div class="text">

					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>

					<h4><a href="http://google.com.br">WATCH</a></h4>
				</div>
			</div>
		</div>


		<div class="item mark arm" data-position="1,1" data-show-at-zoom="85">
			<div>
				<div class="text">

					<img src="<?php echo bloginfo('stylesheet_directory'); ?>/images/150x100.png" alt=""><br>

					<h4><a href="https://www.google.com.br/?gws_rd=ssl#safe=off&q=arm">ARM</a></h4>
				</div>
			</div>
		</div> -->


	</div>
</div>
</section>