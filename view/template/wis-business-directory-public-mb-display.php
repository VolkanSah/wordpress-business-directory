<?php

/**
 * Provide a basic public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://wordpress-webmaster.de
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public/template
 */
class Wis_Business_Directory_Public_MB_Display {
		private $plugin_name;
		private $version;
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version = $version;
}
		public function wis_mb_display() {
			 global $post;
				$wis_adress = get_post_meta( $post->ID, '_wis_adress', true );
				$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
				$wis_company_logo = get_post_meta( $post->ID, '_wis_company_logo', true );
				$wis_company_team = get_post_meta( $post->ID, '_wis_company_team', true );
				$wis_company_colum1 = get_post_meta( $post->ID, '_wis_company_colum1', true );
				$wis_company_colum2 = get_post_meta( $post->ID, '_wis_company_colum2', true );
				$wis_zip = get_post_meta( $post->ID, '_wis_zip', true );
				$wis_town = get_post_meta( $post->ID, '_wis_town', true );
				$wis_telefon = get_post_meta( $post->ID, '_wis_telefon', true );
				$wis_fax = get_post_meta( $post->ID, '_wis_fax', true );
				$wis_company_mail = get_post_meta( $post->ID, '_wis_company_mail', true );
				$wis_company_website = get_post_meta( $post->ID, '_wis_company_website', true );
		echo '


    <!--! start of WIS_BD#container -->
   <aside class="widget widget_text">
<i>	<a title="' . $wis_company_name . ' - ' . $wis_town . ' " target="_blank" href="' . $wis_company_website . '">' . $wis_company_website . '</a></i><br>
				<h3>' . $wis_company_name . '</h3>

				
				<i class="fa fa-map-marker"></i>	' . $wis_adress . '<br>
				<i class="fa fa-map-marker"></i>	' . $wis_zip . ' - ' . $wis_town . '<br>
				<i class="fa fa-phone"></i>	' . $wis_telefon . '<br>
				<i class="fa fa-fax"></i>	' . $wis_fax . '<br>
				<i class="fa fa-paper-plane-o"></i>	' . $wis_company_mail . '<br><br>

				<!--! end of WIS_BD#container -->
  </aside>
		';
	}
}

