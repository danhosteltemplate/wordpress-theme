<?php
global $data;
       
// If the Google Maps option is selected display the map
	  
	$map_lat = $data['gmap-top-lat'];
	$map_lng = $data['gmap-top-lng'];
	  
	  if ( $data['gmap-top-content'] ) {
		  $map_content = 'marker_html="' . $data['gmap-top-content'] . '"';
	  }
	  echo do_shortcode('[googlemap height="300px" width="100%" latitude="' . $map_lat . '" longitude="' . $map_lng . '" marker_latitude="' . $map_lat . '" marker_longitude="' . $map_lng . '" ' . $map_content . ' marker_popup=false ]');
?>