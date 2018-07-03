                    <?php 	 global $data; 
if( ($data['visturistinfo']!="Nej") && ($data['turistinfo']!="") && ($data['turistlink']!="") ) { ?>
             
						
                        
                         <div class="content-body leftfloater">                    

							<div class="borderino" style="padding-bottom:0px;">
								<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom2px" style="padding-bottom:12px;"><?php _e( 'Turist info','qns' )?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

<div class="event-list-wrapper">

																				
					                </div>
                                    
                          </div>    
                          
                          						<?php // Get the Thumbnail URL?>
							<a href="<?php echo $data['turistlink']; ?>"><img src="<?php echo $data['turistinfo']; ?>" alt="" class="prev-image" style="margin-bottom:-6px;"/></a>
												</div>

                               

                                                                        <?php } ?>                            
    
