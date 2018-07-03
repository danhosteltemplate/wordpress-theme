<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories = array();  
		$of_categories_obj = get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp = array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages = array();
		$of_pages_obj = get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp = array_unshift($of_pages, "Select a page:");       
	
		//Testing 
		$of_options_select = array("one","two","three","four","five"); 
		$of_options_radio = array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		// Colour choices
		$colour_array = array("Danhostel Blå","Mødelokaler Blå","Camping Grøn","Urban Rød","City Sort","Sunshine Gul");

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr = wp_upload_dir();
		$all_uploads_path = $uploads_arr['path'];
		$all_uploads = get_option('of_uploads');
		$other_entries = array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat = array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos = array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

// General Settings
/*$of_options[] = array( "name" => "Indstilinger",
                    "type" => "heading");
					
$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => "Logo",
						"desc" => "",
						"id" => "image_logo",
						"type" => "upload");*/
				

// Contact Options
$of_options[] = array( "name" => "Kontakt",
					"type" => "heading");

$of_options[] = array( "name" => "Sted Navn",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "sted_navn",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Åbningstider",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "office_hours",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Adresse",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "street_address",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Telefonnummer",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "phone_number",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Email",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "email_address",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Vært",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "vaert",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "CVR",
					"desc" => "Den bliver vist i kontakt boksen",
					"id" => "cvr",
					"std" => "",
					"type" => "text");
											
$of_options[] = array( "name" => "Google 360 eller YouTube",
					"desc" => 'iframe med width=100%',
					"id" => "gmap_360",
					"std" => "",
					"type" => "textarea");

					
$of_options[] = array( "name" => "Google Map Latitude",
					"desc" => "",
					"id" => "gmap-top-lat",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Google Map Longitude",
					"desc" => "",
					"id" => "gmap-top-lng",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Google Map Marker",
					"desc" => 'fx: <h2>Danhostel Herning</h2><p>Lyren 6, Padborg</p>',
					"id" => "gmap-top-content",
					"std" => "<h2>Danhostel Herning</h2><p>Lyren 6, Padborg</p>",
					"type" => "textarea");

//Nyheder
$of_options[] = array( "name" => "Nyheder",
                    "type" => "heading");
					
$of_options[] = array( "name" => "Hvor mange nyheder skal vi vise i oversigtsiden?",
					"desc" => "fx: 10",
					"id" => "items_per_page",
					"std" => "10",
					"type" => "text");

$of_options[] = array( "name" => "Skal nyhedsboksen vises i den højre kolonne?",
					"desc" => "",
					"id" => "nyhedright",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));		
$of_options[] = array( "name" => "Skal nyhedsboksen vises på forsiden?",
					"desc" => "",
					"id" => "nyhedleft",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));	

/*--------------------------------
* Hostel ID
----------------------------------*/

$of_options[] = array( "name" => "Bookingbox Indstillinger",
					"type" => "heading");

$of_options[] = array( "name" => "Skal booking boksen være tilgængelig?",
					"desc" => "",
					"id" => "bookingboksen",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));


$of_options[] = array( "name" => "Hostel ID",
					"desc" => "fx: 730",
					"id" => "hostel_id",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => "EN: Hostel ID",
					"desc" => "fx: 730",
					"id" => "hostel_id_en",
					"std" => "",
					"type" => "text");
$of_options[] = array( "name" => "DE: Hostel ID",
					"desc" => "fx: 730",
					"id" => "hostel_id_de",
					"std" => "",
					"type" => "text");

// Social Options

$of_options[] = array( "name" => "Social Sharing",
					"type" => "heading");

$of_options[] = array( "name" => "Facebook",
					"desc" => "URL med http://",
					"id" => "social_facebook",
					"std" => "",
					"type" => "text");
					
										
$of_options[] = array( "name" => "Vis Facebook Nyhedsboksen i højre kolonne",
					"desc" => "",
					"id" => "facebookright",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));
					
$of_options[] = array( "name" => "Vis Facebook Nyhedsboksen midt på forsiden",
					"desc" => "",
					"id" => "facebookForside",
					"std" => "Nej",
					"type" => "select",
					"options" => array("Ja","Nej"));
					
$of_options[] = array( "name" => "Skal Facebook posts vises?",
					"desc" => "",
					"id" => "facebookposts",
					"std" => "Nej",
					"type" => "select",
					"options" => array("Ja","Nej"));	

$of_options[] = array( "name" => "Googleplus",
					"desc" => "URL med http://",
					"id" => "social_googleplus",
					"std" => "",
					"type" => "text");

//Certificeringer
$of_options[] = array( "name" => "Certificeringer",
                    "type" => "heading");
$of_options[] = array( "name" => "Er din vandrerhjem kursus certificeret?",
					"desc" => "",
					"id" => "kursuscertificeret",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));		
					
$of_options[] = array( "name" => "Er din vandrerhjem Nem Adgang certificeret?",
					"desc" => "",
					"id" => "nemadgang",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));	
					
$of_options[] = array( "name" => "Find smiley link",
					"desc" => "",
					"id" => "linksmiley",
					"std" => "",
					"type" => "textarea");	

/* -----------------------------
**	Rating ID
-------------------------------*/
$of_options[] = array( "name" => "Rating widget",
					"type" => "heading");
					

$of_options[] = array( "name" => "Rating ID",
					"desc" => "F.eks: COPCITY",
					"id" => "ratingid",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Skal boksen med ratings vises på hjemmesiden?",
					"desc" => "",
					"id" => "visrating",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));	
					
$of_options[] = array( "name" => "Skal boksen med ratings være små eller stor?",
					"desc" => "",
					"id" => "ratingsize",
					"std" => "small",
					"type" => "select",
					"options" => array("small","big"));	
										
