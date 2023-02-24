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
class Wis_Business_Directory_Public_OPN_Display {
		private $plugin_name;
		private $version;
		public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		}
		public function wis_opn_display() {
			 global $post;
				// check values if they exist
				$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
				$wis_wg_mo = get_post_meta( $post->ID, '_wis_wg_mo', true );
				$wis_wg_mox = get_post_meta( $post->ID, '_wis_wg_mox', true );
				$wis_wg_di = get_post_meta( $post->ID, '_wis_wg_di', true );
				$wis_wg_dix = get_post_meta( $post->ID, '_wis_wg_dix', true );
				$wis_wg_mi = get_post_meta( $post->ID, '_wis_wg_mi', true );
				$wis_wg_mix = get_post_meta( $post->ID, '_wis_wg_mix', true );
				$wis_wg_do = get_post_meta( $post->ID, '_wis_wg_do', true );
				$wis_wg_dox = get_post_meta( $post->ID, '_wis_wg_dox', true );
				$wis_wg_fr = get_post_meta( $post->ID, '_wis_wg_fr', true );
				$wis_wg_frx = get_post_meta( $post->ID, '_wis_wg_frx', true );
				$wis_wg_sa = get_post_meta( $post->ID, '_wis_wg_sa', true );
				$wis_wg_sax = get_post_meta( $post->ID, '_wis_wg_sax', true );
				$wis_wg_so = get_post_meta( $post->ID, '_wis_wg_so', true );
				$wis_wg_sox = get_post_meta( $post->ID, '_wis_wg_sox', true );
				$wis_wg_clo = get_post_meta( $post->ID, '_wis_wg_clo', true );
		echo '		
<!-- #show BD openings  -->
<h3>Öffnungzeiten von <br>' . $wis_company_name . '</h3>
		' . esc_html__( 'Montag', 'wis-business-directory' ) . ': ' . $wis_wg_mo . ' - ' . $wis_wg_mox . ' <br>
		' . esc_html__( 'Dienstag', 'wis-business-directory' ) . ': ' . $wis_wg_di . ' - ' . $wis_wg_dix . '<br>
		' . esc_html__( 'Mittwoch', 'wis-business-directory' ) . ': ' . $wis_wg_mi . ' - ' . $wis_wg_mix . '<br>
		' . esc_html__( 'Donnerstag', 'wis-business-directory' ) . ': ' . $wis_wg_do . ' - ' . $wis_wg_dox . '<br>
		' . esc_html__( 'Freitag', 'wis-business-directory' ) . ': ' . $wis_wg_fr . ' - ' . $wis_wg_frx . '<br>
		' . esc_html__( 'Samstag', 'wis-business-directory' ) . ': ' . $wis_wg_sa . ' - ' . $wis_wg_sax . '<br>
		' . esc_html__( 'Sonntag', 'wis-business-directory' ) . ': ' . $wis_wg_so . ' - ' . $wis_wg_sox . '<br>
		' . esc_html__( 'Geschlossen', 'wis-business-directory' ) . ': <strong>' . $wis_wg_clo . '</Strong><br>
		<!-- WIS BD show opening end  -->';
	}//end class
}

