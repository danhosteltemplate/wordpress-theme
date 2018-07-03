<?php get_header(); ?>
<?php //Display Page Header
	global $wp_query;
	$postid = $wp_query->post->ID;
	echo page_header( get_post_meta($postid, 'qns_page_header_image', true) );
	wp_reset_query();
?>
	<!-- BEGIN .section -->
	<div class="section clearfix">
		<!-- BEGIN .main-content -->
		<div class="cwrapper980">
			<div class="two-thirds">
            <div class="content-body leftfloater">               
			<div class="page-content blog-list-wrapper">
            <h2 class="page-title"><strong><?php the_title(); ?></strong></h2>
			<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
			<?php load_template( get_template_directory() . '/includes/loop.php' ); ?>
            </div>   
            </div>
            </div>
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
			<?php if ($data['nyhedright']=="Ja"){load_template( get_template_directory() . '/includes/nyheder-right.php' ); }?>
			<?php load_template( get_template_directory() . '/includes/turistinfo.php' ); ?>
        	</div>
            </div>
            </div>
        <!-- END .main-content -->
		</div>
	<!-- END .section -->
	</div>
<?php get_footer(); ?>