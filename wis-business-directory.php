<?php

/**
 * @link              http://wordpress-webmaster.de
 * @since             1.0.0
 * @package           Wis_Business_Directory
 *
 * @wordpress-plugin
 * Plugin Name:       WIS- Wordpress Business Directory
 * Plugin URI:        http://www.wasistseo.de/wordpress/business-directory/
 * Description:       I searched the web for Business Directory Wordpress Plugin, but do not find any lite, quick an free plugins! when i see in the code, 
						that the maps load in a Ifrane, than i do not understand the world!. 
						I createt this simple plugin for my websites, if you love it donate a coffe for me or write about this plugin or my site on your blog or website. 
 Thanks for using my stuff ;) In the future i will ad more light tools for more fun.
 * Version:           1.0.0
 * Author:            Volkan Sah Kücükbudak
 * Author URI:        http://wordPress-webmaster.de/
 * License:           Privat - Copyright Volkan Kücükbudak for freedom
 * License URI:       http://searchengine.team/license-freedom/
 * Text Domain:       wis-business-directory
 * Domain Path:       /languages
 */
	if ( ! defined( 'WPINC' ) ) {
	die;
	}
	function activate_wis_business_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-wis-business-directory-activator.php';
	Wis_Business_Directory_Activator::activate();
	}
	function deactivate_wis_business_directory() {
	require_once plugin_dir_path( __FILE__ ) . 'inc/class-wis-business-directory-deactivator.php';
	Wis_Business_Directory_Deactivator::deactivate();
	}
	register_activation_hook( __FILE__, 'activate_wis_business_directory' );
	register_deactivation_hook( __FILE__, 'deactivate_wis_business_directory' );
	require plugin_dir_path( __FILE__ ) . 'inc/class-wis-business-directory.php';
	function run_wis_business_directory() {
	$plugin = new Wis_Business_Directory();
	$plugin->run();
	}
	run_wis_business_directory();
