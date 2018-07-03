<?php get_header(); ?>

	<?php //Display Page Header
	global $data;

		global $wp_query;
		$postid = $wp_query->post->ID;
		echo page_header( get_post_meta($postid, 'qns_page_header_image', true) );
		wp_reset_query();
	?>
	
	<!-- BEGIN .section -->
	<div class="section clearfix">
		
		<!-- BEGIN .main-content -->

                			<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="cwrapper980">
        
			<div class="two-thirds">
              <div class="content-body leftfloater">                    
             <div class="page-content blog-list-wrapper">
			
            	<h2 class="page-title"><strong class="noborders borderbottom4px" style="padding-bottom:12px;"><?php the_title(); ?></strong></h2>
				<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

					<!-- BEGIN .event-prev -->	
					<div class="event-prev event-single clearfix">

						<?php // Get the Thumbnail URL
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-size' );
							echo '<img src="' . $src[0] . '" alt="" class="prev-image"/>';
						?>

						<?php the_content(); ?> 
<div class="fb-comments"data-href="<?php the_permalink(); ?>" data-num-posts="2" mobile="false"></div>
<style>.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
.fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
</style>
					<!-- END .event-prev -->  </div>
                
                </div>
                
                </div>
					</div>

					<?php endwhile; endif; ?>


<?php 					$street_address = ''; 
						$phone_number = '';
						$email_address = '';
						$sted_navn = '';
						$cvr = '';
						$vaert = '';
						$social_facebook = '';

					
						if ( $data['street_address'] ) {
							$street_address = $data['street_address'];
						}
						
						if ( $data['cvr'] ) {
							$cvr = $data['cvr'];
						}
						
						if ( $data['vaert'] ) {
							$vaert = $data['vaert'];
						}
					
						if ( $data['phone_number'] ) {
							$phone_number = $data['phone_number'];
						}
					
						if ( $data['email_address'] ) {
							$email_address = $data['email_address'];
						}	
						if ( $data['sted_navn'] ) {
							$sted_navn = $data['sted_navn'];
						}	
						if ( $data['social_facebook'] ) {
							$social_facebook = $data['social_facebook'];
						}	

					?>
                    <div class="one-third last-col">
                    
                    
                    <div class="content-body leftfloater" style="margin-bottom:0;">                    

		<div class="borderino">
                    
                    
                    			<!-- BEGIN .booknow -->
			<div class="booknow" style="position:relative;height: 100%;
    left: 0;
    padding: 0;
    width: 100%;
    z-index: 1;
    box-shadow:none;
    margin-bottom:0;
    bottom:0px !important;
    border:none;">
				
				<!-- BEGIN .booknow-wrapper -->
				<div class="booknow-wrapper" style="width:100% !important; padding:0 !important">
				
				<?php			
					// Get booking page ID
					$booking_page = $data['booking_page_url'];
				?>
				
				<form class="booking-form booking-validation" name="bookroom" method="get" action="<?php _e($data['booking_link'],'qns'); ?>"> 
