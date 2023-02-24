<?php

/**
 * Provide a public-map-facing view for the plugin
 *
 * This file is used to markup the public-map-facing aspects of the plugin.
 *
 * @link       http://www.cologne-host.eu
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public/template
 * 
 * Google Change to often his API. You need this display only for google the rest runs :D Put in your api key
 * Set up map style under view/css
 */
class Wis_Business_Directory_Public_MAP_Display {
	private $plugin_name;
	private $version;
		public function __construct( $plugin_name, $version ) {
				$this->plugin_name = $plugin_name;
				$this->version = $version;
		}
		public function wis_map_display() {
		global $post; // Check
				$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
				$wis_company_logo = get_post_meta( $post->ID, '_wis_company_logo', true );
      				$wis_company_colum2 = get_post_meta( $post->ID, '_wis_company_colum2', true );

				$wis_adress = get_post_meta( $post->ID, '_wis_adress', true );
				$wis_zip = get_post_meta( $post->ID, '_wis_zip', true );
				$wis_lat = get_post_meta( $post->ID, '_wis_lat', true );
				$wis_long = get_post_meta( $post->ID, '_wis_long', true );
				$wis_town = get_post_meta( $post->ID, '_wis_town', true );
				    
      
      echo <<<EOF
<hr>
<meta name="DC.title" content="$wis_company_name - $wis_town" />
<meta name="geo.region" content="DE-NW" />
<meta name="geo.placename" content="K&ouml;ln" />
<meta name="geo.position" content="$wis_lat;$wis_long" />
<meta name="ICBM" content="$wis_lat, $wis_long" />
<p>$wis_company_colum2</p><hr>
<hr>

<--! Start map dsgvo -->
<button id='map'>
  Load MAP
</button>

<div id="show-map">

<div class="wp-block-buttons">
<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">load map</a></div>
</div>
<script> 
$('#show-map').click(() => {
  $.getScript('https://maps.googleapis.com/maps/api/js', () => {

    var myLatLng = {
      lat: $wis_lat,
      lng: $wis_long
    }

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 14,
      center: myLatLng
    })

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map
    })

  })
})
</script>
</div>








<script>
      function initMap() {
        var uluru = {lat: $wis_lat, lng: $wis_long};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbPeuTt0hDxnF8RDiQgqrn4uLTBk_EwfY&callback=initMap" async defer></script>
<!-- .end/ maps -->
EOF;
      
      
	}
}



////////



$('#show-map').click(() => {
  $.getScript('https://maps.googleapis.com/maps/api/js', () => {

    var myLatLng = {
      lat: 10.1364,
      lng: -80.2514
    }

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 11,
      center: myLatLng
    })

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map
    })

  })
})
