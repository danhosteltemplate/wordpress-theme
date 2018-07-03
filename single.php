<?php
	
	if (  is_post_type( "event" )) {
		load_template(get_template_directory().'/single-nyheder.php');
	}
	else {
		load_template(get_template_directory().'/page.php');
	}

?>