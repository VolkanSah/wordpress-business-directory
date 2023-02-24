<?php

/**
 * @link       http://www.cologne-host.eu
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/admin
 */

/**
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/adm
 *
 * File for the backend facing
 */
class Wis_Business_Directory_Admin {
		private $plugin_name;
		private $version;
		public function __construct( $plugin_name, $version ) {
		$this->plugin_name = $plugin_name;
		$this->version = $version;
		}
		// load backend styles and script
		public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wis-business-directory-admin.css', array(), $this->version, 'all' );
		}
		public function enqueue_scripts() {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wis-business-directory-admin.js', array( 'jquery' ), $this->version, false );
		}
		// Construct the metabox
		public function wis_mb_create() {
		// will be shown in post and page if needed set own customs post types
		$screens = array( 'post' , 'page' );
		foreach ( $screens as $screen ) {
		add_meta_box(
            	'wis-bd',
            	'WIS Business Directory',
            	'wis_list_function',
            	$screen,
            	'normal',
            	'high'
        	);
    			}
			}
		/* 
			Work with the Metabox
		*/
		
		
		
		
		// Save data
		public function wis_mb_save_data($post_id) {
 		// Check if our nonce is set.
    		if ( ! isset( $_POST['wis_inner_custom_box_nonce'] ) )
        		return $post_id;
			$nonce = $_POST['wis_inner_custom_box_nonce'];
		// Verify that the nonce is valid.
    		if ( ! wp_verify_nonce( $nonce, 'wis_inner_custom_box' ) )
        		return $post_id;
		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
    		if ( defined( 'DOING_AUTOSAVE') && DOING_AUTOSAVE )
        		return $post_id;
		// Check the user's permissions.
    		if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
            		return $post_id;
    		} else {
		if ( ! current_user_can( 'edit_post', $post_id ) )
            		return $post_id;
		}
		/*
			Start checking for old entrys in database
		*/
		$old_lat = get_post_meta( $post_id, '_wis_lat', true );
		$old_long = get_post_meta( $post_id, '_wis_long', true );
		$old_adress = get_post_meta( $post_id, '_wis_adress', true );
		$old_company_name = get_post_meta( $post_id, '_wis_company_name', true );
		$old_company_logo = get_post_meta( $post_id, '_wis_company_logo', true );
		$old_company_team = get_post_meta( $post_id, '_wis_company_team', true );
		$old_company_colum1 = get_post_meta( $post_id, '_wis_company_colum1', true );
		$old_company_colum2 = get_post_meta( $post_id, '_wis_company_colum2', true );
		$old_zip = get_post_meta( $post_id, '_wis_zip', true );
		$old_town = get_post_meta( $post_id, '_wis_town', true );
		$old_telefon = get_post_meta( $post_id, '_wis_telefon', true );
		$old_fax = get_post_meta( $post_id, '_wis_fax', true );
		$old_company_mail = get_post_meta( $post_id, '_wis_company_mail', true );
		$old_company_website = get_post_meta( $post_id, '_wis_company_website', true );
		$old_company_fb = get_post_meta( $post_id, '_wis_company_fb', true );
		$old_company_tw = get_post_meta( $post_id, '_wis_company_tw', true );
		$old_company_go = get_post_meta( $post_id, '_wis_company_go', true );
		$old_wg_mo = get_post_meta( $post_id, '_wis_wg_mo', true );
		$old_wg_mox = get_post_meta( $post_id, '_wis_wg_mox', true );
		$old_wg_di = get_post_meta( $post_id, '_wis_wg_di', true );
		$old_wg_dix = get_post_meta( $post_id, '_wis_wg_dix', true );
		$old_wg_mi = get_post_meta( $post_id, '_wis_wg_mi', true );
		$old_wg_mix = get_post_meta( $post_id, '_wis_wg_mix', true );
		$old_wg_do = get_post_meta( $post_id, '_wis_wg_do', true );
		$old_wg_dox = get_post_meta( $post_id, '_wis_wg_dox', true );
		$old_wg_fr = get_post_meta( $post_id, '_wis_wg_fr', true );
		$old_wg_frx = get_post_meta( $post_id, '_wis_wg_frx', true );
		$old_wg_sa = get_post_meta( $post_id, '_wis_wg_sa', true );
		$old_wg_sax = get_post_meta( $post_id, '_wis_wg_sax', true );
		$old_wg_so = get_post_meta( $post_id, '_wis_wg_so', true );
		$old_wg_sox = get_post_meta( $post_id, '_wis_wg_sox', true );
		$old_wg_clo = get_post_meta( $post_id, '_wis_wg_clo', true );
		/*
			If start user input than sanitize user input 
		*/
		// Map
		$lat = sanitize_text_field( $_POST['wis_lat'] );
		$long = sanitize_text_field( $_POST['wis_long'] );
		// Entry information
		$company_logo = sanitize_text_field( $_POST['wis_company_logo'] );
		$company_name = sanitize_text_field( $_POST['wis_company_name'] );
		$company_team = sanitize_text_field( $_POST['wis_company_team'] );
		$company_colum1 = sanitize_text_field( $_POST['wis_company_colum1'] );
		$company_colum2 = sanitize_text_field( $_POST['wis_company_colum2'] );
		$zip = sanitize_text_field( $_POST['wis_zip'] );
		$town = sanitize_text_field( $_POST['wis_town'] );
		$telefon = sanitize_text_field( $_POST['wis_telefon'] );
		$fax = sanitize_text_field( $_POST['wis_fax'] );
		// Entry Web
		$company_mail = sanitize_text_field( $_POST['wis_company_mail'] );
		$company_website = sanitize_text_field( $_POST['wis_company_website'] );
		$company_fb = sanitize_text_field( $_POST['wis_company_fb'] );
		$company_tw = sanitize_text_field( $_POST['wis_company_tw'] );
		$company_go = sanitize_text_field( $_POST['wis_company_go'] );
		// Entry openings
		$wg_mo = sanitize_text_field( $_POST['wis_wg_mo'] );
		$wg_mox = sanitize_text_field( $_POST['wis_wg_mox'] );
		$wg_di = sanitize_text_field( $_POST['wis_wg_di'] );
		$wg_dix = sanitize_text_field( $_POST['wis_wg_dix'] );
		$wg_mi = sanitize_text_field( $_POST['wis_wg_mi'] );
		$wg_mix = sanitize_text_field( $_POST['wis_wg_mix'] );
		$wg_do = sanitize_text_field( $_POST['wis_wg_do'] );
		$wg_dox = sanitize_text_field( $_POST['wis_wg_dox'] );
		$wg_fr = sanitize_text_field( $_POST['wis_wg_fr'] );
		$wg_frx = sanitize_text_field( $_POST['wis_wg_frx'] );
		$wg_sa = sanitize_text_field( $_POST['wis_wg_sa'] );
		$wg_sax = sanitize_text_field( $_POST['wis_wg_sax'] );
		$wg_so = sanitize_text_field( $_POST['wis_wg_so'] );
		$wg_sox = sanitize_text_field( $_POST['wis_wg_sox'] );
		$wg_clo = sanitize_text_field( $_POST['wis_wg_clo'] );
		$adress = sanitize_text_field( $_POST['wis_adress'] );
		/*
			Update the meta field in the database if not exist
		*/
		update_post_meta( $post_id, '_wis_adress', $adress, $old_adress );
		update_post_meta( $post_id, '_wis_lat', $lat, $old_lat );
		update_post_meta( $post_id, '_wis_long', $long, $old_long );
		update_post_meta( $post_id, '_wis_company_logo', $company_logo, $old_company_logo );
		update_post_meta( $post_id, '_wis_company_name', $company_name, $old_company_name );
		update_post_meta( $post_id, '_wis_company_team', $company_team, $old_company_team );
		update_post_meta( $post_id, '_wis_company_colum1', $company_colum1, $old_company_colum1 );
		update_post_meta( $post_id, '_wis_company_colum2', $company_colum2, $old_company_colum2 );
		update_post_meta( $post_id, '_wis_zip', $zip, $old_zip );
		update_post_meta( $post_id, '_wis_town', $town, $old_town );
		update_post_meta( $post_id, '_wis_telefon', $telefon, $old_telefon );
		update_post_meta( $post_id, '_wis_fax', $fax, $old_fax );
		update_post_meta( $post_id, '_wis_company_mail', $company_mail, $old_company_mail );
		update_post_meta( $post_id, '_wis_company_website', $company_website, $old_company_website );
		update_post_meta( $post_id, '_wis_company_fb', $company_fb, $old_company_fb );
		update_post_meta( $post_id, '_wis_company_tw', $company_tw, $old_company_tw );
		update_post_meta( $post_id, '_wis_company_go', $company_go, $old_company_go );
		update_post_meta( $post_id, '_wis_wg_mo', $wg_mo, $old_wg_mo );
		update_post_meta( $post_id, '_wis_wg_mox', $wg_mox, $old_wg_mox );
		update_post_meta( $post_id, '_wis_wg_di', $wg_di, $old_wg_di );
		update_post_meta( $post_id, '_wis_wg_dix', $wg_dix, $old_wg_dix );
		update_post_meta( $post_id, '_wis_wg_mi', $wg_mi, $old_wg_mi );
		update_post_meta( $post_id, '_wis_wg_mix', $wg_mix, $old_wg_mix );
		update_post_meta( $post_id, '_wis_wg_do', $wg_do, $old_wg_do );
		update_post_meta( $post_id, '_wis_wg_dox', $wg_dox, $old_wg_dox );
		update_post_meta( $post_id, '_wis_wg_fr', $wg_fr, $old_wg_fr );
		update_post_meta( $post_id, '_wis_wg_frx', $wg_frx, $old_wg_frx );
		update_post_meta( $post_id, '_wis_wg_sa', $wg_sa, $old_wg_sa );
		update_post_meta( $post_id, '_wis_wg_sax', $wg_sax, $old_wg_sax );
		update_post_meta( $post_id, '_wis_wg_so', $wg_so, $old_wg_so );
		update_post_meta( $post_id, '_wis_wg_sox', $wg_sox, $old_wg_sox );
		update_post_meta( $post_id, '_wis_wg_clo', $wg_clo, $old_wg_clo );
		}
		// end class stay clean:D
}