$of_options[] = array( "name" => "Danhostel profilside",
					"desc" => "F.eks: http://www.danhostel.dk/hostel/danhostel-copenhagen-city",
					"id" => "profilside",
					"std" => "",
					"type" => "text");

//Turist info
$of_options[] = array( "name" => "Turist info",
                    "type" => "heading");

$of_options[] = array( "name" => "Skal boksen med turist info vises på hjemmesiden?",
					"desc" => "",
					"id" => "visturistinfo",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));	
					
$of_options[] = array( "name" => "Turist Info",
						"desc" => "",
						"id" => "turistinfo",
						"type" => "upload");
						
$of_options[] = array( "name" => "Turist Info URL",
					"desc" => "fx: http://visitdanmark.dk",
					"id" => "turistlink",
					"std" => "",
					"type" => "text");

//Danhostel linksystem
$of_options[] = array( "name" => "Danhostel Linksystem",
                    "type" => "heading");
					
$of_options[] = array( "name" => "Danhostel Linksystem: Tekst Link 1",
					"desc" => "fx: Danhostel Padborg",
					"id" => "text1",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Danhostel Linksystem: URL Link 1",
					"desc" => "fx: http://danhostelfrederikshavn.dk",
					"id" => "link1",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Danhostel Linksystem: Tekst Link 2",
					"desc" => "fx: Danhostel Padborg",
					"id" => "text2",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Danhostel Linksystem: URL Link 2",
					"desc" => "fx: http://danhostelfrederikshavn.dk",
					"id" => "link2",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Danhostel Linksystem: Tekst Link 3",
					"desc" => "fx: Danhostel Padborg",
					"id" => "text3",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Danhostel Linksystem: URL Link 3",
					"desc" => "fx: http://danhostelfrederikshavn.dk",
					"id" => "link3",
					"std" => "",
					"type" => "text");
					
//quick links
$of_options[] = array( "name" => "Quick links",
                    "type" => "heading");
					
$of_options[] = array( "name" => "Vis quick links på forsiden?",
					"desc" => "",
					"id" => "quicklinksforside",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));		

$of_options[] = array( "name" => "Vis quick links på alle sider?",
					"desc" => "",
					"id" => "quicklinksallesider",
					"std" => "Ja",
					"type" => "select",
					"options" => array("Ja","Nej"));		
		
$of_options[] = array( "name" => "Quick link 1: tekst",
					"desc" => "fx: kontrol rapport",
					"id" => "ql_text1",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Quick link 1: link",
					"desc" => "fx: http://kontrolrapport.dk",
					"id" => "ql_link1",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Quick Link 2: tekst",
					"desc" => "fx: Kontrol rapport",
					"id" => "ql_text2",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Quick Link 2: link",
					"desc" => "fx: http://kontrolrapport.dk",
					"id" => "ql_link2",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Quick Link 3: tekst",
					"desc" => "fx: Kontrol rapport",
					"id" => "ql_text3",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Qiuck Link 3: link",
					"desc" => "fx: http://kontrolrapport.dk",
					"id" => "ql_link3",
					"std" => "",
					"type" => "text");

$of_options[] = array( "name" => "Quick Link 4: tekst",
					"desc" => "fx: Kontrol rapport",
					"id" => "ql_text4",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Quick Link 4: link",
					"desc" => "fx: http://kontrolrapport.dk",
					"id" => "ql_link4",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Quick Link 5: tekst",
					"desc" => "fx: Kontrol rapport",
					"id" => "ql_text5",
					"std" => "",
					"type" => "text");
					
$of_options[] = array( "name" => "Quick Link 5: link",
					"desc" => "fx: http://kontrolrapport.dk",
					"id" => "ql_link5",
					"std" => "",
					"type" => "text");			
					
// Ekstra Forretningsområde Options

 $of_options[] = array( "name" => "Ekstra Forretningsområde",
					"type" => "heading");
	
$of_options[] = array( "name" => "Licens",
					"desc" => "For at bruge Danhostels skabelon for flere forretningsområder du har brug for en licens nøgle.",
					"id" => "licensnogle",
					"std" => "000-000-000-000",
					"type" => "text");

$url =  ADMIN_DIR . 'assets/images/';
$of_options[] = array( "name" => "Logo",
						"desc" => "",
						"id" => "image_logo",
						"type" => "upload");
										
$url =  ADMIN_DIR . 'assets/images/';

$of_options[] = array( "name" => "Logo Ekstra forretning",
						"desc" => "",
						"id" => "image_logo_right",
						"type" => "upload");

$of_options[] = array( "name" => "Link",
					"desc" => "F.eks: http://www.danhostel.dk/",
					"id" => "link_forretning",
					"std" => "http://www.danhostel.dk/",
					"type" => "text");
											
$of_options[] = array( "name" => "Farver",
					"desc" => "vælg farve",
					"id" => "base_color",
					"std" => "green",
					"type" => "select",
					"options" => $colour_array);				
					
//if ( current_user_can( 'manage_options' )){
																	
/* ----------------------------------------
**	Backup Options
-------------------------------------------*/ 
	
$of_options[] = array( "name" => "Backup",
					"type" => "heading");
					
$of_options[] = array( "name" => "Sikkerhedskopi indstillinger",
                    "id" => "of_backup",
                    "std" => "",
                    "type" => "backup",
					"desc" => '',
					);
					
$of_options[] = array( "name" => "SikkerhedsKopi",
                    "id" => "of_transfer",
                    "std" => "",
                    "type" => "transfer",
					"desc" => '".
						',
					);
$of_options[] = array( "name" => "Google Analytics Kode",
					"desc" => "",
					"id" => "google-analytics",
					"std" => "",
					"type" => "textarea");		
	}
	//}
}
?>
