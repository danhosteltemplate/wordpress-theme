<?php

/* ------------------------------------------------
	Theme Setup
------------------------------------------------ */

// setting permissions for the editor
// get the the role object
$role_object = get_role( 'editor' );

// add $cap capability to this role object
$role_object->add_cap( 'edit_theme_options' );


if ( ! isset( $content_width ) ) $content_width = 640;

add_action( 'after_setup_theme', 'qns_setup' );

if ( ! function_exists( 'qns_setup' ) ):

function qns_setup() {

	add_theme_support( 'post-thumbnails' );
	
	if ( function_exists( 'add_theme_support' ) ) {
		add_theme_support( 'post-thumbnails' );
	        set_post_thumbnail_size( "100", "100" );  
	}

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'testimonial-thumb', 65, 65, true );
		add_image_size( 'recent-posts-widget', 66, 66, true );
		add_image_size( 'slideshow-big', 960, 420, true );
		add_image_size( 'blog-thumb-small', 205, 107, true );
		add_image_size( 'blog-thumb-large', 612, 107, true );
		add_image_size( 'accommodation-thumb', 600, 373, true );
		add_image_size( 'accommodation-full', 730, 526, true );
		add_image_size( 'sponsor-thumb', 9999, 77 );
		add_image_size( 'photo-gallery', 293, 188, true );
		add_image_size('large', 1200, 550, true);
	}
	
	add_theme_support( 'automatic-feed-links' );
	
	load_theme_textdomain( 'qns', get_template_directory() . '/languages' );

	$locale = get_locale();
	$locale_file = get_template_directory() . "/languages/$locale.php";
	if ( is_readable( $locale_file ) ) require_once( $locale_file );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'qns' ),
	) );

}
endif;


/* -----------------------------------------------------
	function to redirect after logout
-------------------------------------------------------*/


function logout_redirect765(){
  wp_redirect( home_url() ); 
  exit; 
}


/* -----------------------------------------------------
	hook function  to wp_logout actiont
-------------------------------------------------------*/

add_action('wp_logout','logout_redirect765');

/* -----------------------------------------------------
	REMOVE MY SITES FOR NON SUPER ADMINS
------------------------------------------------------- */


/*add_filter( 'admin_bar_menu', 'my_favorite_actions', 999 );
function my_favorite_actions($wp_toolbar) {
	if( is_super_admin() )
		return $wp_toolbar;
	
	if ( current_user_can('create_users') ) {
 		return $wp_toolbar;
	}
	if( current_user_can('edit_posts') ){
		return $wp_toolbar;
	}

	if( current_user_can('read')){
		$wp_toolbar->remove_node( 'my-sites' );
	}
}*/

/* ------------------------------------------------
	Replace WordPress login logo with your own
-------------------------------------------------*/

add_action('login_head', 'custom_login_logo');
function custom_login_logo() {
    echo '<style type="text/css">
    h1 a { background-image:url('.get_stylesheet_directory_uri().'/images/login.png) !important; background-size: 321px 164px !important;height: 100px !important; width: 311px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
    .login form { margin-top: 10px !important; }
    </style>';
}

function login_logo_url_title() {
  return 'Velkommen til Danhostel';
}
add_filter( 'login_headertitle', 'login_logo_url_title' );

/* ------------------------------------------------
	Add theme info box into WordPress Dashboard
-------------------------------------------------*/
 

function add_dashboard_widgets() {
  wp_add_dashboard_widget('wp_dashboard_widget', 'Danhostel Info: ', 'b3m_theme_info');
}
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );
 
