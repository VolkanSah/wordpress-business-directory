<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       http://www.cologne-host.eu
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public/template
 */
class Wis_Business_Directory_Public_SN_Display {
		private $plugin_name;
		private $version;
		public function __construct( $plugin_name, $version ) {
			$this->plugin_name = $plugin_name;
			$this->version = $version;
		}
		public function wis_sn_display() {
		global $post;
				$wis_company_fb = get_post_meta( $post->ID, '_wis_company_fb', true );
				$wis_company_tw = get_post_meta( $post->ID, '_wis_company_tw', true );
				$wis_company_go = get_post_meta( $post->ID, '_wis_company_go', true );
				$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
		echo '<!-- start SN#container -->
		<a rel="nofollow" title="on Instagram" target="blank" href="http://instagram.com/' . $wis_company_go . '">
		<i class="fa fa-google-plus fa-2x"></i>
		<a rel="nofollow" title="on Twitter" target="blank" href="http://twitter.com/' . $wis_company_tw . '">
		<i class="fa fa-twitter fa-2x"></i></a> 
		<a rel="nofollow" title="on Facebook" target="blank" href="http://facebook.com/' . $wis_company_fb . '">
		<i class="fa fa-facebook fa-2x"></i></a> 
		<!-- end SN#container -->';
	}// end class
}
