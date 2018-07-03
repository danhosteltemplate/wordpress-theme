<?php if( $data['nyhedright']!="Nej" ) { ?>

<?php

if( $data['items_per_page'] ) { 
$event_perpage = $data['items_per_page'];
}
else {
$event_perpage = '1';
}

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
query_posts( "post_type=event&posts_per_page=1" );

if( have_posts() ) :?>

<div class="content-body leftfloater">                    

<div class="borderino" style="padding-bottom:0px;">
<h2 class="page-title" style="margin-bottom:10px;"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php if(ICL_LANGUAGE_CODE=='da'){_e('Nyheder','qns');}
if(ICL_LANGUAGE_CODE=='en') {_e('News','qns'); }
if(ICL_LANGUAGE_CODE=='de') {_e('Nachrichten','qns'); } ?></strong></h2>
<div class="undertitle bordertop2px" style=" width:100%; height:13px;"></div>

<div class="event-list-wrapper">

<?php 
while( have_posts() ) : the_post(); ?>

<!-- BEGIN .event-prev -->	
<div class="event-prev clearfix">

<h4 style="background:none; margin-bottom:0;"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" style="background:none;  color:#000; font-weight:bold;"><?php the_title(); ?></a></h4>
<?php //the_excerpt();?>
<!-- END .event-prev -->
</div>

</div>

</div>    

<?php // Get the Thumbnail URL
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' );
if (wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' )) {
echo '<img src="' . $src[0] . '" alt="" class="prev-image" style="margin-bottom:-6px;"/>';
}
?></div>
<?php endwhile; else : ?>
<?php endif; ?>      
<?php } ?>                            

