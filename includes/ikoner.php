<?php 	 global $data; 

switch(ICL_LANGUAGE_CODE){
	case 'dk':
		$certification ='Certificeringer';
		$godAdgang = 'God adgang';
		$kursus = 'Kursus certificeret';
		$smiley = 'Fødevarestyrelsens smiley-rapporter';
	break;
	case 'en':
		$certification ='Certifications';
		$godAdgang = 'Wheelchair accessible';
		$kursus = 'Course Certified';
		$smiley = 'food hygiene report';
	break;
	case 'de':
		$certification ='Zertifizierungen';
		$godAdgang = 'Rollstuhlgerecht';
		$kursus = 'Kurs zertifiziert';
		$smiley = 'FLebensmittelhygiene-Bericht';
	break;
	default:
		$certification ='Certificeringer';
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
<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom2px" style="padding-bottom:12px;"><?php _e($certification,'qns'); ?></strong></h2>
<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
<div class="event-list-wrapper">
<!-- BEGIN .event-prev -->	
<div class="event-prev clearfix">
<ul style="list-style:outside none; margin-bottom:14px;">
<?php if( $data['nemadgang']!="Nej" ) { ?>
<li class="ikon" style="background:url(<?php echo get_bloginfo ( 'template_directory' );?>/images/SVG/godadgangLogo.svg) no-repeat; height:35px; padding-top:5px; padding-right:10px; margin-top:7px; background-size: 37px 37px"><a target="_blank" href="http://www.godadgang.dk/"><?php _e($godAdgang ,'qns');?></a></li>
<?php }?>
<?php if( $data['kursuscertificeret']!="Nej" ) { ?>
<li class="ikon" style="background:url(<?php echo get_bloginfo ( 'template_directory' );?>/images/SVG/kursusLogo.svg) no-repeat; height:35px; padding-top:5px; padding-right:10px; margin-top:7px; background-size: 37px 37px"><a target="_blank" href="http://www.danhostel.dk/hvad-er-danhostels-konference-certificering"><?php _e($kursus,'qns');?></a></li>
</ul>
<?php } ?>
<ul>
<li style="height: 65px;"><a target="_blank" style="background:url(<?php echo get_bloginfo ( 'template_directory' );?>/images/SVG/smileyLop.svg) no-repeat; vertical-align: text-top; position: absolute; padding:52px 165px; margin: 0px auto; background-size: 165px 52px" href="<?php _e($data['linksmiley'],'qns'); ?>"></a></li>
</ul>
<!-- END .event-prev -->
</div>
</div>	
</div>    
</div>