function b3m_theme_info() {
	
	/*echo "<h1><strong>Danhostel Intranet:</strong></h1><a href='http://www.danhostelskabelon.dk'>Gå til Danhostels Intranet</a><br/>";	
	echo 
	
	<script type='text/javascript' src='//www.google.com/trends/embed.js?hl=en-US&q=danhostel&geo=DK,+DE,+SE,+NO&cmpt=geo&tz&tz&content=1&cid=TIMESERIES_GRAPH_AVERAGES_CHART&export=5&w=500&h=330'></script>
	<script type='text/javascript' src='//www.google.com/trends/embed.js?hl=en-US&q=danhostel&geo=DK,+DE,+SE,+NO&cmpt=geo&tz&tz&content=1&cid=GEO_TABLE_0_0&export=5&w=500&h=330'></script>
	<br/>
	<script type='text/javascript' src='//www.google.com/trends/embed.js?hl=en-US&q=danhostel&geo=DK,+DE,+SE,+NO&cmpt=geo&tz&tz&content=1&cid=TOP_QUERIES_0_0&export=5&w=300&h=500'></script>
	<script type='text/javascript' src='//www.google.com/trends/embed.js?hl=en-US&q=danhostel&geo=DK,+DE,+SE,+NO&cmpt=geo&tz&tz&tz&content=1&cid=RISING_QUERIES_0_0&export=5&w=300&h=500'></script>";
	*/
	echo "<a target='_blank' href='https://compressor.io/'><img src='". get_template_directory_uri().  "/images/compressor.png'/></a>
			<h2>Online billede komprimeringsværktøj</h2>
			<p>Billeder der oploades til jeres hjemmesider må maks. være 300kb.</p>
			<p>Måden hvorpå I sørger for det er ved at komprimerer billedet.</p>
			<p>Dette kan I gøre via dette <a target='_blank' href='https://compressor.io/'>link</a></p>";
	echo "<h2>Website Support</h2><p>Hvis der er problemer med din hjemmeside, kan du kontakte os her</p>
	<ul>
	<li><strong>Udviklet af:</strong> Danhostels Webmaster</li>
	<li><strong>Website:</strong> <a target='_blank' href='http://www.danhostel.dk' >www.danhostel.dk</a></li>
	<li><strong>Kontakt:</strong> <a href='mailto:webadmin@danhostel.dk'>webadmin@danhostel.dk</a></li>
	</ul>";
}

/* ------------------------------------------------
	REPLACE HOWDY WITH CUSTOM TEXT
-------------------------------------------------*/	


add_filter('gettext', 'change_howdy', 10, 3); 
function change_howdy($translated, $text, $domain) { 
if (!is_admin() || 'default' != $domain) return $translated; 
if (false !== strpos($translated, 'Howdy')) return str_replace('Howdy', 'Velkommen', $translated); 
return $translated;
}

/* ------------------------------------------------
	REPLACE WP LOGO
-------------------------------------------------*/	

function admin_css() {
echo 'The shit';
}
 
add_action('admin_head','admin_css');

/* ------------------------------------------------
	REMOVE DASHBOARD WIDGETS
-------------------------------------------------*/	

function remove_dashboard_widgets() {

global $wp_meta_boxes;

unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);

remove_action( 'wp_version_check', 'wp_version_check' );
remove_action( 'admin_init', '_maybe_update_core' );
add_filter( 'pre_transient_update_core', create_function( '$a', "return null;" ) );

} 
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );

/* ------------------------------------------------
	ADD FOOTER TEXT
-------------------------------------------------*/	

function change_footer_admin () {
	echo 'Temaet er udviklet af <a href="http://www.danhostel.dk/kontakt-os"> Danhostel </a>';
	}
	   
add_filter('admin_footer_text', 'change_footer_admin');

/* ------------------------------------------------
	Comments Template
------------------------------------------------ */

if( ! function_exists( 'qns_comments' ) ) {
	function qns_comments($comment, $args, $depth) {
	   $path = get_template_directory_uri();
	   $GLOBALS['comment'] = $comment;
	   ?>
	
		<li <?php comment_class('comment_list'); ?> id="li-comment-<?php comment_ID(); ?>">
			<div id="comment-<?php comment_ID(); ?>" class="comment-wrapper">
				<div class="author-image">
					<?php echo get_avatar( $comment, 32 ); ?>
				</div>
				
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<div class="msg success clearfix"><p><?php _e( 'Your comment is awaiting moderation.', 'qns' ); ?></p></div>
				<?php endif; ?>
				
				<p class="comment-author"><?php printf( __( '%s', 'qns' ), sprintf( '%s', get_comment_author_link() ) ); ?>
				<span>
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php printf( __( '%1$s at %2$s', 'qns' ), get_comment_date(),  get_comment_time() ); ?>
					</a>
				</span></p>
				
				<?php comment_text(); ?>
				
				<p><span class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( __( '(Edit)', 'qns' ), ' ' ); ?>
				</span></p>
				
			</div>			

	<?php
	}
}
/* ----------------------------------------------------------
	Page View Count
------------------------------------------------------------- */

