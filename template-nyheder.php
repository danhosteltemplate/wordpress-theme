<?php 

/* 
Template Name: Nyheder / Tilbud
*/ 

// Fetch options stored in $data
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
?>

<?php get_header(); ?>

	<?php //Display Page Header
		global $wp_query;
		$postid = $wp_query->post->ID;
		//echo page_header( get_post_meta($postid, 'qns_page_header_image', true) );
		wp_reset_query();
	?>
	<!-- BEGIN .section -->
	<div class="section clearfix">
		<!-- BEGIN .main-content -->
		<div class="cwrapper980">
			<div class="two-thirds">
              <div class="content-body leftfloater">                    
				<!-- BEGIN .page-content -->
				<div class="page-content event-list-wrapper">

			<h2 class="page-title"><strong class="borderbottom4px" style="padding-bottom:12px;"><?php the_title(); ?></strong></h2>
			<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
					<?php the_content(); ?>
					<?php
						$event_perpage = 9999;//$data['items_per_page'];
						$paged = 0;
						query_posts( "post_type=event&posts_per_page=$event_perpage" );
						$c=0;
			    		if( have_posts() ) :
						while( have_posts() ) : the_post(); 
						$c++; ?>
                            
							<!-- BEGIN .event-prev -->	
							<div class="event-prev clearfix" style="padding-bottom:10px;">
						
						<h2 style="background:none; margin-bottom:10;"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" style="background:none;  color:#000; font-weight:light;"><?php the_title();?></a></h2>
                        <?php // Get the Thumbnail URL
						if ( has_post_thumbnail() ) {
      						$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' );
      						if (wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'slideshow-big' )) {echo '<img src="' . $src[0] . '" class="prev-image" alt="" style="margin-bottom:6px;"/>';}
      					}?>
						<p>
								<?php
								$content = get_the_content();
								echo wp_trim_words( $content, 40 ); ?>
								</p>
						<!-- END .event-prev -->
						</div>
						<?php endwhile; else : ?>
						<p><?php _e('0 '. $news,'qns'); ?></p>
						<?php endif; ?>
					                </div>
               <!-- END .two thirds -->
			</div></div>
                    <div class="one-third last-col">
                    <?php if( $data['bookingboksen']=="Ja" ){
						echo '<div class="content-body leftfloater">';
						echo '<div class="borderino">';
						echo '<div class="booknow-left">';
						load_template( get_template_directory() . '/includes/booknow.php' );
						echo '</div>';
						echo '</div>';
						echo '</div>';
						}?>
						<?php if( $data['quicklinksallesider']=="Ja" ) { load_template( get_template_directory() . '/includes/quicklinks.php' ); } ?>
						<?php
						echo '<div class="content-body leftfloater">';
						echo '<div class="borderino">';
						load_template( get_template_directory() . '/includes/kontaktos.php' ); 
						echo '</div>';
						load_template( get_template_directory() . '/includes/map.php' );
						echo '</div>';
						?>
						<?php load_template( get_template_directory() . '/includes/ikoner.php' ); ?>
						<?php load_template( get_template_directory() . '/includes/turistinfo.php' ); ?>
                    </div>
		<!-- END .main-content -->
		</div>

	<!-- END .section -->
	</div>

<?php get_footer(); ?>