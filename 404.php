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
		<div class="cwrapper960">
        
			<div class="two-thirds">
              <div class="content-body leftfloater">                    
                  	
			<div class="page-content blog-list-wrapper">
			
            	<h2 class="page-title"><strong class="borderbottom4px" style="padding-bottom:12px;">				<?php _e('Siden kunne ikke findes', 'qns'); ?>
</strong></h2>
				<div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
                

				<p><?php echo __('Siden kunne ikke findes','qns') . ' <a href="' . home_url() . '">' . __('Tilbage til forsiden</a>', 'qns') ?></p>
                </div>
                
                </div>
                
                </div>

                    <div class="one-third last-col">               
                   				<?php load_template( get_template_directory() . '/includes/booknow.php' ); ?>
                                <?php if( $data['quicklinksallesider']!="Nej" ) { load_template( get_template_directory() . '/includes/quicklinks.php' ); } ?>
                				<?php load_template( get_template_directory() . '/includes/kontaktos.php' ); ?>
                                <?php load_template( get_template_directory() . '/includes/ikoner.php' ); ?>
                 				<?php load_template( get_template_directory() . '/includes/nyheder-right.php' ); ?>
                                <?php load_template( get_template_directory() . '/includes/turistinfo.php' ); ?>


			</div>
                    </div>

            </div>

        <!-- END .main-content -->
		</div>

		
	<!-- END .section -->
	</div>

<?php get_footer(); ?>