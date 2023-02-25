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


<div class="divTable" style="width: 92%;border: 1px solid #000;" >
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell">
<!-- #show BD openings  -->
<h3>Öffnungzeiten von <br>' . $wis_company_name . '</h3>
		Montag: ' . $wis_wg_mo . ' - ' . $wis_wg_mox . ' <br>
		Dienstag: ' . $wis_wg_di . ' - ' . $wis_wg_dix . '<br>
		Mittwoch: ' . $wis_wg_mi . ' - ' . $wis_wg_mix . '<br>
		Donnerstag: ' . $wis_wg_do . ' - ' . $wis_wg_dox . '<br>
		Freitag: ' . $wis_wg_fr . ' - ' . $wis_wg_frx . '<br>
		Samstag: ' . $wis_wg_sa . ' - ' . $wis_wg_sax . '<br>
		Sonntag: ' . $wis_wg_so . ' - ' . $wis_wg_sox . '<br>
		Geschlossen: <strong>' . $wis_wg_clo . '</Strong><br>
</div>
</div>
</div>
</div>
<!-- WIS BD show opening end  -->';
	}//end class
}




<div class="divTable wis-bd">
<div class="divTableHeading">
<div class="divTableRow">
<div class="divTableHead">head1</div>
<div class="divTableHead">geöffnet</div>
<div class="divTableHead">geschlossen</div>
</div>
</div>
<div class="divTableBody">
<div class="divTableRow">
<div class="divTableCell">Montag</div>
<div class="divTableCell">' . $wis_wg_mo . 'cell2_1</div>
<div class="divTableCell">' . $wis_wg_mox . '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Dienstag</div>
<div class="divTableCell">' . $wis_wg_di . '</div>
<div class="divTableCell">' . $wis_wg_dix . '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Mittwoch</div>
<div class="divTableCell">' . $wis_wg_mi . '</div>
<div class="divTableCell">' . $wis_wg_mix . '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Donnerstag</div>
<div class="divTableCell">' . $wis_wg_do . '/div>
<div class="divTableCell">' . $wis_wg_dox . '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Freitag</div>
<div class="divTableCell">' . $wis_wg_fr . '</div>
<div class="divTableCell">' . $wis_wg_frx . '</div>
</div>
<div class="divTableRow">
<div class="divTableCell">Samstag</div>
<div class="divTableCell">' . $wis_wg_sa . '</div>
<div class="divTableCell">' . $wis_wg_sax . '/div>
</div>
<div class="divTableRow">
<div class="divTableCell">Sonntag</div>
<div class="divTableCell">' . $wis_wg_so . '</div>
<div class="divTableCell">' . $wis_wg_sox . '</div>
</div>
</div>
</div>




