<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://wordpress-webmaster.de
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public/template
 */
class Wis_Business_Directory_Public_MB2_Display {
		private $plugin_name;
		private $version;
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version = $version;
}
		public function wis_mb2_display() {
			 global $post;
      				$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
      				$wis_company_website = get_post_meta( $post->ID, '_wis_company_website', true );

				$wis_adress = get_post_meta( $post->ID, '_wis_adress', true );
				$wis_company_logo = get_post_meta( $post->ID, '_wis_company_logo', true );
				$wis_zip = get_post_meta( $post->ID, '_wis_zip', true );
				$wis_town = get_post_meta( $post->ID, '_wis_town', true );
				$wis_telefon = get_post_meta( $post->ID, '_wis_telefon', true );
				$wis_fax = get_post_meta( $post->ID, '_wis_fax', true );
		echo '
    <!--! start of WIS_BD#container -->
 <a href="' . get_permalink() . '">
   <img class="size-medium alignright" src="http://s.wordpress.com/mshots/v1/http%3A%2F%2F' . $wis_company_website . '?w=240" alt="Welcome">
				<i class="fa fa-map-marker"></i>	' . $wis_adress . '<br>
				<i class="fa fa-map-marker"></i>	' . $wis_zip . ' - ' . $wis_town . '<br>
				<i class="fa fa-phone"></i>	' . $wis_telefon . '<br>
				<i class="fa fa-fax"></i>	' . $wis_fax . '<br>

        </a>

				<!--! end of WIS_BD#container -->


		';
	}
}