function bac_PostViews($post_ID) {
 
    //Set the name of the Posts Custom Field.
    $count_key = 'post_views_count'; 
     
    //Returns values of the custom field with the specified key from the specified post.
    $count = get_post_meta($post_ID, $count_key, true);
     
    //If the the Post Custom Field value is empty. 
    if($count == ''){
        $count = 0; // set the counter to zero.
         
        //Delete all custom fields with the specified key from the specified post. 
        delete_post_meta($post_ID, $count_key);
         
        //Add a custom (meta) field (Name/value)to the specified post.
        add_post_meta($post_ID, $count_key, '0');
        return $count . ' View';
     
    //If the the Post Custom Field value is NOT empty.
    }else{
        $count++; //increment the counter by 1.
        //Update the value of an existing meta key (custom field) for the specified post.
        update_post_meta($post_ID, $count_key, $count);
         
        //If statement, is just to have the singular form 'View' for the value '1'
        if($count == '1'){
        return $count . ' View';
        }
        //In all other cases return (count) Views
        else {
        return $count . ' Views';
        }
    }
}

/* ------------------------------------------------
   Options Panel
------------------------------------------------ */

require_once ('admin/index.php');



/* ------------------------------------------------
	Register Sidebars
------------------------------------------------ */

function qns_widgets_init() {

}

add_action( 'widgets_init', 'qns_widgets_init' );


/* ------------------------------------------------
	Register Menu
------------------------------------------------ */

if( !function_exists( 'qns_register_menu' ) ) {
	function qns_register_menu() {

		register_nav_menus(
		    array(
				'primary' => __( 'Primary Navigation','qns' ),
		    )
		  );
		
	}

	add_action('init', 'qns_register_menu');
}



/* ------------------------------------------------
	Add Description Field to Menu
------------------------------------------------ */

class description_walker extends Walker_Nav_Menu
{
      //function start_el(&$output, $item, $depth, $args)
	  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0) {
				$description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
}



/* ------------------------------------------------
	Get Post Type
------------------------------------------------ */

function is_post_type($type){
    global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}


/* ------------------------------------------------
   Register Dependant Javascript Files
------------------------------------------------ */

add_action('wp_enqueue_scripts', 'qns_load_js');

function load_marquee_scripts(){
//wp_register_script('jquery', 'http://code.jquery.com/jquery-1.11.0.min.js');
	wp_register_script('marquee_js', get_template_directory_uri().'/slider/js/marquee.js', array('jquery'));
	//wp_enqueue_script('jquery');
	wp_enqueue_script('marquee_js');
}
	
add_action('wp_enqueue_scripts', 'load_marquee_scripts');

