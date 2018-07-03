<?php get_header(); ?>

<?php //Display Page Header
global $data;

global $wp_query;
$postid = $wp_query->post->ID;
echo page_header( get_post_meta($postid, 'qns_page_header_image', true) );
wp_reset_query();
?>

<!-- BEGIN .section -->
<div class="section clearfix">

<!-- BEGIN .main-content -->

<?php if( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="cwrapper980">

<div class="two-thirds">
<div class="content-body leftfloater">                    
<div class="page-content blog-list-wrapper">
<h2 class="page-title"><strong><?php the_title(); ?></strong></h2>
    <div class="undertitle bordertop2px" style="width:100%; height:13px;"></div>
    <!-- BEGIN .event-prev -->	
        <div class="event-prev event-single clearfix" style="margin-bottom: 20px;">
         <ul class="share-buttons">
      <li><a href="http://www.facebook.com/share.php?u=<full page url to share" onClick="return fbs_click(400, 300)" target="_blank" title="Share This on Facebook">Del på Facebook</a></li>
      </ul>
        <?php // Get the Thumbnail URL
        if (wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full-size')) {
        $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full-size' );
        echo '<img src="' . $src[0] . '" alt="" class="prev-image"/>';}
        ?>
        
        <?php the_content(); ?>
            <!-- <div class="fb-comments"data-href="<?php the_permalink(); ?>" data-num-posts="2" mobile="false"></div> 
                <style>.fb-comments, .fb-comments iframe[style], .fb-like-box, .fb-like-box iframe[style] {width: 100% !important;}
                .fb-comments span, .fb-comments iframe span[style], .fb-like-box span, .fb-like-box iframe span[style] {width: 100% !important;}
                </style> -->
                <!-- END .event-prev -->
            </div>
        </div>
    </div>
</div>

<?php endwhile; endif; ?>
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
        <?php load_template( get_template_directory() . '/includes/turistinfo.php' );
    ?>   
</div>
</div>
<!-- END .section -->
</div>
<?php get_footer(); ?>