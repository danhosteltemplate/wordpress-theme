<?php get_header(); ?>

	<?php //Display Page Header
global $data;
	?>
	
	<!-- BEGIN .section -->
	<div class="section clearfix">
		
		<!-- BEGIN .main-content -->
		<div class="cwrapper960">
        
			<div class="two-thirds">
              <div class="content-body leftfloater">                    
                  	
			<div class="page-content blog-list-wrapper">
			
            	<h2 class="page-title"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php the_title(); ?></strong></h2>
				<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
                
				<?php load_template( get_template_directory() . '/includes/loop.php' ); ?>
                </div>
                
                </div>
                
                </div> 
                
                <p>Hvor er dette?</p>
<?php 					$street_address = ''; 
						$phone_number = '';
						$email_address = '';
						$sted_navn = '';
						$cvr = '';
						$vaert = '';

					
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
					?>
                    <div class="one-third last-col">
                         <div class="content-body leftfloater">                    

							<div class="borderino">
								<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php _e( 'Kontakt os','qns' )?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
							
										<!--BEGIN .contact_list -->
										<ul class="contact_list">
                                        	<?php if ( $sted_navn ) { ?><li class="sted_navn"><span style="font-weight:bold"><?php _e($data['sted_navn'],'qns'); ?></span></li><?php } ?>
											<?php if ( $street_address ) { ?><li class="street_address"><span><a href="http://maps.google.com/maps?q=<?php _e($data['sted_navn'],'qns'); ?> <?php _e($data['street_address'],'qns'); ?>"><?php _e($data['street_address'],'qns'); ?></a></span></li><?php } ?>
											<?php if ( $email_address ) { ?><li class="email_address"><span><a href="mailto:<?php _e($data['email_address'],'qns'); ?>"><?php _e($data['email_address'],'qns'); ?></a></span></li><?php } ?>
											<?php if ( $phone_number ) { ?><li class="phone_number"><span><a href="tel://<?php _e($data['phone_number'],'qns'); ?>"><?php _e($data['phone_number'],'qns'); ?></a></span></li><?php } ?>
                                            <?php if ( $vaert ) { ?><li class="vaert"><span><?php _e($data['vaert'],'qns'); ?></span></li><?php } ?>
                                            <?php if ( $cvr ) { ?><li class="cvr"><span><?php _e($data['cvr'],'qns'); ?></span></li><?php } ?> 

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
			</div>
            </div>

        <!-- END .main-content -->
		</div>

		
	<!-- END .section -->
	</div>

<?php get_footer(); ?>