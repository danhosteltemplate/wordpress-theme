<?php 	 global $data; 
/*	  $booking_link = '';
if ( $data['booking_link'] ) {
  $booking_link = $data['booking_link'];
}
*/
switch(ICL_LANGUAGE_CODE){
	
		case 'da':
		$title = 'Kontakt os';
		break;

	case 'de':
		$title = 'Kontaktieren Sie uns';
		break;

	case 'en':
		$title = 'Contact us';
		break;
	
	default:
		$title = 'Kontakt os';
		break;
	}
?>   
<h2 class="page-title"><strong><?php _e($title,'qns'); ?></strong></h2>
	  <div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
			  <!--BEGIN .contact_list -->
			  <ul class="contact_list">
				  <?php if ($data['sted_navn']) { ?>
                  <li class="sted_navn"><h3><?php _e($data['sted_navn'],'qns'); ?></h3></li>
				  <?php } ?>

				  <?php if ($data['office_hours']) { ?>
                  <li class="office_hours" title="office-hours"><span><?php _e($data['office_hours'],'qns'); ?></a></span></li>
				  <?php } ?>

				   <?php if ($data['vaert']) { ?>
                  <li class="vaert" title="Vært"><span><?php _e($data['vaert'],'qns'); ?></span></li>
				  <?php } ?>

				  <?php if ($data['street_address']) { ?>
                  <li class="street_address" title="Adresse"><span><a href="http://maps.google.com/maps?q=<?php _e($data['sted_navn'],'qns'); ?> 
				  <?php _e($data['street_address'],'qns'); ?>"><?php _e($data['street_address'],'qns'); ?></a></span></li>
				  <?php } ?>

				  <?php if ($data['phone_number']) { ?>
                  <li class="phone_number" title="Tel."><span><a href="tel://<?php _e($data['phone_number'],'qns'); ?>">
				  <?php _e($data['phone_number'],'qns'); ?></a></span></li>
				  <?php } ?>
                  
				  <?php if ($data['email_address']) { ?>
                  <li class="email_address" title="Mail"><span><a href="mailto:<?php _e($data['email_address'],'qns'); ?>">
				  <?php _e($data['email_address'],'qns'); ?></a></span></li>
				  <?php } ?>
                  
				  <?php if ($data['cvr']) { ?>
                  <li class="cvr" title="CVR"><span>CVR: <?php _e($data['cvr'],'qns'); ?></span></li>
				  <?php } ?> 
                  
				  <div class="fb-like" style="margin-top:8px;" data-href="<?php if ($data['social_facebook']) {_e($data['social_facebook'],'qns'); } ?> " data-send="true" data-layout="button_count" data-width="250" data-show-faces="false"></div>

			  <!--END .contact_list -->
			  </ul>
