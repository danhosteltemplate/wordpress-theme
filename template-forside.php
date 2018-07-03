<?php 

/* 
Template Name: Forside
*/ 

?>
<?php get_header(); ?>
	<?php global $data; 
?>
<?php if ($_GET['hostel_id']!=null){ ?>


	<?php wp_footer(); ?>

 <?php if(ICL_LANGUAGE_CODE=='da') {?>
 <iframe src="http://m.danhostel.dk/hostel/hostel-show-rooms?hostel_id=<?php  echo $data['hostel_id'];?>&fromdate=<?php _e($_GET['fromdate']);?>&todate=<?php _e($_GET['todate']);?>&persons=1" width="100%" frameborder="0" style="min-height:7500px; width:100%">
<?php } ?>                    
                  
<?php if(ICL_LANGUAGE_CODE=='en') {?>
 <iframe src="http://m.danhostel.dk/en/hostel/hostel-show-rooms?hostel_id=<?php  echo $data['hostel_id_en'];?>&fromdate=<?php _e($_GET['fromdate']);?>&todate=<?php _e($_GET['todate']);?>&persons=1" width="100%" frameborder="0" style="min-height:7500px; width:100%">
<?php } ?>                    

<?php if(ICL_LANGUAGE_CODE=='de') {?>
 <iframe src="http://m.danhostel.dk/de/hostel/hostel-show-rooms?hostel_id=<?php  echo $data['hostel_id_de'];?>&fromdate=<?php _e($_GET['fromdate']);?>&todate=<?php _e($_GET['todate']);?>&persons=1" width="100%" frameborder="0" style="min-height:7500px; width:100%">
 <?php } ?>       
		</div>


    
<?php } else {?> 


	<!-- BEGIN .section -->
	<div class="section clearfix">
		
		<!-- BEGIN .main-content -->
		
        
        
        
        <div class="slider slider-booking" style="z-index:20">
			
			<!-- BEGIN .slides -->
			<ul class="slides">
	
				<?php
					query_posts( "post_type=event&posts_per_page=9999&order=DESC" );

		    		if( have_posts() ) :
					while( have_posts() ) : the_post(); ?>

						<?php	
							// Get slideshow date
							$slideshow_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
							$slideshow_caption = get_the_content();			
						?>
						
						<li style="background-image:url(<?php echo $slideshow_image[0]; ?>);">
						<a href="<?php the_permalink(); ?>" class="main-url">
						
							<?php 
							
							// Display caption if it is set
							if ( $slideshow_caption != '' ) { ?>
							<div class="cwrapper980">
								<div class="flex-caption">
								<h3><?php the_title(); ?></h3>
								<p>
								<?php
								$content = get_the_content();
								echo wp_trim_words( $content, 40 ); ?>
								</p>
								
								<span class="more-link">
								<?php 
								global $data; 
static $DOMAIN = 'qns';
switch(ICL_LANGUAGE_CODE){
	case 'dk':
		$readmore = 'Læs mere';
	break;
	case 'en':
		$readmore = 'Read more';
	break;
	case 'de':
		$readmore = 'Lesen Sie mehr';
	break;
	default:
		$readmore = 'Læs mere';
	break;
} 
echo $readmore; ?> <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></span>
								
								
								</div>
							</div>
							<?php } ?>
							
						</a>
						</li>

					<?php endwhile; endif; ?>
	
			<!-- END .slides -->
			</ul>

		</div>
		
		 <div class="booknow-wrapper-main hidden">	
			<div class="cwrapper980">
				<div class="booknow jshide">
		
    <div class="booknow-wrapper">
    <div class="clearfix">
         <?php if ( $data['licensnogle'] == '465-894-132-489' ){
					if( $data['bookingboksen']!="Nej" ) {   load_template( get_template_directory() . '/includes/booknow.php' ); }
					}
				else { load_template( get_template_directory() . '/includes/booknow.php' );          } ?>
		<!-- END .slider -->
        </div>
        </div>
        </div>
		</div>
		<div class="clearfix"></div>
		</div>
		
		<div class="cwrapper980">
        
        <?php //Display Page Header
		global $wp_query;
		$postid = $wp_query->post->ID;
		echo page_header( get_post_meta($postid, 'qns_page_header_image', true) );
		wp_reset_query();?>

<div class="two-thirds">
              <div class="content-body leftfloater">                    
                  	
			<div class="page-content blog-list-wrapper">
			
            	<h2 class="page-title"><strong><?php the_title(); ?></strong></h2>
				<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
                
				<?php load_template( get_template_directory() . '/includes/loop.php' ); ?>
</div>
</div>
<?php 
if($data['facebookright'] =="Nej" && $data['facebookForside'] =="Ja"){
	load_template( get_template_directory() . '/includes/facebook-right.php' );
}elseif($data['facebookright'] =="Ja" && $data['facebookForside'] =="Ja"){echo '<div class="content-body leftfloater"><div class="borderino"><h2>Facebook kan ikke ligge to steder<h2></div></div>';}
else{}
?>
<?php 
if($data['nyhedleft'] =="Ja"){
load_template( get_template_directory() . '/includes/nyheder-right.php' ); 
}else{}
?>
</div>

<!-- BEGIN Right Column -->      
      <div class="one-third last-col">               
          	<?php if( $data['quicklinksforside']!="Nej" ) { load_template( get_template_directory() . '/includes/quicklinks.php' ); }
			echo '<div class="content-body leftfloater">';
			echo '<div class="borderino">';
			load_template( get_template_directory() . '/includes/kontaktos.php' ); 
			echo '</div>';
			load_template( get_template_directory() . '/includes/map.php' );
			echo '</div>';
          	if($data['facebookForside']=="Nej" && $data['facebookright']=="Ja") { 
          		load_template( get_template_directory() . '/includes/facebook-right.php' ); 
          	}elseif($data['facebookright'] =="Ja" && $data['facebookForside'] =="Ja"){echo '<div class="content-body leftfloater"><div class="borderino"><h2>Facebook kan ikke ligge to steder<h2></div></div>';}
          	else{}
          	load_template( get_template_directory() . '/includes/ikoner.php' ); 
          	load_template( get_template_directory() . '/includes/ratingwidget.php' );
          	load_template( get_template_directory() . '/includes/linkbox.php' ); 
          	load_template( get_template_directory() . '/includes/turistinfo.php' ); ?>
      </div>
       <!-- END Right Column -->
       			</div>
            </div>
        <!-- END .main-content -->
		</div>
	<!-- END .section -->
	</div>
<?php get_footer(); ?>
<?php } ?>