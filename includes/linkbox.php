                    <?php 	 global $data; 
 
						?>
                         <?php if ( $data['text1'] ) { ?>
<div class="content-body leftfloater">                    

							<div class="borderino" style="padding-bottom:0px;">
								<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom2px" style="padding-bottom:12px;"><?php _e( 'Danhostel Links','qns' )?></strong></h2>
								<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

<div class="event-list-wrapper">

															
							<!-- BEGIN .event-prev -->	
							<div class="event-prev clearfix">

								<?php if(ICL_LANGUAGE_CODE=='da') {_e('Ferie i Danmark – overnat på et Danhostel vandrerhjem – Billig familieferie og sjove lejrskoleophold. Besøg fx.:','qns');}
					if(ICL_LANGUAGE_CODE=='en') {_e('Planing another vacation in Denmark: try one of our fantastic Danhostels like for example:','qns'); }
					if(ICL_LANGUAGE_CODE=='de') {_e('Andere Danhostels:','qns'); } ?>	
                                <ul>
                                <li><a href="<?php _e($data['link1'],'qns'); ?>" target="_blank"><?php _e($data['text1'],'qns'); ?></a></li>
                                <li><a href="<?php _e($data['link2'],'qns'); ?>" target="_blank"><?php _e($data['text2'],'qns'); ?></a></li>
                                <li><a href="<?php _e($data['link3'],'qns'); ?>" target="_blank"><?php _e($data['text3'],'qns'); ?></a></li>
                                </ul>
							<!-- END .event-prev -->
							</div>

					                </div>
                                    
                          </div>    
                               
						</div><?php } ?>