if( ! function_exists( 'qns_load_js' ) ) {
	function qns_load_js() {

		if ( is_admin() ) {
			
		}
		else {

			
			// Load JS		
			/*
			wp_register_script( 'jquery_ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js',  array( 'jquery' ), '1.8', true );
			wp_register_script( 'jquery_uicore', get_template_directory_uri() . '/js/jquery.ui.core.js', array( 'jquery' ), '3.1.4', true );
			wp_register_script( 'jquery_uiwidget', get_template_directory_uri() . '/js/jquery.ui.widget.js', array( 'jquery' ), '3.1.4', true );
			wp_register_script( 'jquery_uidatepicker', get_template_directory_uri() . '/js/jquery.ui.datepicker.js', array( 'jquery' ), '3.1.4', true );*/
			
			wp_register_script( 'jquery_ui', get_template_directory_uri() . '/js/ui/jquery-ui.min.js', array( 'jquery' ), '3.1.4', true );
			
			
			wp_register_script( 'googlemap', 'http://maps.google.com/maps/api/js?key=AIzaSyDJ4RXyagO7wB23A_Q9HQpuSht90rqD8pQ&sensor=false', '1.8', true );
			
			
			wp_register_script( 'prettyphoto', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array( 'jquery' ), '3.1.4', true );
			//wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.4.8', true );
			wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), '2.1', true );
			wp_register_script( 'dateprice', get_template_directory_uri() . '/js/dateprice.js', array( 'jquery' ), '1.1.9', true );
			wp_register_script( 'selectivizr', get_template_directory_uri() . '/js/selectivizr-min.js', array( 'jquery' ), '1.0.2', true );
						
			wp_register_script( 'jquery_ui', get_template_directory_uri() . '/js/ui/jquery-ui.min.js', array( 'jquery' ), '1', true );
			
			wp_register_script( 'custom', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1', true );

			wp_enqueue_script( array( 'googlemap','jquery_ui', 'prettyphoto', 'superfish', 'flexslider', 'custom' ), array(), false, true );

			wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/lightbox/js/jquery.fancybox.pack.js', array( 'jquery' ), false, true );
   			wp_enqueue_script( 'lightbox', get_template_directory_uri() . '/lightbox/js/lightbox.js', array( 'fancybox' ), false, true );
			wp_enqueue_style( 'lightbox-style', get_template_directory_uri() . '/lightbox/css/jquery.fancybox.css' );
	
			global $is_IE;
			
			if( $is_IE ) wp_enqueue_script( 'selectivizr' );
			
			if( is_page_template('template-booking.php') ) wp_enqueue_script( 'dateprice' );
			if( is_single() ) wp_enqueue_script( 'comment-reply' );
			
			// Load CSS
			wp_enqueue_style('superfish', get_template_directory_uri() .'/css/superfish.css');
			wp_enqueue_style('prettyPhoto', get_template_directory_uri() .'/css/prettyPhoto.css');
			wp_enqueue_style('flexslider', get_template_directory_uri() .'/css/flexslider.css');
			//wp_enqueue_style('jquery_datepicker', get_template_directory_uri() .'/css/jqueryui/jquery.ui.datepicker.css');
			wp_enqueue_style('jquery_ui', get_template_directory_uri() .'/css/ui/jquery-ui.min.css');
			wp_enqueue_style('responsive', get_template_directory_uri() .'/css/responsive.css');
			wp_enqueue_style('responsive', get_template_directory_uri() .'/css/smof.css');
			wp_enqueue_style( 'font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
			
			// Load Fonts
			wp_enqueue_style('fontHead','https://fonts.googleapis.com/css?family=Raleway');
			//wp_enqueue_style('fontBody','http://fonts.googleapis.com/css?family=PT+Sans');
			
			global $data; //fetch options stored in $data
			
			if ( $data['licensnogle'] == '465-894-132-489' ){

			if ( $data['base_color'] == 'Danhostel Blå' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/standard.css');
			elseif ( $data['base_color'] == 'Camping Grøn' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/groen.css');
			elseif ( $data['base_color'] == 'Mødelokaler Blå' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/moedelokalerbla.css');
			elseif ( $data['base_color'] == 'Urban Rød' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/rod.css');
			elseif ( $data['base_color'] == 'City Sort' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/sort.css');
			elseif ( $data['base_color'] == 'Sunshine Gul' ) :
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/gul.css');
			else : 
				wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/standard.css');
			endif;
			
			}
			else{wp_enqueue_style('color', get_template_directory_uri() .'/css/colours/standard.css');}
		}
	}
}

/*if( !function_exists( 'custom_js' ) ) {

    function custom_js() {
		
		global $data; //fetch options stored in $data
		
		echo '<script>';
		
		// Set slideshow autoplay on/off
		echo 'var slideshow_autoplay = 3000;';

			
		// Set Google Map Lat	
		if ( $data['gmap-top-lat'] ) :
			echo 'var mapLat = ' . $data['gmap-top-lat'] . ';';
		else :	
			echo 'var mapLat = ' . $data['gmap-top-lat'] . ';';
		endif;
		
		// Set Google Map Lng	
		if ( $data['gmap-top-lng'] ) :
			echo 'var mapLng = ' . $data['gmap-top-lng'] . ';';
		else :	
			echo 'var mapLng = ' . $data['gmap-top-lng'] . ';';
		endif;
		
		// Set Google Map Marker Content
		if ( $data['gmap-top-content'] ) : ?>
			var mapContent = "<?php _e( $data['gmap-top-content'],'qns'); ?>";
		<?php else :	
			echo "var mapContent = '<h2>Danhostel Herning</h2><p>Lyren 6, Padborg</p>';";
		endif;
		
		
		$msgSelectRoom = __('Please select a room','qns');
		$msgSelectArrDate = __('Please select a "Arrival" date','qns');
		$msgSelectDepDate = __('Please select a "Departure" date','qns');
		$msgArrDepMatch = __('The "Arrival" and "Departure" dates cannot match one another','qns');
		$msgDepBeforeArr = __('The "Departure" date cannot be before the "Arrival" date','qns');
		
		echo "var msgSelectRoom = '" . $msgSelectRoom . "';";
		echo "var msgSelectArrDate = '" . $msgSelectArrDate . "';";
		echo "var msgSelectDepDate = '" . $msgSelectDepDate . "';";
		echo "var msgArrDepMatch = '" . $msgArrDepMatch . "';";
		echo "var msgDepBeforeArr = '" . $msgDepBeforeArr . "';";
		
		echo 'var goText = "' . __('Menu','qns') . '";';
		
		// Set Google Map Marker Content
		/*if ( $data['datepickerformat'] == 'yyyy-mm-dd' ) {
			echo "var datepickerformat = 'yyyy-mm-dd';";
		 } else {
			echo "var datepickerformat = 'yyyy-mm-dd';";
		}
		
		echo "</script>\n\n";
		
    }

}

add_action('wp_footer', 'custom_js');
*/

/* ------------------------------------------------
   REWRITE UPLOAD ERROR MESSAGE
------------------------------------------------ */

if ( ! function_exists( 'wp_handle_upload_error' ) ) {
    function wp_handle_upload_error( &$file, $message ) {
        return array( 'error'=>$message );
    }
}

/* ------------------------------------------------
   Load Files
------------------------------------------------ */

// Meta Boxes
//include (TEMPLATEPATH . '/slider/php/marquee_functions_include.php');
include 'functions/events_meta.php';

// Shortcodes
//include 'functions/shortcodes/slideshow.php';
include 'functions/shortcodes/accordion.php';
include 'functions/shortcodes/googlemap.php';
include 'functions/shortcodes/toggle.php';
include 'functions/shortcodes/list.php';
include 'functions/shortcodes/button.php';
include 'functions/shortcodes/columns.php';
include 'functions/shortcodes/video.php';
include 'functions/shortcodes/title.php';
include 'functions/shortcodes/message.php';
include 'functions/shortcodes/dropcap.php';
include 'functions/shortcodes/tabs.php';


// Widgets
/*include 'functions/widgets/widget-booking.php';
include 'functions/widgets/widget-flickr.php';
include 'functions/widgets/widget-tags.php';
include 'functions/widgets/widget-recent-posts.php';
*/
// Languages


/* ------------------------------------------------
	Custom CSS
------------------------------------------------ */

function custom_css() {
	}

function admin_styles() {
	wp_enqueue_style('admin-css', get_template_directory_uri().'/css/admin.css');
}



/* ------------------------------------------------
	Remove width/height dimensions from <img> tags
------------------------------------------------ */

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
add_filter('wp_get_attachment_link', 'remove_thumbnail_dimensions', 10, 1);

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



/* ------------------------------------------------
	Remove rel attribute from the category list
------------------------------------------------ */

function remove_category_list_rel($output)
{
  $output = str_replace(' rel="category"', '', $output);
  return $output;
}
add_filter('wp_list_categories', 'remove_category_list_rel');
add_filter('the_category', 'remove_category_list_rel');



/* -----------------------------------------------------
	Remove <p> / <br> tags from nested shortcode tags
----------------------------------------------------- */

add_filter('the_content', 'shortcode_fix');
function shortcode_fix($content)
{   
    $array = array (
        '<p>[' => '[', 
        ']</p>' => ']', 
        ']<br />' => ']'
    );

    $content = strtr($content, $array);

	return $content;
}



/* ------------------------------------------------
	Excerpt Length
------------------------------------------------ */

function qns_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'qns_excerpt_length' );


/* ------------------------------------------------
	Excerpt More Link
------------------------------------------------ */

function qns_continue_reading_link() {
	
	// Don't Display Read More Button On Search Results / Archive Pages
	if ( is_post_type( "accommodation" )) {
		$btn_text = __('Læs mere', 'qns');
	}
	else {
		switch(ICL_LANGUAGE_CODE){
			case 'dk' :
			$btn_text = __('Læs mere', 'qns');
			break;	
			case 'de' :
			$btn_text = __('Weiter lesen', 'qns');
			break;	
			case 'en' :
			$btn_text = __('Read more', 'qns');
			break;
			default:
			$btn_text = __('Læs mere', 'qns');
			break;
		}
	}
	
	if ( !is_search() && !is_archive() ) {
		return ' <a href="'. get_permalink() . '"' . __( ' class="button2">' . $btn_text . ' &raquo;</a>', 'qns' );
	}
	
}

function qns_auto_excerpt_more( $more ) {
	return qns_continue_reading_link();
}
add_filter( 'excerpt_more', 'qns_auto_excerpt_more' );



/* ------------------------------------------------
	The Title
------------------------------------------------ */

function qns_filter_wp_title( $title, $separator ) {
	
	if ( is_feed() )
		return $title;

	global $paged, $page;

	if ( is_search() ) {
		$title = sprintf( __( 'Search results for %s', 'qns' ), '"' . get_search_query() . '"' );
		if ( $paged >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'qns' ), $paged );
		$title .= " $separator " . home_url( 'name', 'display' );
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $separator " . $site_description;

	if ( $paged >= 2 || $page >= 2 )
		$title .= " $separator " . sprintf( __( 'Page %s', 'qns' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'qns_filter_wp_title', 10, 2 );



/* ------------------------------------------------
	Sidebar Position
------------------------------------------------ */

function sidebar_position( $position ) {}



/* ------------------------------------------------
	Menu Fallback
------------------------------------------------ */

function wp_page_menu_qns( $args = array() ) {
	$defaults = array('sort_column' => 'menu_order, post_title', 'menu_class' => 'menu', 'echo' => true, 'link_before' => '', 'link_after' => '');
	$args = wp_parse_args( $args, $defaults );
	$args = apply_filters( 'wp_page_menu_qns_args', $args );

	$menu = '';

	$list_args = $args;

	// Show Home in the menu
	if ( ! empty($args['show_home']) ) {
		if ( true === $args['show_home'] || '1' === $args['show_home'] || 1 === $args['show_home'] )
			$text = __('Home','qns');
		else
			$text = $args['show_home'];
		$class = '';
		if ( is_front_page() && !is_paged() )
			$class = 'class="current_page_item"';
		$menu .= '<li ' . $class . '><a href="' . home_url( '/' ) . '" title="' . esc_attr($text) . '">' . $args['link_before'] . $text . $args['link_after'] . '</a></li>';
		// If the front page is a page, add it to the exclude list
		if (get_option('show_on_front') == 'page') {
			if ( !empty( $list_args['exclude'] ) ) {
				$list_args['exclude'] .= ',';
			} else {
				$list_args['exclude'] = '';
			}
			$list_args['exclude'] .= get_option('page_on_front');
		}
	}

	$list_args['echo'] = false;
	$list_args['title_li'] = '';
	$menu .= str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages($list_args) );

	if ( $menu )
		$menu = '<ul id="main-menu" class="fl">' . $menu . '</ul>';

	$menu = $menu . "\n";
	$menu = apply_filters( 'wp_page_menu_qns', $menu, $args );
	if ( $args['echo'] )
		echo $menu;
	else
		return $menu;
}

/* ------------------------------------------------
	Password Protected Post Form
------------------------------------------------ */

add_filter( 'the_password_form', 'qns_password_form' );

function qns_password_form() {
	
	global $post;
	$label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
	$form = '<div class="msg fail clearfix"><p class="nopassword">' . __( 'This post is password protected. To view it please enter your password below', 'qns' ) . '</p></div>
<form class="protected-post-form" action="' . get_option('siteurl') . '/wp-pass.php" method="post"><label for="' . $label . '">' . __( 'Password', 'qns' ) . ' </label><input name="post_password" id="' . $label . '" type="password" size="20" /><div class="clearboth"></div><input id="submit" type="submit" value="' . esc_attr__( "Submit" ) . '" name="submit"></form>';
	return $form;
	
}



/* ------------------------------------------------
	Google Fonts
------------------------------------------------ */

function google_fonts() {}



/* ------------------------------------------------
	Page Header
------------------------------------------------ */

function page_header( $url ) {
	
	global $data; //fetch options stored in $data
	
	$header_url = '';
	
	// If custom page header is set
	if ( $url != '' ) {
		$header_url = $url;
	}
	
	// If default page header is set and custom header is not set
	if ( $data['default_header_url'] && $url == '' ) {
		$header_url = $data['default_header_url'];
	}
	
	// If either of the above is set
	if ( $header_url != '' ) :
		$output = '';	
		$output .= '<!-- BEGIN #page-header -->';
		$output .= '<div id="page-header">';
		$output .= '<img src="' . $header_url . '" alt="" />';
		$output .= '<!-- END #page-header -->';
		$output .= '</div>';
		return $output;
	endif;
	
}



/* ------------------------------------------------
	Email Validation
------------------------------------------------ */

function valid_email($email) {
	
	$result = TRUE;
	
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
    	$result = FALSE;
	}
  	
	return $result;
	
}

/*--------------------------------------------------

 --------------------------------------------------*/
 
 function enable_more_buttons($buttons) {

$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
$buttons[] = 'styleselect';
$buttons[] = 'backcolor';
$buttons[] = 'newdocument';
$buttons[] = 'cut';
$buttons[] = 'copy';
$buttons[] = 'charmap';
$buttons[] = 'hr';
$buttons[] = 'visualaid';

return $buttons;
}
add_filter('mce_buttons_3', 'enable_more_buttons');


/* ------------------------------------------------
	Add PrettyPhoto for Attached Images
------------------------------------------------ */

/*add_filter( 'wp_get_attachment_link', 'sant_prettyadd');
function sant_prettyadd ($content) {
     $content = preg_replace("/<a/","<a
rel=\"prettyPhoto[slides]\"",$content,1);
     return $content;
}*/
add_shortcode( 'gallery', 'my_gallery_shortcode' );

function my_gallery_shortcode( $atts )
{
    $atts['link'] = 'file';
    return gallery_shortcode( $atts );
}

/* ------------------------------------------------
	Analytics Dashboard
------------------------------------------------ */

function so_screen_layout_columns( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}
add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );

function so_screen_layout_dashboard() {
    return 1;
}
add_filter( 'get_user_option_screen_layout_dashboard', 'so_screen_layout_dashboard' );


remove_action('welcome_panel', 'wp_welcome_panel');



function example_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
 	global $wp_meta_boxes;

	// Remove the incomming links widget
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);	

	// Remove right now
		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	  	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
  		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
  		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
  		unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
		unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
		unset($wp_meta_boxes['dashboard']['side']['core']['jwl_user_tinymce_dashboard_widget']);	
		unset($wp_meta_boxes['dashboard']['side']['core']['icl_dashboard_widget']);		
}
 
// Hoook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

// Remove WPML Widget
function wpml_remove_dashboard_widget() {
    remove_meta_box( 'icl_dashboard_widget', 'dashboard', 'side' );
}
add_action('wp_dashboard_setup', 'wpml_remove_dashboard_widget' );


function rsssl_exclude_http_url($html) {
  $html = str_replace("https://m.danhostel.dk", "http://m.danhostel.dk", $html);
  $html = str_replace("https://www.danhostel.dk", "http://www.danhostel.dk", $html);
  return $html;
}
add_filter("rsssl_fixer_output","rsssl_exclude_http_url");



