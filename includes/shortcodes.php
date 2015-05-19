<?php
/* USE SHORTCODE IN MENU */
add_filter( 'wp_nav_menu_objects', 'my_dynamic_menu_items' );

function my_dynamic_menu_items( $menu_items ) {
    foreach ( $menu_items as $menu_item ) {
		$title = $menu_item->title;
        if ( preg_match('%client_name%', $title) ) {
            global $shortcode_tags;
				$newitem .= get_general_data('client_name', $title);
				$menu_item->title = $newitem;
        }
        if ( preg_match('%practice_name%', $title) ) {
            global $shortcode_tags;
				$newitem .= get_general_data('practice_name', $title);
				$menu_item->title = $newitem;
        }
        if ( preg_match('%doctor_name%', $title) ) {
            global $shortcode_tags;
				$newitem = get_multi_data('doctor_name', $title);
				$menu_item->title = $newitem;
        }
        if ( preg_match('%doctor_title%', $title) ) {
            global $shortcode_tags;
				$newitem = get_multi_data('doctor_title', $title);
				$menu_item->title = $newitem;
        }
        if ( preg_match('%phone_numbers_menu%', $title) ) {
            global $shortcode_tags;
				$newitem = get_phones_menu($title);
				$menu_item->title = $newitem;
        }
   }
    return $menu_items;
}

/* calls for all edited output */
function call_title_shortcode($title){
	if(preg_match('%client_name%', $title)){
		$title = get_general_data('client_name', $title);
	}
	if(preg_match('%practice_name%', $title)){
		$title = get_general_data('practice_name', $title);
	}
	if(preg_match('%phone_number%', $title)){
		$title = get_multi_data('phone_number', $title);
	}
	if(preg_match('%location%', $title)){
		$title = get_multi_data('location', $title);
	}
	if(preg_match('%doctor_name%', $title)){
		$title = get_multi_data('doctor_name', $title);
	}
	if(preg_match('%doctor_title%', $title)){
		$title = get_multi_data('doctor_title', $title);
	}
	
	return $title;	
}

function get_general_data($match, $title) {
	if($match == 'client_name') {
		$string = explode('%client_name%', $title );
		$match1 = get_option('wm4d_client');
	}
	if($match == 'practice_name') {
		$string = explode('%practice_name%', $title );
		$match1 = get_option('wm4d_practice');
	}
	$title = $string[0];
	$title .= $match1;
	$title .= $string[1];	
	return $title;	
}


function get_multi_data($match, $title) {
	if($match == 'phone_number') {
		$match1 = get_option('wm4d_phone');
		$matchN = get_option('wm4d_phones');
		$string = explode('%phone_number', $title );
	}
	
	if($match == 'doctor_name') {
		$match1 = get_option('wm4d_doctor');
		$matchN = get_option('wm4d_doctors');
		$string = explode('%doctor_name', $title );
	}
	
	if($match == 'doctor_title') {
		$doctor1 = get_option('wm4d_doctor');
		$titles1 = get_option('wm4d_doc_titles');
		$match1 = $doctor1.', '.$titles1;
		$matchN = get_option('wm4d_doctors');
		$titlesN = get_option('wm4d_docs_titles');
		$string = explode('%doctor_title', $title );
	}
	
	if($match == 'location') {
		$match1 = get_option('wm4d_location');
		$matchN = get_option('wm4d_locations');
		$string = explode('%location', $title );
	}
	
	$title = $string[0];
	for($i=1; $i < sizeof($string); $i++) {
		$matchstring1 = explode('%', $string[$i]);
		if($matchstring1[0] == '') {
			if($match == 'phone_number') {
				$title .= '<a href="tel:'.$match1.'">'.$match1.'</a>';
			} else {
				
				$title .= $match1;
			}
			$title .= $matchstring1[$i]; //outnext
		} else {
			$next = explode('s', $matchstring1[0] );
			$getid = explode('_', $matchstring1[0]);
			$id = $getid[1]-1;

			if($id == -1) {
				$endtext = substr($string[$i],2); // cut first: s%
				$max = count($matchN);
				foreach( $matchN as $k => $v) {
					if($match == 'phone_number') {
						if ( $k == 0 ) {
						   $title .= '<a href="tel:'.$v.'">'.$v.'</a>, ';
						} elseif ($k == $max-1) {
						   $title .= '<a href="tel:'.$v.'">'.$v.'</a>';
						} else {
						   $title .= '<a href="tel:'.$v.'">'.$v.'</a>, ';
						}
					} elseif($match == 'doctor_title') {
						if ( $k == 0 ) {
						   $title .= $v.', '.$titlesN[$k].', ';
						} elseif ($k == $max-1) {
						   $title .= $v.', '.$titlesN[$k];
						} else {
						   $title .= $v.', '.$titlesN[$k].', ';
						}
					} else {
						if ( $k == 0 ) {
						   $title .= $v.', ';
						} elseif ($k == $max-1) {
						   $title .= $v;
						} else {
						   $title .= $v.', ';
						}
					}
				}
				$title .= $endtext; //outnext
			}
			if($id > -1) {
				if ($id<10) {
					$endtext = substr($string[$i],4);  // cut first: s_#%
				} else {
					$endtext = substr($string[$i],5);  // cut first: s_##%
				}
				
				if($match == 'phone_number') {
					$title .= '<a href="tel:'.$matchN[$id].'">'.$matchN[$id].'</a>';
				} elseif($match == 'doctor_title') {
					$Ndoctor = $matchN[$id];
					$Ntitles = $titlesN[$id];
					$title .= $Ndoctor.', '.$Ntitles;
				} else {
					$title .= $matchN[$id];
				}
				$title .= $endtext; //outnext
			}
		}
	} 
	
	return $title;	
}

