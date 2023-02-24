<?php
/**
 * @package    Wis_Business_Directory
 * @subpackage Wis_Business_Directory/includes
 * @author     Volkan Kücükbudak <plugins@wordpress-webmaster.de>
 * 
 * Start to construct the plugin core do not include use require_once for own 
 * hooks use the includes/class-wis-business-directory-function.php
 * and register under define_admin_tools to avoid errors
 */
 /* 
 Start construct plugin core
 */
class Wis_Business_Directory {
	protected $loader;
	protected $plugin_name;
	protected $version;
	public function __construct() {
		$this->plugin_name = 'wis-business-directory';
		$this->version = '1.0.0';
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks(); // conf.admin
		$this->define_public_hooks(); // Public Hooks
		$this->define_admin_tools(); // own functions
		$this->define_public_mb_display(); // BDshow
        $this->define_public_mb2_display(); // BDshow example
		$this->define_public_sn_display(); // public social network view
		$this->define_public_opn_display(); // public opnenings view
		$this->define_public_map_display(); // public map view
		$this->define_admin_cleanup(); // cleanup WordPress
	}
	private function load_dependencies() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-wis-business-directory-loader.php';
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-wis-business-directory-i18n.php';
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'adm/class-wis-business-directory-admin.php';
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/class-wis-business-directory-public.php';
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'adm/class-wis-business-directory-nonce.php';
	$this->loader = new Wis_Business_Directory_Loader();
	}
	private function set_locale() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-wis-business-directory-i18n.php';
	$plugin_i18n = new Wis_Business_Directory_i18n();
	$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
	}
	// Admin area & Metabox 
	//core->
	private function define_admin_hooks() {
	$plugin_admin = new Wis_Business_Directory_Admin( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
	$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
	$this->loader->add_action( 'add_meta_boxes', $plugin_admin, 'wis_mb_create' );
	$this->loader->add_action( 'save_post', $plugin_admin, 'wis_mb_save_data' );
	}
	// Public hooks
	private function define_public_hooks() {
	$plugin_public = new Wis_Business_Directory_Public( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_styles' ); // load css
	$this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' ); // load js
 	}
	// external function.php.  Be careful
	private function define_admin_tools() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'inc/class-wis-business-directory-function.php';
	$plugin_public = new Wis_Business_Directory_Tools( $this->get_plugin_name(), $this->get_version() );
    //$this->loader->add_action( 'admin_menu', $plugin_public, 'wis_bd_dashboard_widgets' );
	/* add your functions from class-wis-business-directory-function.php to this area*/
	
	// example $this->loader->add_action( 'admin_init', $plugin_public, 'your_function_name' );
	
	/* end your class-wis-business-directory-function.php */
	// end class
	}
	/*
	Public construct start here 
	*/
	// Public standard directory display
	private function define_public_mb_display() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/template/wis-business-directory-public-mb-display.php'; 
	$plugin_public = new Wis_Business_Directory_Public_MB_Display( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_shortcode( 'WIS_BD', $plugin_public, 'wis_mb_display' );
	}
	// Public social network display
	private function define_public_sn_display() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/template/wis-business-directory-public-sn-display.php'; 
	$plugin_public = new Wis_Business_Directory_Public_SN_Display( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_shortcode( 'WIS_SN', $plugin_public, 'wis_sn_display' );
	}
	// Public openings display
	private function define_public_opn_display() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/template/wis-business-directory-public-opn-display.php'; 
	$plugin_public = new Wis_Business_Directory_Public_OPN_Display( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_shortcode( 'WIS_OPN', $plugin_public, 'wis_opn_display' );
	}
	// Public map display - Google
	private function define_public_map_display() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/template/wis-business-directory-public-map-display.php'; 
	$plugin_public = new Wis_Business_Directory_Public_MAP_Display( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_shortcode( 'WIS_MAP', $plugin_public, 'wis_map_display' );
	}
	// Display Demo . Please read readme file
	private function define_public_mb2_display() {
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'view/template/wis-business-directory-public-mb2-display.php'; // public custom directory display
	$plugin_public = new Wis_Business_Directory_Public_MB2_Display( $this->get_plugin_name(), $this->get_version() );
	$this->loader->add_shortcode( 'WIS_BD2', $plugin_public, 'wis_mb2_display' );
	}
	// some other usefull stuff uncoment needed actions coment out what needed.
	private function define_admin_cleanup() {
	remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
	remove_action('wp_head', 'wp_generator'); // remove wordpress version
	remove_action('wp_head', 'feed_links', 2); // remove rss feed links 
	remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
	remove_action('wp_head', 'index_rel_link'); // remove link to index page
	remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
	remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
	remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );// 
	remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 ); //
	remove_action('wp_head', 'print_emoji_detection_script', 7 ); // Remove Emoji
	remove_action('admin_print_scripts', 'print_emoji_detection_script' ); // Remove Emoji
	remove_action('wp_print_styles', 'print_emoji_styles' ); // Remove Emoji
	remove_action('admin_print_styles', 'print_emoji_styles' ); // Remove Emoji
  	remove_action('welcome_panel', 'wp_welcome_panel'); // Remove Welcome Panel
		}
	// run it baby :D
	public function run() {
	$this->loader->run();
	}
	public function get_plugin_name() {
	return $this->plugin_name;
	}
	public function get_loader() {
	return $this->loader;
	}
	public function get_version() {
	return $this->version;
	}
//end class
}