<h2 style="margin-bottom:10px;" class="page-title"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php _e('Book online','qqns'); ?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

					<div class="clearfix">
                    	<input name="hostel_id" value="<?php echo $data['hostel_id']; ?>" type="hidden">

						<input type="date" id="fromdate" name="fromdate" value="<?php _e('Check ind','qqns'); ?>" class="input-half datepicker">
						<input type="date" id="todate" name="todate" value="<?php _e('Check ud','qqns'); ?>" class="input-half input-half-last datepicker">
                                                <input name="persons" value="1" type="hidden">

					</div>
					
					    <input name="sprog" value="DK" type="hidden"> 
   						<input name="profileid" value="0" type="hidden">

					<input class="bookbutton" type="submit" value="<?php _e('Søg','qqns'); ?>" />
				
				</form>
								
				<!-- END .booknow-wrapper -->
				</div>
				
			<!-- END .booknow -->
			</div>

                    
        </div></div>
                    
                    
                         <div class="content-body leftfloater">                    

							<div class="borderino">
								<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php _e( 'Kontakt os','qqns' )?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
							
										<!--BEGIN .contact_list -->
										<ul class="contact_list">
                                        	<?php if ( $sted_navn ) { ?><li class="sted_navn"><span style="font-weight:bold"><?php _e($data['sted_navn'],'qns'); ?></span></li><?php } ?>
											<?php if ( $street_address ) { ?><li class="street_address"><span><a href="http://maps.google.com/maps?q=<?php _e($data['sted_navn'],'qns'); ?> <?php _e($data['street_address'],'qns'); ?>"><?php _e($data['street_address'],'qns'); ?></a></span></li><?php } ?>
											<?php if ( $email_address ) { ?><li class="email_address"><span><a href="mailto:<?php _e($data['email_address'],'qns'); ?>"><?php _e($data['email_address'],'qns'); ?></a></span></li><?php } ?>
											<?php if ( $phone_number ) { ?><li class="phone_number"><span><a href="tel://<?php _e($data['phone_number'],'qns'); ?>"><?php _e($data['phone_number'],'qns'); ?></a></span></li><?php } ?>
                                            <?php if ( $vaert ) { ?><li class="vaert"><span><?php _e($data['vaert'],'qns'); ?></span></li><?php } ?>
                                            <?php if ( $cvr ) { ?><li class="cvr"><span><?php _e($data['cvr'],'qns'); ?></span></li><?php } ?> 
                                            <div class="fb-like" style="margin-top:8px;" data-href="<?php if ( $social_facebook ) {_e($data['social_facebook'],'qqns'); } ?> " data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div>

										<!--END .contact_list -->
										</ul>
                                        </div>
                                 </div>
                                 
                             <div class="leftfloater" style="margin-top:-20px;">       
                                        <?php 
							// If the Google Maps option is selected display the map
								
								$map_lat = $data['gmap-top-lat'];
								$map_lng = $data['gmap-top-lng'];
								
								if ( $data['gmap-top-content'] ) {
									$map_content = 'marker_html="' . $data['gmap-top-content'] . '"';
								}
								
								echo do_shortcode('[googlemap height="300px" width="100%" latitude="' . $map_lat . '" longitude="' . $map_lng . '" marker_latitude="' . $map_lat . '" marker_longitude="' . $map_lng . '" ' . $map_content . ' marker_popup=false ]');
							

							// If the contact form has errors display them to the user
							if ( $got_error == true ) {

								echo '<div class="msg fail">
								<ul class="list-fail">';

								if ( $name_error != '' ) { echo '<li>' . $name_error . '</li>'; }
								if ( $email_error != '' ) { echo '<li>' . $email_error . '</li>'; }
								if ( $contact_error != '' ) { echo '<li>' . $contact_error . '</li>'; }
																if ( $contact_error != '' ) { echo '<li>' . $contact_error . '</li>'; }


								echo '</ul></div>';

							}?>
									</div>
                                    
                                    <div class="content-body leftfloater">                    

							<div class="borderino" style="padding-bottom:0px;">
								<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php _e( 'Nyheder','qqns' )?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

<div class="event-list-wrapper">

					
					<?php
						
						if( $data['items_per_page'] ) { 
							$event_perpage = $data['items_per_page'];
						}
						else {
							$event_perpage = '1';
						}
					
						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
						query_posts( "post_type=event&posts_per_page=1" );

			    		if( have_posts() ) :
						while( have_posts() ) : the_post(); ?>
															
							<!-- BEGIN .event-prev -->	
							<div class="event-prev clearfix">

									<h4 style="background:none; margin-bottom:0;"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" style="background:none;  color:#000; font-weight:bold;"><?php the_title(); ?></a></h4>
<?php the_excerpt();?>
							<!-- END .event-prev -->
							</div>

					                </div>
                                    
                          </div>    
                          
                          						<?php // Get the Thumbnail URL
							$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-size' );
							echo '<img src="' . $src[0] . '" alt="" class="prev-image" style="margin-bottom:-6px;"/>';
						?>
                          						<?php endwhile; else : ?>

							<p><?php _e('No events have been added yet','qns'); ?></p>
						
						<?php endif; ?>      
			</div>
                    </div>

            
            </div>



						
	<!-- END .section -->
	</div>

<?php get_footer(); ?>