function get_phones_menu($title){
	$title = '';
	$phones = get_option('wm4d_phones');
	$location = get_option('wm4d_phones_loc');
	$string = explode('%phone_numbers_menu%', $title );
	$max = count($phones);
	foreach( $phones as $k => $v) {
		if($k == 0) {
			$title .= '<a href="tel:'.$v.'">'. $location[$k] ."<br/>". $v .'</a></li>';
		}
		else {
			$title .= '<li id="menu-item-phones-'.$k.'" clas"menu-item menu-item-type-custom menu-item-object-custom menu-item-phones'.$k.'">';
			$title .= '<a href="tel:'.$v.'">'. $location[$k] ."<br/>". $v .'</a></li>';
		}
	}
	
	return $title;
}

function call_phone_shortcode($phone){
	if(preg_match('%phone_number%', $phone)){
		$phone = get_multi_data('phone_number', $phone);
	} else {
		$phone = '<a href="tel:'.$phone.'">'.$phone.'</a>';
	}
	return $phone;	
}
	
function call_address_shortcode($address, $line){
	if(preg_match('%location%', $address)){
		$address = get_multi_data('location', $address);
		$string = explode("\n", $address );

		switch ($line) {
		case 'line1':
			$address = $string[0];
			return $address;
			break;
		case 'line2':
			$address = $string[1];
			return $address;
			break;
		case 'line3':
			$address = $string[2];
			return $address;
			break;
		case 'line4':
			$address = $string[3];
			return $address;
			break;
		}
	}
}

function call_description_shortcode($description){
	if(preg_match('%phone_number%', $description)){
		$description = get_multi_data('phone_number', $description);
	}
	if(preg_match('%doctor_name%', $description)){
		$description = get_multi_data('doctor_name', $description);
	}
	if(preg_match('%doctor_title%', $description)){
		$description = get_multi_data('doctor_title', $description);
	}
	if(preg_match('%client_name%', $description)){
		$description = get_general_data('client_name', $description);
	}
	if(preg_match('%practice_name%', $description)){
		$description = get_general_data('practice_name', $description);
	}
	if(preg_match('%location%', $description)){
		$data = get_multi_data('location', $description);
		$string = preg_replace("#\r\n#",'{br}',trim($data));
		$description = $string;
	}
	if(preg_match('%multi_data%', $description)){
		$practice = get_option('wm4d_practice');
		$all_phones = get_option('wm4d_phones');
		$all_locations = get_option('wm4d_locations');
		
		$string = '';
		foreach($all_phones as $k => $v) {
			$locations = preg_replace("#\r\n#",'{br}',trim($all_locations[$k]));

			//$string .= $practice . '{br}';
			$string .= $locations . '{br}';
			$string .= 'Phone: ' . $v . ' | ';
		}
		
		$description = $string;
	}
	
	return $description;

}

