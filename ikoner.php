<?php 	 global $data; 

switch(ICL_LANGUAGE_CODE){
	case 'dk':
		$godAdgang = 'God adgang';
		$kursus = 'Kursus certificeret';
		$smiley = 'Fødevarestyrelsens smiley-rapporter';
	break;
	case 'en':
		$godAdgang = 'Wheelchair accessible';
		$kursus = 'Course Certified';
		$smiley = 'food hygiene report';
	break;
	case 'de':
		$godAdgang = 'Rollstuhlgerecht';
		$kursus = 'Kurs zertifiziert';
		$smiley = 'FLebensmittelhygiene-Bericht';
	break;
	default:
		$godAdgang = 'God adgang';
		$kursus = 'Kursus certificeret';
		$smiley = 'Fødevarestyrelsens smiley-rapporter';
	break;
}

$linksmiley = '';

if ( $data['linksmiley'] ) {
$linksmiley = $data['linksmiley'];
}
?>
<div class="content-body leftfloater">                    

<div class="borderino" style="padding-bottom:0px;">
<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php if(ICL_LANGUAGE_CODE=='da') {_e('Certificeringer','qns');}
if(ICL_LANGUAGE_CODE=='en') {_e('Certifications','qns'); }
if(ICL_LANGUAGE_CODE=='de') {_e('Certificeringer','qns'); } ?></strong></h2>
<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>

<div class="event-list-wrapper">

							
<!-- BEGIN .event-prev -->	
<div class="event-prev clearfix">
<ul style="list-style:outside none; margin-bottom:14px;">
<?php if( $data['nemadgang']!="Nej" ) { ?>
<li style=" background:url(<?php echo get_bloginfo ( 'template_directory' );?>/images/SVG/godadgangLogo.svg) no-repeat; height:35px; padding-top:5px; background-size: 35px 35px"><a targer="_blank" href="http://www.godadgang.dk/"><?php _e($godAdgang ,'qns');?></a></li>
<?php }?>

<?php if( $data['kursuscertificeret']!="Nej" ) { ?>
<li style="background:url(<?php echo get_bloginfo ( 'template_directory' );?>/images/SVG/kursusLogo.svg) no-repeat; height:35px; padding-top:5px; padding-right:10px; margin-top:7px; background-size: 37px 37px"><?php _e($kursus,'qns');?></li>
</ul>
<?php } ?>
<a href="<?php _e($data['linksmiley'],'qns'); ?>"><?php _e($smiley,'qns');?></a>

<!-- END .event-prev -->
</div>
</div>	
</div>    
</div>