<?php

/**
 * @link       http://www.cologne-host.eu
 * @since      1.0.0
 *
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public
 */

/**
 * public-facing
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/public
 * @author     Volkan Kücükbudak <plugins@wasistseo.de>
 */
class Wis_Business_Directory_Public {
private $plugin_name;
private $version;
public function __construct( $plugin_name, $version ) {
$this->plugin_name = $plugin_name;
$this->version = $version;
}
public function enqueue_styles() {
wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wis-bd-public.css', array(), $this->version, 'all' );
//wp_enqueue_style( 'prefix-font-awesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', array(), '4.0.3' );
}
public function enqueue_scripts() {
wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wis-bd-public.js', array( 'jquery' ), $this->version, false );

}
}
