<?php 

global $data;

switch (ICL_LANGUAGE_CODE) {
	case 'da':
		$news = 'Nyheder';
		break;
	case 'de':
		$news = 'Nachrichten';
		break;
	case 'en':
		$news = 'News';
		break;
	default:
		$news = 'Nyheder';
		break;
	}

$event_perpage = $data['items_per_page'];

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;	
query_posts( "post_type=event&showposts=$event_perpage" );
$c=0;

if( have_posts() ) :
echo '<div class="content-body leftfloater">';
echo '<div class="page-content event-list-wrapper">';
echo '<h2 class="page-title"><strong class="borderbottom">';
_e($news,'qns');
echo '</strong></h2>';
echo '<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>';
 while( have_posts() ) : the_post(); $c++;
//<!-- END Middle Column -->

// <!-- BEGIN .event-prev -->
	
      echo '<div class="event-prev clearfix" style="padding-bottom:10px;">';
      // Get the Thumbnail URL
      echo '<h2 style="background:none; margin-bottom:0; padding-bottom:10px;">';
      echo '<a href="'; 
      the_permalink(); 
      echo '" rel="bookmark" title="';
      the_title_attribute(); 
      echo '" style="background:none;  color:#424242; font-weight:light;">'; 
      the_title();
      echo '</a></h2>';
      if ( has_post_thumbnail() ) {
            $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' );
            if (wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' )) {echo '<img src="' . $src[0] . '" class="prev-image" alt="" style="margin-bottom:6px;"/>';}
      } ?>
	  <div class="excerpt-new">
      <?php 
	  the_excerpt(); ?>
	  </div>
	  <?php  
      // END .event-prev
      echo '</div>';
      endwhile;
      echo '</div>';
      echo '</div>';     
else :           
// do nothing 
endif;?>