function call_addresses_shortcode($address){
	if(preg_match('%location%', $address)){
		$data = get_multi_data('location', $address);
		$string = preg_replace("#\r\n#",'{br}',trim($data));
		$address = $string;
	}
	if(preg_match('%multi_data%', $address)){
		$data = get_option('wm4d_locations');
		
		foreach($data as $k => $v) {
			$locations = preg_replace("#\r\n#",'',trim($v));
			$string .= $locations . '|';
		}
		$address = $string;
	}
	return $address;
	//return print_r( $data );
}

function call_icons_shortcode($address, $icons) {
	if(preg_match('%multi_data%', $address)){
		$data = get_option('wm4d_locations');
		$string = '';
		foreach($data as $k => $v) {
			$string .=  $icons . '|';
		}
		$icons = $string;
	}
	return $icons;
}

function call_web_shortcode($url){
	if(preg_match('%self%', $url)){
		$url = site_url();
		$a = preg_replace('#^[^:/.]*[:/]+#i', '',urldecode( $url ));
		$out =	preg_replace('!\bwww3?\..*?\b!', '', $a);
		$url = $out;	
	}
	else {
		$out = "<a target='_blank' href='{$url}'>";
		$a = preg_replace('#^[^:/.]*[:/]+#i', '',urldecode( $url ));
		$out .=	preg_replace('!\bwww3?\..*?\b!', '', $a);
		$out .= "</a>";
		$url = $out;	
	}
	return $url;	
}


/******* REPLACED SHORTCODES FROM ORGINAL *******/

/* EDIT RESPONSIVE MAP SHORTCODE OUTPUT */
remove_shortcode('res_map');
add_shortcode('res_map', 'responsive_map_shortcode_edited');

