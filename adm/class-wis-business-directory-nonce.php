<?php
/**
 * Provide a metabox-facing for the plugin
 *
 * This file is used to markup the metabox-facing aspects of the plugin. It loads out of all classes for customs edit :D
 *
 * @link       http://wordpress-webmaster.de
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/adm
 *
 */
	function wis_list_function($post) {
	//  start to retrieve the metadata values if they exist
		$wis_company_name = get_post_meta( $post->ID, '_wis_company_name', true );
		$wis_company_logo = get_post_meta( $post->ID, '_wis_company_logo', true );
		$wis_adress = get_post_meta( $post->ID, '_wis_adress', true );
		$wis_zip = get_post_meta( $post->ID, '_wis_zip', true );
		$wis_town = get_post_meta( $post->ID, '_wis_town', true );
		$wis_telefon = get_post_meta( $post->ID, '_wis_telefon', true );
		$wis_fax = get_post_meta( $post->ID, '_wis_fax', true );
		$wis_company_mail = get_post_meta( $post->ID, '_wis_company_mail', true );
		$wis_company_website = get_post_meta( $post->ID, '_wis_company_website', true );
		$wis_company_team = get_post_meta( $post->ID, '_wis_company_team', true );
		$wis_company_colum1 = get_post_meta( $post->ID, '_wis_company_colum1', true );
		$wis_company_colum2 = get_post_meta( $post->ID, '_wis_company_colum2', true );
		//Social meta
		$wis_company_fb = get_post_meta( $post->ID, '_wis_company_fb', true );
		$wis_company_tw = get_post_meta( $post->ID, '_wis_company_tw', true );
		$wis_company_go = get_post_meta( $post->ID, '_wis_company_go', true );
		//Map meta
		$wis_lat = get_post_meta( $post->ID, '_wis_lat', true );
		$wis_long = get_post_meta( $post->ID, '_wis_long', true );
		//Openings meta
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
	// we add a nonce field for the backend so we can check for it later when validating all
	wp_nonce_field( 'wis_inner_custom_box', 'wis_inner_custom_box_nonce' );
	echo '<ul class="tabs">
<li class="labels">
<label for="tab1" id="label1">' . esc_html__( 'Company Info', 'wis-business-directory' ) . '</label>
<label for="tab2" id="label2">' . esc_html__( 'Openings', 'wis-business-directory' ) . '</label>
<label for="tab3" id="label3">' . esc_html__( 'Social Network', 'wis-business-directory' ) . '</label>
<label for="tab4" id="label4">' . esc_html__( 'Location', 'wis-business-directory' ) . '</label>
<label for="tab5" id="label5">' . esc_html__( 'Settings', 'wis-business-directory' ) . '</label>
</li>
<li><input type="radio" checked name="tabs" id="tab1">
<div id="tab-content1" class="tab-content">
<h3> ' . esc_html__( 'Entry Information', 'wis-business-directory' ) . '</h3>
<p>	' . esc_html__( 'Please set needed. Than add ', 'wis-business-directory' ) . ' <strong>  [WIS_BD]</strong> 
' . esc_html__( 'as shortcode where you want eg. post page widget.', 'wis-business-directory' ) . '</p><table>
<tr><td><strong>' . esc_html__( 'Name', 'wis-business-directory' ) . ' </strong></td><td>
<input style="padding: 6px 4px; width: 320px" type="text" name="wis_company_name" value="' . esc_attr($wis_company_name) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Adress', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_adress" value="' . esc_attr($wis_adress) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Zip', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_zip" value="' . esc_attr($wis_zip) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Town', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_town" value="' . esc_attr($wis_town) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Telefon', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_telefon" value="' . esc_attr($wis_telefon) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Telefax', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_fax" value="' . esc_attr($wis_fax) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'E-Mail', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_mail" value="' . esc_attr($wis_company_mail) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Website', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_website" value="' . esc_attr($wis_company_website) . '" />
</td></tr>  
<tr><td><strong>' . esc_html__( 'Logo minimum 220x220px', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_logo" value="' . esc_attr($wis_company_logo) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Colum', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_colum2" value="' . esc_attr($wis_company_colum2) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Big Image', 'wis-business-directory' ) . '</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_team" value="' . esc_attr($wis_company_team) . '" />
</td></tr>
</table>
</div>
</li><!-- end tab1 -->
<!-- OPNbox -->
<li>
<input type="radio" name="tabs" id="tab2">
 <div id="tab-content2" class="tab-content">
<h3>' . esc_html__( 'Openings', 'wis-business-directory' ) . '</h3>
<p>' . esc_html__( 'Please set all information in the fields. Than add ', 'wis-business-directory' ) . '<strong> [WIS_OPN] </strong>  
 ' . esc_html__( 'in post page widget area', 'wis-business-directory' ) . '</p>
<table>
<tr><td></td><td>
' . esc_html__( 'open', 'wis-business-directory' ) . '</td>
<td>' . esc_html__( 'close', 'wis-business-directory' ) . '
</td></tr>
<tr><td><strong>' . esc_html__( 'Monday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_mo" value="' . esc_attr($wis_wg_mo) . '" />
</td><td><input type="text" name="wis_wg_mox" value="' . esc_attr($wis_wg_mox) . '" />
</td></tr>    
<tr><td><strong>' . esc_html__( 'Tuesday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_di" value="' . esc_attr($wis_wg_di) . '" /></td>
<td><input type="text" name="wis_wg_dix" value="' . esc_attr($wis_wg_dix) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( ' Wednesday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_mi" value="' . esc_attr($wis_wg_mi) . '" /></td>
<td><input type="text" name="wis_wg_mix" value="' . esc_attr($wis_wg_mix) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Thursday', 'wis-business-directory' ) . '</strong></td><td>
<input type="text" name="wis_wg_do" value="' . esc_attr($wis_wg_do) . '" />
</td><td><input type="text" name="wis_wg_dox" value="' . esc_attr($wis_wg_dox) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Friday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_fr" value="' . esc_attr($wis_wg_fr) . '" />
</td><td><input type="text" name="wis_wg_frx" value="' . esc_attr($wis_wg_frx) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Saturday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_sa" value="' . esc_attr($wis_wg_sa) . '" />
</td><td><input type="text" name="wis_wg_sax" value="' . esc_attr($wis_wg_sax) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Sunday', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_so" value="' . esc_attr($wis_wg_so) . '" />
</td><td><input type="text" name="wis_wg_sox" value="' . esc_attr($wis_wg_sox) . '" />
</td></tr>
<tr><td><strong>' . esc_html__( 'Closed', 'wis-business-directory' ) . ':</strong></td><td>
<input type="text" name="wis_wg_clo" value="' . esc_attr($wis_wg_clo) . '" /></td></tr>
</table>
            </div>
        </li><!-- end tab2 -->
						<!-- Socialbox WIS-BD-->
        <li>
            <input type="radio" name="tabs" id="tab3">  
            <div id="tab-content3" class="tab-content">
                <h3>' . esc_html__( 'Social Network settings ', 'wis-business-directory' ) . '</h3>  
<p>' . esc_html__( 'Set the Social Network URLs from your client', 'wis-business-directory' ) . '</p>
<table><tr><td><strong>Facebook:</strong></td><td>
<input style="padding: 6px 4px; width: 320px type="text" name="wis_company_fb" value="' . esc_attr($wis_company_fb) . '" />
</td></tr>
<tr><td><strong>Twitter:</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_tw" value="' . esc_attr($wis_company_tw) . '" />
</td></tr>
<tr><td><strong>Instagramm:</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_go" value="' . esc_attr($wis_company_go) . '" />
</td></tr>
</table>




            </div>
        </li><!-- end tab3 -->
         <li>
            <input type="radio" name="tabs" id="tab4">  
            <div id="tab-content4" class="tab-content">
            <h3>' . esc_html__( 'Location', 'wis-business-directory' ) . '</h3>
            <table><tr><td><strong>Latitide</strong></td><td>
<input style="padding: 6px 4px; width: 320px type="text" name="wis_lat" value="' . esc_attr($wis_lat) . '" />
</td></tr>
<tr><td><strong>Longitude:</strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_long" value="' . esc_attr($wis_long) . '" />
</td></tr>
</table>





            </div>
        </li><!-- end tab4 -->
        
          <li>
            <input type="radio" name="tabs" id="tab5">  
            <div id="tab-content5" class="tab-content">
            <h3>' . esc_html__( 'Settings', 'wis-business-directory' ) . '</h3>
            <p>' . esc_html__( 'Set customer link', 'wis-business-directory' ) . '</p><table>
            <tr><td><strong></strong></td><td>
<input style="padding: 6px 4px; width: 100%" type="text" name="wis_company_go" value="     
" />
</td></tr>
</table>
            </div>
        </li><!-- end tab5 -->
     </ul> 




';
// end class
	}
