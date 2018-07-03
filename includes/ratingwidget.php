<?php

global $data; 
static $DOMAIN = 'qns';
switch(ICL_LANGUAGE_CODE){
	case 'dk':
		$rating = 'Ratings';
	break;
	case 'en':
		$rating = 'Ratings';
	break;
	case 'en':
		$rating = 'Bewertungen';
	break;
	default:
		$rating = 'Ratings';
	break;
}

if( ($data['visrating']!="Nej") && ($data['ratingid']!="") ) : 

switch(ICL_LANGUAGE_CODE){
	case 'en':
		$langvar = '&lng=en';
	break;
	default:
		$langvar = '';
	break;
}
?>

<div class="content-body leftfloater">                    
<div class="borderino" style="padding-bottom:0px; overflow-x: hidden; overflow-y: hidden;">
<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom2px" style="padding-bottom:12px;"><?php _e( $rating,$DOMAIN)?></strong></h2>
<div class="undertitle bordertop2px" style="width:100%;"></div>

<iframe src="https://www.relationwise.com/danhostel/iwidget.aspx?hostelid=<?php _e($data['ratingid'],'qns'); ?>&size=<?php _e($data['ratingsize'],'qns'); echo $langvar; ?>" seamless="seamless" style="width:100%;height:<?php if($data['ratingsize']=="big"){echo '400px';} else{echo '140px';} ?>;border:0; overflow-x: hidden; overflow-y:hidden;"> </iframe>
</div>
</div>

<?php endif; ?>