function responsive_map_shortcode_edited($atts) {

    // Extract the attributes user gave in the shortcode
    $atts = shortcode_atts(array(
      'width'           => '',        // Leave blank for 100% (responsive map), or use a width in 'px' or '%'
      'height'          => '500px',   // Use a height in 'px' or '%'
      'maptype'         => 'roadmap', // Possible values: roadmap, satellite, terrain or hybrid
      'zoom'            => 14,         // Zoom, use values between 1-19
      'address'         => '',        // Markers addresses in this format: street, city, country | street, city, country | street, city, country
      'description'     => '',        // Markers descriptions in this format: description1 | description2 | description3 (one for each marker address above)
      'popup'           => 'false',   // true or false
      'pancontrol'      => 'false',   // true or false
      'zoomcontrol'     => 'false',   // true or false
      'draggable'       => 'true',    // true or false
      'scrollwheel'     => 'false',   // true or false
      'typecontrol'     => 'false',   // true or false
      'scalecontrol'    => 'false',   // true or false
      'streetcontrol'   => 'false',   // true or false
      'directionstext'  => '',        // The text to be displayed for directions link
      'center'          => '',        // The point where the map should be centered (latitude, longitude) for instance: center="38.980288, 22.145996"
      'icon'            => 'green',   // Possible color values: black, blue, gray, green, magenta, orange, purple, red, white, yellow or a link to a custom image icon
      'style'           => '1',       // Use style values between 1-30
      'refresh'         => 'false'    // true or false (true if the map should be refreshed and re-centered when window is scaled; false otherwise)
    ), $atts);
    
    // Enque the neccessary jquery files
    wp_enqueue_script("jquery");
    wp_enqueue_script('geogooglemap');
    wp_enqueue_script('jquerygmap');
    
    // Generate an unique identifier for the map
    $mapid = rand();

    // Extract the map type
    $atts['maptype'] = strtoupper($atts['maptype']);
    
    // If width or height were specified in the shortcode, extract them too
    $dimensions = 'height:'.$atts['height'];
    if($atts['width'])
        $dimensions .= ';width:'.$atts['width'];

    // Set the pre-defined style which corresponds to the number given in the shortcode
    $atts['style'] = getStyleString($atts['style']);
    
    // Clean the html code in the directionstext or set the default value if directionstext was not specified in the shortcode
    if (isset($atts['directionstext']) && strlen(trim($atts['directionstext'])) != 0) {
        $atts['directionstext'] = $atts['directionstext'];
    } 
    
    // Extract the langitude and longitude for the map center
    if (trim($atts['center'])  != "") {
        sscanf($atts['center'], '%f, %f', $lat, $long);
    } else {
        $lat = 'null'; $long = 'null';
    }
	    
    // Split the addresses and descriptions (by | delimiter) and build markers JSON list
    if ($atts['address'] != '') {
	  $description = $atts['description'];
	  $description = call_description_shortcode($description);
	  $address  = $atts['address'];
	  $addresses = call_addresses_shortcode($address);
	  $icons = $atts['icon'];
	  $icons = call_icons_shortcode($address, $icons);

      $addresses = explode("|",$addresses);
      $descriptions = explode("|",$description);
	  
      $icons = explode("|",$icons);

      // Build a marker for each address
      $markers = '[';

      for($i = 0;$i < count($addresses);$i ++) {
        $address = cleanHtml($addresses[$i]);
        
        // If multiple markers, hide popup, else show popup according to parameter from shortcode
        if (count($addresses) > 1) {
            $atts['popup'] = "no";
        } 
        
        // if it's empty, set the default description equal to the the address
        if(isset($descriptions[$i]) && strlen(trim($descriptions[$i])) != 0) {
            $html = $descriptions[$i];  
        }
        else
            $html = $address;
            
        // Add the directions link to the description
        $directions = 'http://maps.google.com/?daddr=' . urlencode($address);
        $html .= '<strong><br><a target=\'_blank\' href="'. $directions .'">'. $atts['directionstext'] .'</a></strong>' ;
        
        // Prepare the description html
        $html = cleanHtml($html);
        
        // Get the correct icon image based on icon color/url given in the shortcode
        $icon = getIcon($icons[$i]);
        
        // Extract the langitude and longitude for the map center
        $marker_latitude = null;
        $marker_longitude = null;
        if (trim($address)  != "") {
            sscanf($address, '%f, %f', $marker_latitude, $marker_longitude);
        }
        // If more markers, add the neccessary "," delimiter between markers
        if ($i > 0) $markers .= ",";
        
        // Build markers list based on given address or latitude/longitude
        if ($marker_latitude == '' || $marker_longitude == '') {
            $markers .= '{
                    address: \''. $address .'\', 
                    html:\''. $html .'\',
                    popup: '. toBool($atts['popup']) .',
                    flat: true,
                    icon: {
                        image: \''. $icon .'\',
                        iconsize: [56, 50],
                        shadow: \''. plugins_url('/includes/icons/shadow.png', __FILE__) .'\',
                        shadowsize: [58, 50],
                        shadowanchor: null}}';
        } else {
            $markers .= '{
                    latitude:' . $marker_latitude .', 
                    longitude:' . $marker_longitude .', 
                    html:"'. $html .'",
                    popup: '. toBool($atts['popup']) .',
                    flat: true,
                    icon: {
                        image: \''. $icon .'\',
                        iconsize: [56, 50],
                        shadow: \''. plugins_url('/includes/icons/shadow.png', __FILE__) .'\',
                        shadowsize: [58, 50],
                        shadowanchor: null}}';
        }
      }
      $markers .= ']';
    }
    // Tell PHP to start output buffering
    ob_start();
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function($) {
    var mapdiv = jQuery("#responsive_map_<?php echo $mapid; ?>");
    mapdiv.gMapResp({
      maptype: google.maps.MapTypeId.<?php echo $atts['maptype']; ?>,
      zoom: <?php echo $atts['zoom']; ?>,
      markers: <?php echo $markers; ?>,
      panControl: <?php echo toBool($atts['pancontrol']); ?>,
      zoomControl: <?php echo toBool($atts['zoomcontrol']); ?>,
      draggable: <?php echo toBool($atts['draggable']); ?>,
      scrollwheel: <?php echo toBool($atts['scrollwheel']); ?>,
      mapTypeControl: <?php echo toBool($atts['typecontrol']); ?>,
      scaleControl: <?php echo toBool($atts['scalecontrol']); ?>,
      streetViewControl: <?php echo toBool($atts['streetcontrol']); ?>,
      overviewMapControl: true,
      styles: <?php echo $atts['style']; ?>,
      latitude: <?php echo $lat; ?>,
      longitude: <?php echo $long; ?>
     });
  });
  <?php if (isset($atts['refresh']) && $atts['refresh'] == 'yes') { ?>
  window.onresize = function() {
        jQuery('.responsive-map').each(function(i, obj) {
            var gmap = jQuery(this).data('gmap').gmap;
            google.maps.event.trigger(gmap, 'resize');
            jQuery(this).gMapResp('fixAfterResize');
        });
  };
  <?php } ?>
  </script>
  <div id="responsive_map_<?php echo $mapid; ?>" class="responsive-map" style="<?php echo $dimensions; ?>;"></div>
  <?php
  return ob_get_clean();
}
?>