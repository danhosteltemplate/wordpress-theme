<?php
/*
function create_post_type_slideshow() {
	
	register_post_type('slideshow', 
		array(
			'labels' => array(
				'name' => __( 'Forside Slideshow', 'qns' ),
                'singular_name' => __( 'Forside Slideshow', 'qns' ),
				'add_new' => __('Tilføj Nyt', 'qns' ),
				'add_new_item' => __('Tilføj Nyt Slideshow' , 'qns' )
			),
		'public' => true,
		'menu_position' => 5,
		'menu_icon' => get_template_directory_uri() .'/images/admin/slide-icon.png',
		'rewrite' => array(
			'slug' => 'slideshow'
		), 
		'supports' => array( 'title','thumbnail'),
	));
}

add_action( 'init', 'create_post_type_slideshow' );



// Add the Meta Box  
function add_slideshow_meta_box() {  
    add_meta_box(  
        'slideshow_meta_box', // $id  
        'Slideshow', // $title  
        'show_slideshow_meta_box', // $callback  
        'slideshow', // $page  
        'normal', // $context  
        'high'); // $priority  
}  
add_action('add_meta_boxes', 'add_slideshow_meta_box');

*/

// Field Array  
$prefix = 'qns_';  
$slideshow_meta_fields = array(  
    array(  
        'label'=> 'Tekst',  
        'desc'  => 'Her kan du skrive en lille tekst som vises ovenpå billedet',  
        'id'    => $prefix.'slideshow_caption',  
        'type'  => 'text'
    ),

	array(  
        'label'=> 'Link',  
        'desc'  => "Du kan vælge at bruge din billede som en link. Indtast URL til den side du vil linke til. (husk http://)",  
        'id'    => $prefix.'slideshow_link',  
        'type'  => 'text'
    )
        
);

// add some custom js to the head of the page
add_action('admin_head','admin_styles');

// The Callback  
function show_slideshow_meta_box() {  
global $slideshow_meta_fields, $post;  
// Use nonce for verification  
echo '<input type="hidden" name="slideshow_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
  

	foreach ($slideshow_meta_fields as $field) {  
        // get value of this field if it exists for this post  
        $meta = get_post_meta($post->ID, $field['id'], true);  
        
		echo '<div class="section">';

        echo '<h3 class="heading">'.$field['label'].'</h3>';  
                switch($field['type']) {  
					
					// text  
					case 'text':  
					    echo '<div class="control-area"><input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /></div>
					        <div class="label-area">'.$field['desc'].'</div>
							<div class="clearboth"></div>';  
					break;

					// textarea  
					case 'textarea':  
					    echo '<div class="control-area"><textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea></div>
					        <div class="label-area">'.$field['desc'].'</div>
							<div class="clearboth"></div>';  
					break;

					// checkbox  
					case 'checkbox':  
					    echo '<div class="control-area"><input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/></div>
					        <div class="label-area">'.$field['desc'].'</div>
							<div class="clearboth"></div>';  
					break;

					// select  
					case 'select':  
					    echo '<div class="control-area">
					<div class="select_wrapper"><select name="'.$field['id'].'" id="'.$field['id'].'">';  
					    foreach ($field['options'] as $option) {  
					        echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>';  
					    }  
					    echo '</select></div></div>
					<div class="label-area">'.$field['desc'].'</div>
					<div class="clearboth"></div>';  
					break;
					
					// date
					case 'date':
						echo '<div class="control-area"><input type="text" class="datepicker" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /></div>
								<div class="label-area">'.$field['desc'].'</div>
								<div class="clearboth"></div>';
					break;
					
			
                
			} //end switch  
			
			echo '</div>';
			
    } // end foreach  
	
	echo '<div class="clearboth admin-bottom"></div>';

}



// Save the Data  
function save_slideshow_meta($post_id) {  
    global $slideshow_meta_fields;  
  	
	$post_data = '';
	
	if(isset($_POST['slideshow_meta_box_nonce'])) {
		$post_data = $_POST['slideshow_meta_box_nonce'];
	}

    // verify nonce  
    if (!wp_verify_nonce($post_data, basename(__FILE__)))  
        return $post_id;

    // check autosave  
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)  
        return $post_id;

    // check permissions  
    if ('page' == $_POST['post_type']) {  
        if (!current_user_can('edit_page', $post_id))  
            return $post_id;  
        } elseif (!current_user_can('edit_post', $post_id)) {  
            return $post_id;  
    }  
  
    // loop through fields and save the data  
    foreach ($slideshow_meta_fields as $field) {  
        $old = get_post_meta($post_id, $field['id'], true);  
        $new = $_POST[$field['id']];  
        if ($new && $new != $old) {  
            update_post_meta($post_id, $field['id'], $new);  
        } elseif ('' == $new && $old) {  
            delete_post_meta($post_id, $field['id'], $old);  
        }  
    } // end foreach   
}  
add_action('save_post', 'save_slideshow_meta');


?>